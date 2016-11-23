<?php
	$pageName = 'Planner';
?>
<!DOCTYPE html>
<html class="no-js" lang="IS_is">
	<head>
		<?php require_once 'inc/head.php'; ?>
	</head>
	<body>
		<?php require_once 'inc/header.php'; ?>
			<div class="day_select">
				<ul>
					<li><label for="day1"><input type="checkbox" name="dy[]" id="day1" value="1"> Monday</label></li>
						<ul id="day1_ul">
							<li>
								<label>Time</label>
								<input type="text" name="day1-drop" class="day_drop">
								<label>Nearest Location</label>
								<select name="from" class="request_location">
									<option value="-1" disabled selected>Pick</option>
								    <?php
										$query = "SELECT id, name FROM location ORDER BY name ASC";
										$res = $db->prepare($query);
										$res->execute();

										while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
											echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
										}
									?>
								</select>
								<label>Location of dropoff</label>
								<select name="to" class="request_location">
									<option value="-1" disabled selected>Pick</option>
								    <?php
										$res->execute();

										while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
											echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
										}

										$res = null;
									?>
								</select>
								<iframe
									width="100%"
									height="300"
									frameborder="0" style="border:0"
									src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyAGo8wWQeVgZk7so5t2FAJMUYnmB9zY2rw&origin=Oslo+Norway&destination=Telemark+Norway" 
									allowfullscreen>
								</iframe>
							</li>
						</ul>
					<li><label for="day2"><input type="checkbox" name="dy[]" id="day2" value="2"> Thursday</label></li>
						<ul id="day2_ul">
							<li>
								<label>Time</label>
								<input type="text" name="day1-drop" class="day_drop">
							</li>
						</ul>
					<li><label for="day3"><input type="checkbox" name="dy[]" id="day3" value="3"> Wednesday</label></li>
						<ul id="day3_ul">
							<li>
								<label>Time</label>
								<input type="text" name="day1-drop" class="day_drop">
							</li>
						</ul>
					<li><label for="day4"><input type="checkbox" name="dy[]" id="day4" value="4"> Tuesday</label></li>
						<ul id="day4_ul">
							<li>
								<label>Time</label>
								<input type="text" name="day1-drop" class="day_drop">
							</li>
						</ul>
					<li><label for="day5"><input type="checkbox" name="dy[]" id="day5" value="5"> Friday</label></li>
						<ul id="day5_ul">
							<li>
								<label>Time</label>
								<input type="text" name="day1-drop" class="day_drop">
							</li>
						</ul>
					<li><label for="day6"><input type="checkbox" name="dy[]" id="day6" value="6"> Saturday</label></li>
						<ul id="day6_ul">
							<li>
								<label>Time</label>
								<input type="text" name="day1-drop" class="day_drop">
							</li>
						</ul>
					<li><label for="day7"><input type="checkbox" name="dy[]" id="day7" value="7"> Sunday</label></li>
						<ul id="day7_ul">
							<li>
								<label>Time</label>
								<input type="text" name="day1-drop" class="day_drop">
							</li>
						</ul>
				</ul>
			</div>
		<?php require_once 'inc/footer.php'; ?>
		<script type="text/javascript">
		
		for (var i = 1; i <= 7; i++) {
			console.log(i);
			$("#day"+[i]+"_ul").css("display", "none");

			$('#day'+[i]).on("click", function() {
				if ($('#day1').is(":checked")) {
					$('#day1_ul').show();
				}
				else {
					$('#day1_ul').hide();
				}
			});
		}
			// $("#day1_ul").css("display", "none");

			// $('#day1').on("click", function() {
			// 	if ($('#day1').is(":checked")) {
			// 		$('#day1_ul').show();
			// 	}
			// 	else {
			// 		$('#day1_ul').hide();
			// 	}
			// });
			

			// https://www.google.com/maps/embed/v1/directions
			//   ?key=AIzaSyAGo8wWQeVgZk7so5t2FAJMUYnmB9zY2rw
			//   &origin=Oslo+Norway
			//   &destination=Telemark+Norway
			//   &avoid=tolls|highways
		</script>
	</body>
</html>