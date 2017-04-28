@extends('layouts.app')
@section('content')
@php
	$scheduleQuery = "SELECT id,
								plan_name
							FROM planner
								WHERE user_id=:user_id";
	$scheduleRes = $db->prepare($scheduleQuery);
	$scheduleRes->bindParam(':user_id', $userID);
	$scheduleRes->execute();

	@if ($scheduleRes->rowCount() == 0)
		echo '<h4>Nothing found</h4>';
	@else
		$locationQuery = "SELECT name FROM location WHERE id = :location_id";
		$locationRes = $db->prepare($locationQuery);
		echo '<ul class="footer_planner_ul">';
		
		while ($row = $scheduleRes->fetch(PDO::FETCH_ASSOC)) {
			echo '<h4>'.$row['plan_name'].'</h4>';
			echo '<a href="info_plan.php?id='.$row['id'].'">Info</a>';
			echo '<li><form method="post">';
			@endphp
				<input type="submit" name="delete_<?php echo $row['id']; ?>" value="Delete" class="delete_planner"
			@php
				@if (isset($_POST['delete_'.$row['id']]))
					echo "true";
					$deleteQuery = "DELETE FROM weekplanner WHERE plan_id = :plan_id";
					$deleteRes = $db->prepare($deleteQuery);
					$deleteRes->bindParam(':plan_id', $row['id']);
					$deleteRes->execute();
					$deleteRes = null;

					$deletePlan = "DELETE FROM planner WHERE id = :plans_id";
					$deletePlanRes = $db->prepare($deletePlan);
					$deletePlanRes->bindParam(':plans_id', $row['id']);
					$deletePlanRes->execute();
					$deletePlanRes = null;

					header('Location: profile.php');
				@endif
			echo '</form>';
			echo '</li>';
		}
		echo '</ul>';
	@endif
@endphp
@endsection