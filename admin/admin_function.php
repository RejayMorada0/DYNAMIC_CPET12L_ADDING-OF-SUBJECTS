
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
    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


    //error handling
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //inputs was posted
    $sub_code = $_POST['sub_code'];

    // sql to delete a record
    $sql = "SELECT sub_code FROM all_subjects WHERE sub_code = '$sub_code' limit 1";
    $result = (mysqli_query($con, $sql));

    if ($result)
    {
        if($result && mysqli_num_rows($result) > 0){
 
            $del_result = "DELETE FROM `all_subjects` WHERE sub_code = '$sub_code'";
            $result = (mysqli_query($con, $del_result));

            //reload the table
            //$path = $_SERVER['SERVER_NAME'].'../../../admin';
            //header("location: " . $path ."/admin.php");
            //die;

            // Message
            function function_alert($message) {
                    
                // Display the alert box 
                echo "<script>alert('$message');</script>";
            }
            // Message call
            function_alert("Deleted");


            // SQL query to select data from database
            $sql = "SELECT * FROM all_subjects ORDER BY yr_and_sem ASC ";
            $result = (mysqli_query($con, $sql));
            mysqli_close($con);
        }
    }
 
    // Function definition
    function function_alert1($message1) {
            
        // Display the alert box 
        echo "<script>alert('$message1');</script>";
    }
    // Function call
    function_alert1("Subject does not exist.");
    //mysqli_close($con);

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

