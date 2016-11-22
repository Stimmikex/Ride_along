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
					<li><label for="day1"><input type="checkbox" name="mon" id="day1"> Monday</label></li>
					<li><label for="day2"> <input type="checkbox" name="thu" id="day2"> Thursday</label></li>
					<li><label for="day3"><input type="checkbox" name="wed" id="day3"> Wednesday</label></li>
					<li><label for="day4"><input type="checkbox" name="tue" id="day4"> Tuesday</label></li>
					<li><label for="day5"><input type="checkbox" name="fri" id="day5"> Friday</label></li>
					<li><label for="day6"><input type="checkbox" name="sat" id="day6"> Saturday</label></li>
					<li><label for="day7"><input type="checkbox" name="sun" id="day7"> Sunday</label></li>
				</ul>
			</div>
		<?php require_once 'inc/footer.php'; ?>
	</body>
</html>