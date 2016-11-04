<?php
	$dbuser = 'riderequest';
	$dbpass = '';
	$dbhost = 'localhost';
	$dbname = 'my_riderequest';

	try {
		$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		echo "Connection failed! ".$e->getMessage();
	}
?>