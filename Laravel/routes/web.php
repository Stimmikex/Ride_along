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
    return view('welcome');
});

Route::get('/welcome', function() {
    return 'Hello, World!';
});

Route::get('/about', function() {
	return view('about');
});

Route::get('/profile/delete_plan', function() {
	return view('/user/ride_info/delete_plan');
});

Route::get('/profile/schedule', function() {
	return view('/user/ride_info/schedule');
});

Route::get('/profile/driver_info', function() {
	return view('/user/ride_info/driver_info');
});

Route::get('/profile/passanger_info', function() {
	return view('/user/ride_info/passanger_info');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/logout', 'Auth\AuthController@logout');

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::get('/profile', 'ProfileController@index');
