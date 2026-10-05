<?php

Route::get('mother_login', function(){
        return view('mother_lms.login');
      })->name('mother_login');

      Route::post('mother_log', 'HomeController@mother_log')->name('mother_log');
Route::group(['middleware' => 'mother'], function () {
        
    Route::get('profile', function(){
        return view('mother_lms.profile');
   })->name('profile');
   Route::post('logout', 'MotherController@logout')->name('logout');
    Route::get('select_student', 'MotherController@select_student')->name('select_student');
    Route::get('filter_student_dashboard', 'MotherController@filter_student_dashboard')->name('filter_student_dashboard');
    Route::get('student_dashboard/{id}', 'MotherController@student_dashboard')->name('student_dashboard');
    Route::get('items/{id}/{student_id}', 'MotherController@items')->name('items');

    Route::get('student_assignment/{id}/{student_id}', 'MotherController@student_assignment')->name('student_assignment');
    Route::get('filter_student_assignment/{id}/{student_id}', 'MotherController@filter_student_assignment')->name('filter_student_assignment');
    Route::get('download_assignment/{file}', 'MotherController@download_assignment')->name('download_assignment');

    Route::get('student_contents/{id}/{student_id}', 'MotherController@student_contents')->name('student_contents');
    Route::get('filter_student_contents/{id}/{student_id}', 'MotherController@filter_student_contents')->name('filter_student_contents');
    Route::get('download_content/{file}', 'MotherController@download_content')->name('download_content');
   

    Route::get('student_plan/{id}/{student_id}', 'MotherController@student_plan')->name('student_plan');
    Route::get('filter_student_plan/{id}/{student_id}', 'MotherController@filter_student_plan')->name('filter_student_plan');
    Route::get('download_plan/{file}', 'MotherController@download_plan')->name('download_plan');

    Route::get('student_time_table/{student_id}', 'MotherController@student_time_table')->name('student_time_table');

    Route::get('student_absense/{student_id}', 'MotherController@student_absense')->name('student_absense');

    Route::post('update_profile', 'MotherController@update_profile')->name('update_profile');
    Route::get('student_medical_report/{id}', 'MotherController@student_medical_report')->name('student_medical_report');

    Route::get('student_visit_request/{id}', 'MotherController@student_visit_request')->name('student_visit_request');
    Route::post('add_visit', 'MotherController@add_visit')->name('add_visit');

    Route::post('chat_with_admin', 'FatherController@chat_with_admin')->name('chat_with_admin');
    Route::get('message/{id}', 'FatherController@message')->name('message');
    

    Route::post('send_message', 'MotherController@send_message')->name('send_message');
    Route::get('communication', 'MotherController@communication')->name('communication');
    Route::get('new_message', 'MotherController@new_message')->name('new_message');
    Route::get('reply/{id}', 'MotherController@reply')->name('reply');
    Route::get('download_message_file/{file}', 'MotherController@download_message_file')->name('download_message_file');
    Route::post('send_reply', 'MotherController@send_reply')->name('send_reply');

    Route::get('notification', 'MotherController@notification')->name('notification');

    Route::get('download_time_table/{file}', 'MotherController@download_time_table')->name('download_time_table');
});
