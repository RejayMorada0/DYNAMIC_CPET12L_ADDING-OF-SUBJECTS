
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


// source: https://stackoverflow.com/questions/20738329/how-to-call-a-php-function-on-the-click-of-a-button
// ADD and REMOVE FUNCTION

if(array_key_exists('removeAction', $_POST)) {
    removeAction();
}
else if(array_key_exists('addAction', $_POST)) {
    addAction();
}
function removeAction() {
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

    //inputs was posted
    $sub_code = $_POST['sub_code'];

    $query0 = "SELECT sub_code FROM all_subjects WHERE sub_code = '$sub_code'";
    $result0 =$mysqli->query($query0);

    if ($result0)
    {
        $del_result = "DELETE FROM `all_subjects` WHERE sub_code = '$sub_code'";
        $mysqli->query($del_result);
        $mysqli->close();
        
       
    }
    else if (($result0) != ($sub_code)){
        // Function definition
        function function_alert1($message) {
            
            // Display the alert box 
            echo "<script>alert('$message');</script>";
        }
        // Function call
        function_alert1("Subject Code is not exist");
    }
    else{
        // Function definition
        function function_alert2($message) {
            
            // Display the alert box 
            echo "<script>alert('$message');</script>";
        }
        // Function call
        function_alert2("Subject Code is not exist");
    }
    
   

}




function addAction() {
    //inputs was posted
    $sub_code = $_POST['sub_code'];
    $sub_name = $_POST['sub_name'];
    $yr_and_sem = $_POST['yr_and_sem'];

    if(!empty($sub_code) && !empty($sub_name) && !empty($yr_and_sem))
    {

    }
}


?>

