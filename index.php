<?php
	$pageName = 'Home';
?>
<!DOCTYPE html>
<html class="no-js" lang="IS_is">
	<head>
		<?php require_once 'inc/head.php'; ?>
	</head>
	<body>
		<?php require_once 'inc/header.php'; ?>
		<?php
			if ($logged === 'in') {
		?>
		<ul class="index_ul">
			<li><a href="offer.php">Offer a ride</a></li>
			<li><a href="request.php">Request a ride</a></li>
			<li><a href="planner.php">Dayplan</a></li>
			<li><a href="check_plan.php">Check for plans</a></li>
		</ul>
		<?php
			} else {
		?>
		<p>Please <a href="login.php">log in</a> to offer or request a ride.</p>
		<?php
			}
		?>
		<?php require_once 'inc/footer.php'; ?>
	</body>
</html>