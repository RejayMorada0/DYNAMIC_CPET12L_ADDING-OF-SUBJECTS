
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

/* cycycycyc
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        alert("Hello World");
    }
} else {
    echo "0 results";
}
*/
      



// View Offer Subjects in modalBody
//need to search
$offer_stats ="Offer";

// SQL query to select data from database
$sql1 = "SELECT * FROM all_subjects WHERE offer_stats = '$offer_stats' ORDER BY yr_and_sem ASC ";
$offer_result = $mysqli->query($sql1);
$mysqli->close();


// source: https://stackoverflow.com/questions/20738329/how-to-call-a-php-function-on-the-click-of-a-button
// ADD and REMOVE and CHANGE FUNCTION

if(array_key_exists('removeAction', $_POST)) {
    removeAction();
}
else if(array_key_exists('addAction', $_POST)) {
    addAction();
}
else if(array_key_exists('changeAction', $_POST)) {
    changeAction();
}


//Remove subject in table
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
            
            // Display the alert box 
            echo "<script>alert('Deleted');</script>";
        
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


//Add subject in table
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

                // Display the alert box 
                echo "<script>alert('Subject Code already exist.');</script>";
            
            }
            else 
            {
              
                $offer_stats = "Not Offer";
                $add_result = "INSERT INTO all_subjects (sub_code, sub_name, yr_and_sem, offer_stats) VALUES ('$sub_code','$sub_name','$yr_and_sem','$offer_stats')";
                $result = (mysqli_query($con, $add_result));

                // Display the alert box 
                echo "<script>alert('Successfully Added');</script>";
                  
            }
        }
        
    }
    else 
    {

        // Display the alert box 
        echo "<script>alert('Complete all fields');</script>";

    }
}


//Update Offer status of the subject in table
function changeAction() {
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
    $sub_code = $_POST['sub_code1'];
    $offer_stats = filter_input(INPUT_POST, 'offer_stats', FILTER_SANITIZE_STRING);


    // sql search the sub_code
    $sql = "SELECT sub_code FROM all_subjects WHERE sub_code = '$sub_code' limit 1";
    $result = (mysqli_query($con, $sql));

    if ($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $update_result = "UPDATE all_subjects SET offer_stats='$offer_stats' WHERE sub_code = '$sub_code'";
                $result = (mysqli_query($con, $update_result));
                        
                // Display the alert box 
                echo "<script>alert('Successfully updated the offer status');</script>";
    
            }
            else
            {

                // Display the alert box 
                echo "<script>alert('Subject Code does not exist.');</script>";
   
            }
        }
}


?>

