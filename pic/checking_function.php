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



//DIsplay uploaded grades image of the student in anchor tag
// source: How to retrieve images from MySQL database and display in an html tag 
$stud_id = $_COOKIE['id'];
$sql2 = "SELECT * FROM student_accounts WHERE stud_id = '$stud_id'";
$image_result = $mysqli->query($sql2);
$image_data = mysqli_fetch_assoc($image_result);
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
else if(array_key_exists('submitAction', $_POST)) {
    submitAction();
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
  
            // Display the alert box 
            echo "<script>alert('Updated');</script>";

        }
        else {
         
            // Display the alert box 
            echo "<script>alert('Subject does not exist.');</script>";
           
        }
    }
    else {
        echo mysqli_connect_error();
    }
 
}


//submit function
function submitAction() {
    //codehere
    // status change in 'Wait for Approval'
    // Display the alert box 
    echo "<script>alert('Wait for Admin's Approval');</script>";

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

    // sql to update the record subject of the student in database
    $stud_stats ="Wait for Approval";
    $sql = "UPDATE student_accounts SET stud_stats ='$stud_stats' WHERE stud_id ='$stud_id' ";
    $result = (mysqli_query($con, $sql));

    
    // head to the nect page directory
    $path = $_SERVER['SERVER_NAME'].'../../../pic';
    header("location: " . $path ."/studentrecords.php");
    die;
                
}


?>