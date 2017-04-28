<?php
Auth::routes();

Route::get('/', function () { return view('welcome'); });
Route::get('/about', function() { return view('about'); });
Route::get('/profile/delete_plan', function() { return view('/user/ride_info/delete_plan'); });
Route::get('/profile/schedule', function() { return view('/user/ride_info/schedule'); });
Route::get('/profile/driver_info', function() { return view('/user/ride_info/driver_info'); });
Route::get('/profile/passanger_info', function() { return view('/user/ride_info/passanger_info'); });
Route::get('/home', 'HomeController@index');
Route::get('/logout', 'SocialAuthController@logout');
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
Route::get('/profile', 'ProfileController@index');
Route::get('/ride/planner', 'PlannerController@planner');