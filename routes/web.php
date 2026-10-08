<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\WebAuthnController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('intro');
})->name('intro');

Route::get('/dashboard/login', function () {
    return view('admin.login');
})->name('signin');

Route::post('log', 'HomeController@log')->name('log');


Auth::routes();
Route::group(['middleware' => 'auth'], function () {

        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
        Route::resource('slider', 'SliderController')->middleware(['permission:slider']);
        Route::resource('about', 'AboutController')->middleware(['permission:about']);
        Route::resource('country', 'CountryController')->middleware(['permission:country']);
        Route::resource('branch', 'BranchController')->middleware(['permission:branch']);
        Route::resource('category', 'CategoryController')->middleware(['permission:category']);
        Route::resource('sub_category', 'SubCategoryController')->middleware(['permission:sub']);
        Route::resource('type', 'TypeController')->middleware(['permission:type']);

        Route::resource('roles', 'RoleController')->middleware(['permission:security']);
        Route::resource('users', 'UserController')->middleware(['permission:security']);

        Route::resource('coach', 'CoachController')->middleware(['permission:coach']);

        Route::resource('sessions', 'SessionController')->middleware(['permission:sessions']);
        Route::resource('product', 'ProductController')->middleware(['permission:products']);

  
    
});


