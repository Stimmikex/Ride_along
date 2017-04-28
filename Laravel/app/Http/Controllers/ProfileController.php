<?php
namespace App\Http\Controllers;

use Auth;
use DB;

class ProfileController extends Controller
{
	public function index()
	{
		$output = array();

		if (!Auth::guest())
		{
			$user = Auth::getUser()['attributes'];
			//dd(Auth::getUser());

			$output[] = 'Name: '.$user['name'];
			$output[] = 'Email: '.$user['email'];

			$user_img = $this->get_profile_img($user);
		}
		else
		{
			$output[] = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
		}

		return view('user.profile', compact('output', 'user_img'));
	}
	public function get_profile_img($user)
	{
		//dd($user);

		$fb_user_id = DB::table('social_accounts')->select('provider_user_id')->where('user_id', $user['id'])->get();
		$fb_check = DB::table('social_accounts')->select('provider')->where('user_id', $user['id'])->get();

		dd($fb_user_id);

		if ($fb_check = 'facebook') {
			dd($fb_user_id->get('items'));
			$fb_user_img = 'http://graph.facebook.com/'.$fb_user_id->get('items').'/picture?width=300';
		}

		return $fb_user_img;
	}
}
