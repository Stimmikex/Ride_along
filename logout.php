<?php
include_once 'core/fb_config.php';
if(array_key_exists('logout',$_GET))
{
	$facebook->destroySession();
	//session_start();
	unset($_SESSION['userdata']);
	session_destroy();
}
header('Location:index.php');
?>