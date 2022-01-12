
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
    $sub_code = $_POST['sub_code'];

    // sql to delete a record
    $sql = "SELECT sub_code FROM all_subjects WHERE sub_code = '$sub_code' limit 1";
    $result = (mysqli_query($con, $sql));

    if ($result)
    {
        if($result && mysqli_num_rows($result) > 0){
 
            $del_result = "DELETE FROM `all_subjects` WHERE sub_code = '$sub_code'";
            $result = (mysqli_query($con, $del_result));

            // Message
            function function_alert($message) {
                    
                // Display the alert box 
                echo "<script>alert('$message');</script>";
            }
            // Message call
            function_alert("Deleted");

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



function addAction() {

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


    //inputs was posted
    $sub_code = $_POST['sub_code'];
    $sub_name = $_POST['sub_name'];
    $yr_and_sem = filter_input(INPUT_POST, 'yr_and_sem', FILTER_SANITIZE_STRING);

    if(!empty($sub_code) && !empty($sub_name) && !empty($yr_and_sem))
    {
        // sql search the sub_code
        $sql = "SELECT sub_code FROM all_subjects WHERE sub_code = '$sub_code' limit 1";
        $result = (mysqli_query($con, $sql));

        if ($result)
        {
            if($result && mysqli_num_rows($result) > 0){

                // Function definition
                function function_alert1($message1) {
                        
                    // Display the alert box 
                    echo "<script>alert('$message1');</script>";
                }
                // Function call
                function_alert1("Subject Code already exist.");
                //mysqli_close($con);
            }
            else 
            {
              
                $offer_stats = "Not Offer";
                $add_result = "INSERT INTO all_subjects (sub_code, sub_name, yr_and_sem, offer_stats) VALUES ('$sub_code','$sub_name','$yr_and_sem','$offer_stats')";
                $result = (mysqli_query($con, $add_result));

                // Message
                function function_alert2($message2) {
                        
                    // Display the alert box 
                    echo "<script>alert('$message2');</script>";
                }
                // Message call
                function_alert2("Successfully Added");    
                
            }
        }
        
    }
    else 
    {
        // Function definition
        function function_alert0($message1) {
                        
            // Display the alert box 
            echo "<script>alert('$message1');</script>";
        }
        // Function call
        function_alert0("Complete all fields");
        //mysqli_close($con);
    }
}


?>

