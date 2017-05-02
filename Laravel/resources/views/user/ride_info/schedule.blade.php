@extends('layouts.app')
@section('content')
<div class="week_table">
	<?php
		if (Auth::guest()) {
			Redirect::to('/home');
		}
		$user_id = Auth::getUser()['attributes']['id'];
		$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
		$day = date("N") - 1;

		for ($i=0; $i < count($days); $i++) {
			$scheduleRes = DB::select("CALL get_schedule_user($user_id, $i)");
			
			echo '<pre>';
			print_r($scheduleRes);
			echo '</pre>';

			// $locationQuery = "SELECT name FROM location WHERE id = :location_id";
			// $locationRes = $db->prepare($locationQuery);

			// echo '<ul class="schedule_ul">';
			// echo '<h4>'.$days[$i].'</h4>';

			// while ($row = $scheduleRes->fetch(PDO::FETCH_ASSOC)) {
			// 	// echo '<h4>'.$days[$row['day']].'</h4>';
			// 	echo '<li class="schedule">Time: '.$row['leaving'].'<br>';
			// 	// echo $days[$day].", ".$row['leaving'].", ".$row['to_id'].", ".$row['from_id'].", ".$row['plan_id'];
			// 	$locationRes->bindParam(':location_id', $row['from_id']);
			// 	$locationRes->execute();
				
			// 	while ($row2 = $locationRes->fetch(PDO::FETCH_ASSOC)) {
			// 		echo 'From: '.$row2['name'].'<br>';
			// 	}
				
			// 	$locationRes->bindParam(':location_id', $row['to_id']);
			// 	$locationRes->execute();

			// 	while ($row2 = $locationRes->fetch(PDO::FETCH_ASSOC)) {
			// 		echo 'To: '.$row2['name'].'<br>';
			// 	}
			// 	echo '</li>';
			// }

			// echo '</ul>';
		}

	?>
</div>
@endsection