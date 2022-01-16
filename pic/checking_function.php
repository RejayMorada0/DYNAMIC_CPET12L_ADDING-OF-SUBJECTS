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

//View All Subjects In Table
// SQL query to select data from database
$sql = "SELECT * FROM all_subjects ORDER BY yr_and_sem ASC ";
$result = $mysqli->query($sql);



// View Offer Subjects in modalBody
//need to search
$offer_stats ="Offer";

// SQL query to select data from database
$sql1 = "SELECT * FROM all_subjects WHERE offer_stats = '$offer_stats' ORDER BY yr_and_sem ASC ";
$offer_result = $mysqli->query($sql1);
$mysqli->close();


//display student request data in checking page
// source: https://stackoverflow.com/questions/1917576/how-do-i-pass-javascript-variables-to-php
if(isset($_COOKIE['stud_id'])) { 
    $stud_id = $_COOKIE['stud_id'];

    // Server is localhost
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
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
    $sql = "SELECT * FROM student_request WHERE stud_id = '$stud_id' ORDER BY yr_and_sem ASC ";
    $student_grades_result = $mysqli->query($sql);

}
?>