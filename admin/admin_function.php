
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
  
// SQL query to select data from database
$sql = "SELECT * FROM all_subjects ORDER BY yr_and_sem ASC ";
$result = $mysqli->query($sql);
$mysqli->close(); 


?>