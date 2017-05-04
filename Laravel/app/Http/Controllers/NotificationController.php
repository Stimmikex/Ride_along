<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
	public function __construct()
	{
		$this->logincheck();
	}

	public function notification_list()
	{
		$notification_list = [];

		return view('user.notifications.notification_list', compact('notification_list'));
	}

	public function show_notification($nid)
	{
		$notification_data = [];

		return view('user.notifications.show_notification', compact('notification_data'));
	}
}
