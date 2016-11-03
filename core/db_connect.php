<?php
	$dbuser = 'id139069_ride_request';
	$dbpass = 'Tækniskólinn2016';
	$dbhost = 'localhost';
	$dbname = 'id139069_ride_request';

	try {
		$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		echo "Connection failed! ".$e->getMessage();
	}
?>