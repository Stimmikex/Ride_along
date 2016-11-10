<?php
	$dbuser = '2509972569';
	$dbpass = 'mypassword';
	$dbhost = 'tsuts.tskoli.is';
	$dbname = '2509972569_hopverkefni_h2016';

	try {
		$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		echo "Connection failed! ".$e->getMessage();
	}
?>