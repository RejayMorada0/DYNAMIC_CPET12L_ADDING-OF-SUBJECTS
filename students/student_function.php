<?php
// Ajax Method

function check_login($con)
{

	if(isset($_SESSION['email']))
	{

		$id = $_SESSION['email'];
		$query = "select * from student_accounts where email = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
}


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
$sql = "SELECT * FROM student_request ORDER BY yr_and_sem ASC ";
$display_student_req = $mysqli->query($sql);

//UPDATING OF GRADES
if(array_key_exists('updateAction', $_POST)) {
    updateAction();
}

//update function
function updateAction() {

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
    //$stud_id = $user_data['stud_id'];
	$sub_code = $_POST['sub_code'];
	$grades = $_POST['grades'];


    // sql to update a record
    $sql = "SELECT sub_code FROM all_subjects WHERE sub_code = '$sub_code' limit 1";
    $result = (mysqli_query($con, $sql));

    if ($result)
    {
        if($result && mysqli_num_rows($result) > 0){
 
            $update_result = "UPDATE `student_request` SET grades = '$grades' WHERE sub_code = '$sub_code'";
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