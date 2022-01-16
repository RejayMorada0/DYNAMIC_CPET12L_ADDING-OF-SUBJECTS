<?php
// Server is localhost
$dbhost = "localhost";

// Username is root
$dbuser = "root";
$dbpass = "";

// Database name
$dbname = "adding_subjects_db";

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}


//View Student Requests In Table
// SQL query to select data from database
$remarks = "To Offer";
$sql = "SELECT * FROM student_request WHERE remarks = '$remarks' ORDER BY yr_and_sem ASC ";
$display_student_req = $mysqli->query($sql);


?>