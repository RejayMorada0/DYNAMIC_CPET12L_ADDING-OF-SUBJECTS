<?php

function check_login($con)
{

	if(isset($_SESSION['email']))
	{

		$email = $_SESSION['email'];
		$query = "SELECT * from student_accounts WHERE email = '$email' LIMIT 1";

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
$remarks = "To Offer";
$remarks1 = "Approved";
$sql = "SELECT * FROM student_request WHERE remarks = '$remarks' OR remarks = '$remarks1' ORDER BY yr_and_sem ASC ";
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
    $stud_id = $_POST['stud_id'];
    $remarks1 = "To Offer";
    $remarks2 = "Approved";


    // sql to update the record subject of the student in database
    $sql = "SELECT * FROM student_request WHERE stud_id ='$stud_id' limit 1";
    $result = (mysqli_query($con, $sql));

    if ($result)
    {
        if($result && mysqli_num_rows($result) > 0){
 
            $update_result = "UPDATE `student_request` SET remarks = '$remarks2' WHERE stud_id = '$stud_id' AND remarks = '$remarks1' ";
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


//How to upload and download files PHP and MySQL
//source : https://codewithawa.com/posts/how-to-upload-and-download-files-php-and-mysql
// need pala natin maggenerate ng pdf hindi mag-uupload, kuha lang tao idea sa link paano magdownload.

?>