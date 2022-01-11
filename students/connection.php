<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "student_accounts";


if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    die("Failed to connect");
}

?>