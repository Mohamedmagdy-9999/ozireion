<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;
use App\Models\StudentAbsent;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\AbsenceEmailLog;
use Illuminate\Database\QueryException;

class CheckAbsenceAndSendEmail extends Command
{
    protected $signature = 'absence:check';
    protected $description = 'Send absence notification emails once per absence period';

    public function handle()
    {
        Student::with(['class.grade', 'father', 'mother'])
            ->chunk(100, function ($students) {
                foreach ($students as $student) {
                    $this->processStudent($student);
                }
            });
    }

    private function processStudent($student)
    {
        // آخر فترة تم الإرسال لها (watermark)
        $lastSentDate = AbsenceEmailLog::where('student_id', $student->id)
            ->max('last_absence_date');

        $startDate = $lastSentDate
            ? Carbon::parse($lastSentDate)->addDay()
            : Carbon::parse('2025-11-23'); // أول تشغيل للنظام

        $absences = StudentAbsent::where('student_id', $student->id)
            ->where('absent_status_id', 2)
            ->whereDate('date', '>=', $startDate)
            ->orderBy('date')
            ->pluck('date')
            ->map(fn ($d) => Carbon::parse($d));

        if ($absences->count() < 3) {
            return;
        }

        $consecutiveDays = 1;

        for ($i = 1; $i < $absences->count(); $i++) {

            $prev = $absences[$i - 1];
            $current = $absences[$i];

            // حساب الأيام الفعلية بدون الجمعة والسبت
            $daysBetween = 0;
            $dt = $prev->copy()->addDay();

            while ($dt->lte($current)) {
                if (!in_array($dt->dayOfWeek, [5, 6])) {
                    $daysBetween++;
                }
                $dt->addDay();
            }

            if ($daysBetween <= 1) {
                $consecutiveDays++;
            } else {
                $consecutiveDays = 1;
            }

            // =========================
            // Primary students rule
            // =========================
            if (
                $this->isPrimary($student) &&
                today()->isThursday() &&
                $consecutiveDays >= 3
            ) {
                $this->sendEmail($student, $consecutiveDays, $current);
                break;
            }

            // =========================
            // Prep + Secondary rule
            // =========================
            if (
                $this->isPrepOrSecondary($student) &&
                $consecutiveDays == 3
            ) {
                $fourthDay = $current->copy()->addDay();

                while (in_array($fourthDay->dayOfWeek, [5, 6])) {
                    $fourthDay->addDay();
                }

                if (today()->isSameDay($fourthDay)) {
                    $this->sendEmail($student, $consecutiveDays, $current);
                }

                break;
            }
        }
    }

    private function sendEmail($student, $days, $lastAbsenceDate)
    {
        $emails = [];

        if (!empty($student->father?->email)) {
            $emails[] = $student->father->email;
        }

        if (!empty($student->mother?->email)) {
            $emails[] = $student->mother->email;
        }

        if (empty($emails)) {
            return;
        }

        // =========================
        // DB is the ONLY protection
        // =========================
        try {

            AbsenceEmailLog::create([
                'student_id' => $student->id,
                'emails' => implode(', ', $emails),
                'days' => $days,
                'last_absence_date' => $lastAbsenceDate->format('Y-m-d'),
                'sent_at' => now(),
            ]);

        } catch (QueryException $e) {
            // Duplicate period → already sent → stop silently
            return;
        }

        // Send email only after successful insert
        Mail::send('emails.absence_notification', [
            'student' => $student,
            'days' => $days,
        ], function ($message) use ($emails, $student) {
            $message->to($emails)
                ->subject("تنبيه بغياب الطالب {$student->name}");
        });
    }

    private function isPrimary($student)
    {
        return in_array($student->grade_id, [1,2,3,4,5,6,7,8,9]);
    }

    private function isPrepOrSecondary($student)
    {
        return in_array($student->grade_id, [10,11,12,13,14]);
    }
}