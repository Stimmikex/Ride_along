<?php
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/about', function() { return view('about'); });
Route::get('/home', 'HomeController@index');
Route::get('/logout', 'SocialAuthController@logout');
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
Route::get('/ride/planner', 'PlannerController@planner');

Route::group(['prefix' => 'profile'], function() {
	Route::get('/', 'ProfileController@index');
	Route::get('delete_plan', function() { return view('/user/ride_info/delete_plan'); });
	Route::get('schedule', function() { return view('/user/ride_info/schedule'); });
	Route::get('driver_info', function() { return view('/user/ride_info/driver_info'); });
	Route::get('passanger_info', function() { return view('/user/ride_info/passanger_info'); });
});

Route::group(['prefix' => 'tests'], function() {
	Route::get('carquery', function() { return view('/tests/carquery'); });
	Route::get('carapi', function() { return view('/tests/carapi'); });
});