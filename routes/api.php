<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v-client')->group(function () {
    
         Route::post('register', 'MobileApiController@register');
        Route::post('login', 'MobileApiController@login');

        Route::get('genders','MobileApiController@genders');
        Route::get('countries','MobileApiController@countries');

        
        Route::middleware(['auth:api_users', 'user'])->group(function () {

            Route::get('user_profile_completion','MobileApiController@user_profile_completion');
            Route::get('check','MobileApiController@check');
            Route::post('complete_profile','MobileApiController@complete_profile');
            Route::post('delete_user', 'MobileApiController@delete_user');

            
            
        });

});