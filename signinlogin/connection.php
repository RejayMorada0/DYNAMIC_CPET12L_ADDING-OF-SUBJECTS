<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "adding_subjects_db";


if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    die("Failed to connect");
}

?>