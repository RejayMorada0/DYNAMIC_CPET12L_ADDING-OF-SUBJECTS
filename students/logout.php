<?php 
session_start();

if(isset($_SESSION['email']))
{
	unset($_SESSION['email']);

}

// head to the nect page directory
$path = $_SERVER['SERVER_NAME'].'../../../signinlogin';
header("location: " . $path ."/index.php");
die;

?>