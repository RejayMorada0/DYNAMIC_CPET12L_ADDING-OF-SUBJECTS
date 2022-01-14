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


?>