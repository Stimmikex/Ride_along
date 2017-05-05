<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RideController extends Controller
{
	public function offer_ride()
	{
		$this->logincheck();

		$submitted = false;
		$locations = DB::select('CALL get_all_locations()');

		return view('ride.offer', compact('locations', 'submitted'));
	}

	public function offer_ride_submit(Request $req)
	{
		$user_id = $this->getUserID();

		$submitted = true;
		$output = null;

		$from_id = intval($req->input('from'));
		$to_id = intval($req->input('to'));

		if ($from_id == -1 || $to_id == -1)
			$output .= "Please select both locations.<br>";
		else
		{
			DB::select("CALL add_ride($user_id, $to_id, $from_id, null, 0)");
			$output .= "Offer added";
		}

		return view('ride.offer', compact('output', 'submitted'));
	}

	public function request_ride()
	{
		$this->logincheck();

		return view('ride.request');
	}

	public function planner()
	{
		$this->logincheck();

		return view('ride.planner');
	}

	public function check_plan()
	{
		$this->logincheck();

		return view('ride.check_plan');
	}
}