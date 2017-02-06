<?php
	if($_SERVER['HTTPS'] !== 'on') {
		header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		exit();
	}

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once 'core/db_connect.php';
	$websiteName = 'Ride Request';

	$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
?>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo "$websiteName - $pageName - Under Construction!"; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css">