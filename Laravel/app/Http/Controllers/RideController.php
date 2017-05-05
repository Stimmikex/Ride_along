<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RideController extends Controller
{
	public function offer_ride()
	{
		$this->logincheck();

		return view('ride.offer');
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