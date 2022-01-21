<?php

//source: https://www.geeksforgeeks.org/how-to-fetch-data-from-localserver-database-and-display-on-html-table-using-php/
// PHP code to establish connection
// with the localserver

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


//View All Student Account In Table
// SQL query to select data from database
$stud_stats = "Processing";
$stud_stats1 = "Requested";
$sql = "SELECT * FROM student_accounts WHERE stud_stats ='$stud_stats' OR stud_stats = '$stud_stats1' ORDER BY stud_id ASC ";
$student_data = $mysqli->query($sql);

?>