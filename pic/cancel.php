<?php 

// call the connections
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "adding_subjects_db";
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


//error handling
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


//input was posted
$stud_id = $_COOKIE['id'];
$remarks = '';

$update_result = "UPDATE `student_request` SET remarks = '$remarks' WHERE stud_id = '$stud_id' ";
$result = (mysqli_query($con, $update_result));


// head to the nect page directory
$path = $_SERVER['SERVER_NAME'].'../../../pic';
header("location: " . $path ."/pic.php");
die;

?>