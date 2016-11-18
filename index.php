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
		<ul>
			<li><a href="#">Offer a ride</a></li>
			<li><a href="#">Request a ride</a></li>
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