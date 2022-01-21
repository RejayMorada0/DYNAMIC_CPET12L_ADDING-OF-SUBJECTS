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
$stud_stats = 'Wait for Approval';
$stud_stats1 = 'Approved';
$sql = "SELECT * FROM student_accounts WHERE stud_stats = '$stud_stats' OR stud_stats = 'stud_stats1' limit 1";
$result = $mysqli->query($sql);

if ($result){
    if($result && mysqli_num_rows($result) > 0){
        $remarks = "To Offer";
        $remarks1 = "Approved";
        $sql1 = "SELECT * FROM student_request WHERE remarks = '$remarks' OR remarks = '$remarks1' ORDER BY yr_and_sem ASC ";
        $display_student_req = $mysqli->query($sql1);
    }
}
else {
    echo mysqli_connect_error();
}



?>