<?php

namespace App\Imports;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Father;
use App\Models\Family;
use App\Models\Mother;
use App\Models\Grade;
use App\Models\Stage;
use App\Models\Division;
use App\Models\AcademicYear;
use App\Models\Nationality;
use App\Models\Gender;
use App\Models\Religion;
use App\Models\Language;
use App\Models\Status;
use App\Models\Clas;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class StudentImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */




    public function collection(Collection $rows)
    {
      foreach($rows as $row)
      {
        $years = AcademicYear::where('name', $row['academic_year'])->get();
        foreach($years as $y)
        {
                    $fa = Father::where('national_id' , $row['father_national_id'])->first();

                    if(isset($fa))
                    {

                        $father = Father::UpdateOrCreate(
                            [
                                'national_id' =>$row['father_national_id'],
                            ],
                            [
                           
                                'name_en' => $row['father_name_en'],
                                'name_ar' => $row['father_name_ar'],
                                'phone' => $row['father_phone'],
                                'email' => $row['father_email'],
                                'job' => $row['father_job'],
                                'code' => $row['father_code'],
                                
                               
                            ]);
        
                           
        
                            $mother = Mother::UpdateOrCreate(
                                [
                                    'national_id' =>$row['mother_national_id'],
                                ],
                                [
                               
                                    'name_en' => $row['mother_name_en'],
                                    'name_ar' => $row['mother_name_ar'],
                                    'phone' => $row['mother_phone'],
                                    'email' => $row['mother_email'],
                                    'job' => $row['mother_job'],
                                    'code' => $row['mother_code'],
                                    'family_id' => $father->family_id,
                                   
                                ]);
                        
        
                            $year = AcademicYear::where('name', $row['academic_year'])->first();
                            $stage = Stage::where('name', $row['stage'])->first();
                            $grade = Grade::where('name', $row['grade'])->first();
                            $class = Clas::where('code', $row['class'])->first();
                            $division = Division::where('name', $row['division'])->first();
                            $nationality = Nationality::where('name', $row['nationality'])->first();
                            $gender = Gender::where('name', $row['gender'])->first();
                            $religion = Religion::where('name', $row['religion'])->first();
                            $language = Language::where('name_en', $row['language'])->first();
                            $status = Status::where('name', $row['status'])->first();
                            
        
                            $student =  Student::create(
                           
                            [
                                'name_en' => $row['student_name_en'],
                                'name_ar' => $row['student_name_ar'],
                                'class_id' => $class->id ?? null,
                                'stage_id' => $stage->id ?? null,
                                'grade_id' => $grade->id ?? null,
                                'division_id' => $division->id ?? null,
                                'father_id' =>$father->id,
                                'mother_id' =>$mother->id,
                                'academic_year_id' => $year->id ?? null,
                                'nationality_id' => $nationality->id ?? null,
                                'gender_id' => $gender->id ?? null,
                                'religion_id' => $religion->id ?? null,
                                'address' => $row['address'],
                                'code' => $row['student_code'],
                                'date_of_birth' => $row['birth_date'],
                                'birth_balace' => $row['birth_balace'],
                                'age_of_october' => $row['age_of_october'],
                                'registeration_number' => $row['registeration_number'],
                                'language_id' => $language->id ?? null,
                                'notes' => $row['notes'],
                                'electronic_code' =>$row['egovernment_code'],
                                'status_id' => $status->id ?? null,
                                'family_id' => $father->family_id,
                                'health_problem' => $row['medical_proplems'],
                                'nationalid' => $row['national_id'],
        
                            ]);
                            $st = $student->update([
           
                                'full_name_ar' => $student->name_ar .' '. $student->father->name_ar,
                                'full_name_en' => $student->name_en .' '. $student->father->name_en,
                    
                            ]);

                    }else{

                        $family = new Family();
                    $family->save();

                  
                    $father = Father::UpdateOrCreate(
                    [
                        'national_id' =>$row['father_national_id'],
                    ],
                    [
                   
                        'name_en' => $row['father_name_en'],
                        'name_ar' => $row['father_name_ar'],
                        'phone' => $row['father_phone'],
                        'email' => $row['father_email'],
                        'job' => $row['father_job'],
                        'code' => $row['father_code'],
                        'family_id' => $family->id,
                       
                    ]);

                   

                    $mother = Mother::UpdateOrCreate(
                        [
                            'national_id' =>$row['mother_national_id'],
                        ],
                        [
                       
                            'name_en' => $row['mother_name_en'],
                            'name_ar' => $row['mother_name_ar'],
                            'phone' => $row['mother_phone'],
                            'email' => $row['mother_email'],
                            'job' => $row['mother_job'],
                            'code' => $row['mother_code'],
                            'family_id' => $family->id,
                           
                        ]);
                

                    $year = AcademicYear::where('name', $row['academic_year'])->first();
                    $stage = Stage::where('name', $row['stage'])->first();
                    $grade = Grade::where('name', $row['grade'])->first();
                    $class = Clas::where('code', $row['class'])->first();
                    $division = Division::where('name', $row['division'])->first();
                    $nationality = Nationality::where('name', $row['nationality'])->first();
                    $gender = Gender::where('name', $row['gender'])->first();
                    $religion = Religion::where('name', $row['religion'])->first();
                    $language = Language::where('name_en', $row['language'])->first();
                    $status = Status::where('name', $row['status'])->first();
                    

                    $student =  Student::create(
                    
                    [
                        'name_en' => $row['student_name_en'],
                        'name_ar' => $row['student_name_ar'],
                        'stage_id' => $stage->id ?? null,
                        'class_id' => $class->id ?? null,
                        'grade_id' => $grade->id ?? null,
                        'division_id' => $division->id ?? null,
                        'father_id' =>$father->id,
                        'mother_id' =>$mother->id,
                        'academic_year_id' => $year->id ?? null,
                        'nationality_id' => $nationality->id ?? null,
                        'gender_id' => $gender->id ?? null,
                        'religion_id' => $religion->id ?? null,
                        'address' => $row['address'],
                        'code' => $row['student_code'],
                        'date_of_birth' => $row['birth_date'],
                        'birth_balace' => $row['birth_balace'],
                        'age_of_october' => $row['age_of_october'],
                        'registeration_number' => $row['registeration_number'],
                        'language_id' => $language->id ?? null,
                        'notes' => $row['notes'],
                        'electronic_code' =>$row['egovernment_code'],
                        'status_id' => $status->id ?? null,
                        'family_id' => $family->id,
                        'health_problem' => $row['medical_proplems'],
                        'nationalid' => $row['national_id'],

                    ]);
                    $st = $student->update([
           
                        'full_name_ar' => $student->name_ar .' '. $student->father->name_ar,
                        'full_name_en' => $student->name_en .' '. $student->father->name_en,
            
                    ]);
                    
                    }

                    

            }         
           
        }
    }
}












         
           
          
               
         