<?php

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
     return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
/*user*/

Route::get('/users-listing', 'UserController@index')->name('users-listing');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile/update', 'UserController@update')->name('profile-update');
Route::get('/change-password-form', 'UserController@showChangePasswordForm')->name('change-password-form');
Route::post('/update-change-password', 'UserController@postChangePassword')->name('update-change-password');



