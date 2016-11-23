<?php
	$pageName = 'Planner';

	$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
?>
<!DOCTYPE html>
<html class="no-js" lang="IS_is">
	<head>
		<?php require_once 'inc/head.php'; ?>
	</head>
	<body>
		<?php require_once 'inc/header.php'; ?>
		<?php
			$locationQuery = "SELECT id, lat, location.long AS lon FROM location";
			$locationRes = $db->prepare($locationQuery);
			$locationRes->execute();

			echo '<div style="display: none;">';

			while ($row = $locationRes->fetch(PDO::FETCH_ASSOC)) {
				echo '<span id="location'.$row['id'].'">'.$row['lat'].';'.$row['lon'].'</span>';
			}

			echo '</div>';

			$locationQuery = $locationRes = null;
		?>
		<form method="post">
			<div class="day_select">
				<ul>
					<?php
						for ($i = 0; $i < count($days); $i++) {
							echo '<li><input type="checkbox" name="dy[]" id="day'.$i.'" class="day" value="'.$i.'"><label for="day'.$i.'"> '.$days[$i].'</label>';
							echo '<ul id="day'.$i.'_ul" class="day_ul"><li>';
							echo '<label>Time</label><input type="text" name="day'.$i.'-drop" class="day_drop"><label>Nearest Location</label><select value="'.$i.'" name="from'.$i.'" id="from'.$i.'" class="request_location"><option value="-1" disabled selected>Pick</option>';

							$query = "SELECT id, name FROM location ORDER BY name ASC";
							$res = $db->prepare($query);
							$res->execute();

							while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
								echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
							}

							echo '</select><label>Location of dropoff</label>';
							echo '<select name="to'.$i.'" id="to'.$i.'" class="request_location"><option value="-1" disabled selected>Pick</option>';

							$res->execute();

							while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
								echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
							}

							$res = null;

							echo '</select><iframe width="100%" height="300" frameborder="0" style="border:0"
									src="" id="map'.$i.'"
									allowfullscreen></iframe>';
							echo '</li></ul></li>';
						}
					?>
				</ul>
			</div>
			<div>
				<input type="submit" name="submit">
				<?php
					if (isset($_POST['submit'])) {

					} 
				?>
			</div>
		</form>
		<?php require_once 'inc/footer.php'; ?>
		<script type="text/javascript">
			for (var i = 0; i < 7; i++) {
				$("#day"+[i]+"_ul").hide();
			}

			$('.day').on('click', function() {
				if ($(this).is(":checked")) {
		 			$(this).nextAll('.day_ul').show();
				}
				else {
					$(this).nextAll('.day_ul').hide();
				}
			});

			$('iframe').attr('src', 'https://www.google.com/maps/embed/v1/directions?key=AIzaSyC32v6xptkwqC_dhbKPWtsIrc4C1RX7Chs&origin=Oslo+Norway&destination=Telemark+Norway');

			$('select').on('change', function() {
				//for (var i = 0; i < 7; i++) {
					let i = $(this).val();
					console.log(i);

					if ($('#from' + i).children(':selected').val() != '-1' && $('#to' + i).children(':selected').val() != '-1') {
						let fromId = $('#from' + i).val();
						let fromLat = $('#location' + fromId).text().split(';')[0];
						let fromLong = $('#location' + fromId).text().split(';')[1];

						let toId = $('#to' + i).val();
						let toLat = $('#location' + toId).text().split(';')[0];
						let toLong = $('#location' + toId).text().split(';')[1];

						console.log(fromId + ',' + fromLat + ',' + fromLong);

						$('#map' + i).attr('src', 'https://www.google.com/maps/embed/v1/directions?key=AIzaSyC32v6xptkwqC_dhbKPWtsIrc4C1RX7Chs&' +
							'origin=' + fromLat + ',' + fromLong +
							'&destination=' + toLat + ',' + toLong);
					}
				//}
			});

			// https://www.google.com/maps/embed/v1/directions
			//   ?key=AIzaSyAGo8wWQeVgZk7so5t2FAJMUYnmB9zY2rw
			//   &origin=Oslo+Norway
			//   &destination=Telemark+Norway
			//   &avoid=tolls|highways
		</script>
	</body>
</html>