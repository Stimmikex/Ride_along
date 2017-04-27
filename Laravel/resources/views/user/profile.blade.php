@extends('layouts.app')
@section('content')
<?php

	/*$userQuery = "SELECT fname, lname, oauth_uid FROM users WHERE id=:uid LIMIT 1";
	$userRes = $db->prepare($userQuery);
	$userRes->bindParam(':uid', $_SESSION['user_id']);
	$userRes->execute();

	while ($row = $userRes->fetch(PDO::FETCH_ASSOC)) {
		$fromPicture = 'http://graph.facebook.com/'.$row['oauth_uid'].'/picture?width=300';
	}*/
?>
{{-- @php
	$fb_user_id = DB::table('social_accounts')->get('provider_user_id')
	$fb_check = DB::table('social_accounts')->get('provider')
	// @if ($fb_check = 'facebook') {
	// 	$fb_user_img = 'http://graph.facebook.com/'.$fb_user_img.'/picture?width=300';
	// }
@endphp
<div>
	<p>{{ $fb_user_id }}</p>
	<p>{{ $fb_check }}</p>
	<img src='{{ $fb_user_img }}'>
</div> --}}
<div class="pro_info">
	@foreach ($output as $line)
		<p>{{ $line }}</p>
	@endforeach

	<p>Rating: </p>
</div>
<h2>Get a Ride Controlls</h2>
<div class="pro_icons">
	<a href="{{ url('profile/notification') }}" class="pro_note"><img src="{{ config('paths.icons') }}notification.png">Notifications <span class="notification_count"></span></a>
	<a href="{{ url('profile/delete_plan') }}" class="pro_del"><img src="{{ config('paths.icons') }}delete.png">Delete Plans</a>
	<a href="{{ url('profile/schedule') }}" class="pro_sch"><img src="{{ config('paths.icons') }}schedule.png">Schedule</a>
</div>
<h2>Carpooling Info</h2>
<div class="pro_icons">
	<a href="{{ url('profile/driver_info') }}" class="pro_driver"><img src="{{ config('paths.icons') }}driver_icon.png">Driver Info</a>
	<a href="{{ url('profile/passanger_info') }}" class="pro_pass"><img src="{{ config('paths.icons') }}passanger_icon.png">Passanger Info</a>
</div>
@endsection