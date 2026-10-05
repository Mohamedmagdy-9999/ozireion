<?php

Route::get('father_login', function(){
        return view('father_lms.login');
      })->name('father_login');

      Route::post('father_log', 'HomeController@father_log')->name('father_log');
Route::group(['middleware' => 'father'], function () {
        
    Route::get('profile', function(){
        return view('father_lms.profile');
   })->name('profile');
   Route::post('logout', 'FatherController@logout')->name('logout');
    Route::get('select_student', 'FatherController@select_student')->name('select_student');
    Route::get('filter_student_dashboard', 'FatherController@filter_student_dashboard')->name('filter_student_dashboard');
    Route::get('student_dashboard/{id}', 'FatherController@student_dashboard')->name('student_dashboard');
    Route::get('items/{id}/{student_id}', 'FatherController@items')->name('items');

    Route::get('student_assignment/{id}/{student_id}', 'FatherController@student_assignment')->name('student_assignment');
    Route::get('filter_student_assignment/{id}/{student_id}', 'FatherController@filter_student_assignment')->name('filter_student_assignment');
    Route::get('download_assignment/{file}', 'FatherController@download_assignment')->name('download_assignment');

    Route::get('student_contents/{id}/{student_id}', 'FatherController@student_contents')->name('student_contents');
    Route::get('filter_student_contents/{id}/{student_id}', 'FatherController@filter_student_contents')->name('filter_student_contents');
    Route::get('download_content/{file}', 'FatherController@download_content')->name('download_content');
   

    Route::get('student_plan/{id}/{student_id}', 'FatherController@student_plan')->name('student_plan');
    Route::get('filter_student_plan/{id}/{student_id}', 'FatherController@filter_student_plan')->name('filter_student_plan');
    Route::get('download_plan/{file}', 'FatherController@download_plan')->name('download_plan');

    Route::get('student_time_table/{student_id}', 'FatherController@student_time_table')->name('student_time_table');

    Route::get('student_absense/{student_id}', 'FatherController@student_absense')->name('student_absense');

    Route::post('update_profile', 'FatherController@update_profile')->name('update_profile');

    Route::get('student_medical_report/{id}', 'FatherController@student_medical_report')->name('student_medical_report');

    Route::get('student_visit_request/{id}', 'FatherController@student_visit_request')->name('student_visit_request');
    Route::post('add_visit', 'FatherController@add_visit')->name('add_visit');

    Route::post('chat_with_admin', 'FatherController@chat_with_admin')->name('chat_with_admin');
    Route::get('message/{id}', 'FatherController@message')->name('message');


    Route::post('send_message', 'FatherController@send_message')->name('send_message');
    Route::get('communication', 'FatherController@communication')->name('communication');
    Route::get('new_message', 'FatherController@new_message')->name('new_message');
    Route::get('reply/{id}', 'FatherController@reply')->name('reply');
    Route::get('download_message_file/{file}', 'FatherController@download_message_file')->name('download_message_file');
    Route::post('send_reply', 'FatherController@send_reply')->name('send_reply');

    Route::get('notification', 'FatherController@notification')->name('notification');

    Route::get('download_time_table/{file}', 'FatherController@download_time_table')->name('download_time_table');

});
