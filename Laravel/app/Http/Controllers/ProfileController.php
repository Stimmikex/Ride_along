<?php
namespace App\Http\Controllers;

use Auth;

class ProfileController extends Controller
{
	public function index()
	{
		// echo '<h1>Profile</h1>';
		// echo '<div class="profile_img_main">';
		// 	echo '<div class="profile_img_big"><img src="'.$user_data['picture'].'">';
		// 	echo '<p class="profile_name">'.$user_data['fname'].' '.$user_data['lname'].'</p></div>';
		// echo '</div>';

		$output = array();

		if (!Auth::guest())
		{
			$user = Auth::getUser()['attributes'];
			//dd(Auth::getUser());

			$output[] = 'Name: '.$user['name'];
			$output[] = 'Email: '.$user['email'];
		}
		else
		{
			$output[] = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
		}

		return view('user.profile', compact('output'));
	}
}
