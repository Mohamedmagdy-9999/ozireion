<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Check if the request expects JSON
        if (! $request->expectsJson()) {

            // Custom redirect for teachers
            if ($request->is('teacher/*')) {
                return route('teacher.teacher_login');  
            }
            // Custom redirect for students
            elseif ($request->is('student/*')) {
                return route('student.student_login');  
            }
            elseif ($request->is('father/*')) {
                return route('father.father_login');  
            }

            elseif ($request->is('mother/*')) {
                return route('mother.mother_login');  
            }

            // Default login route for all other users
            return route('intro');
        }
    }
}
