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
if(isset($_COOKIE['id'])) { 
    $stud_id = $_COOKIE['id'];
  
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
    $mysqli->close();

}

if(array_key_exists('remarkAction', $_POST)) {
    remarkAction();
}

//remark function
function remarkAction() {
    
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
	$sub_code = $_POST['sub_code'];
	$remarks = $_POST['remarks'];

 


    // sql to update the record subject of the student in database
    $sql = "SELECT * FROM student_request WHERE stud_id ='$stud_id' AND sub_code = '$sub_code' limit 1";
    $result = (mysqli_query($con, $sql));

    if ($result)
    {
        if($result && mysqli_num_rows($result) > 0){
 
            $update_result = "UPDATE `student_request` SET remarks = '$remarks' WHERE sub_code = '$sub_code' AND stud_id = '$stud_id' ";
            $result = (mysqli_query($con, $update_result));

            // Message
            function function_alert($message) {
                    
                // Display the alert box 
                echo "<script>alert('$message');</script>";
            }
            // Message call
            function_alert("Updated");

        }
        else {
            // Function definition
            function function_alert1($message1) {
                    
                // Display the alert box 
                echo "<script>alert('$message1');</script>";
            }
            // Function call
            function_alert1("Subject does not exist.");
            //mysqli_close($con);
        }
    }
    else {
        echo mysqli_connect_error();
    }
 
}







?>