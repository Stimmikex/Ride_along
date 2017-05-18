@extends('layouts.app')
@section('content')
<?php
	// $SelectQuery = "SELECT id FROM request WHERE user_id = :userID AND available = 1 LIMIT 1";
	// $SelectRes = $db->prepare($SelectQuery);
	// $SelectRes->bindParam(':userID', $userID);
	// $SelectRes->execute();

	// if ($SelectRes->rowCount() > 0) {
	// 	echo '<form action="" method="POST">';
	// 	echo '<input type="submit" name="cancel" value="Cancel Request">';
	// 	echo '</form>';

	// 	if (isset($_POST['cancel'])) {
	// 		$rideID = null;

	// 		while ($row = $SelectRes->fetch(PDO::FETCH_ASSOC)) {
	// 			$rideID = $row['id'];
	// 		}

	// 		$updateQuery = "UPDATE request SET available=0 WHERE id=:id";
	// 		$updateRes = $db->prepare($updateQuery);
	// 		$updateRes->bindParam(':id', $rideID);
	// 		$updateRes->execute();
	// 		$updateRes = null;

	// 		header('Location: request.php');
	// 	}
	// } else {
?>
@if($submitted)
	<h3>{{ $output }}</h3>
@else
	<form action="/ride/request_ride/submit" method="POST" accept-charset="UTF-8">
		<label>Pickup location</label>
		<select name="from" class="request_location">
			<option value="-1" disabled selected>Pick</option>
			@for($i = 0; $i < count($locations); $i++)
				<option value="{{ $locations[$i]->id }}">{{ $locations[$i]->location_name }}</option>
			@endfor
		</select>
		<label>Dropoff location</label>
		<select name="to" class="request_location">
			<option value="-1" disabled selected>Pick</option>
			@for($i = 0; $i < count($locations); $i++)
				<option value="{{ $locations[$i]->id }}">{{ $locations[$i]->location_name }}</option>
			@endfor
		</select>
		<label>Message</label>
		<div class="input-field">
			<textarea class="request_message" id="textarea" name="message" maxlength="200"></textarea>
			<div id="textarea_feedback"></div>
		</div>
		<input type="submit" name="submit" value="Add" class="request_submit">
	</form>
@endif
<script type="text/javascript">
	$(document).ready(function() {
	    var text_max = 200;
	    $('#textarea_feedback').html(text_max + ' characters remaining');

	    $('#textarea').on('keyup', function() {
	        var text_length = $('#textarea').val().length;
	        var text_remaining = text_max - text_length;

	        $('#textarea_feedback').html(text_remaining + ' characters remaining');
	    });
	});
</script>
@endsection