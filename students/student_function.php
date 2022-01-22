<?php
// Ajax Method

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


// Call student id
$email = $_SESSION['email'];
$stud_sql = "SELECT stud_id FROM student_accounts WHERE email ='$email' ";
$stud_sql_result = mysqli_query($con, $stud_sql);
$user_data = mysqli_fetch_assoc($stud_sql_result);
$stud_id = $user_data['stud_id'];

//View Student Requests In Table
// SQL query to select data from database
$sql = "SELECT * FROM student_request WHERE stud_id = '$stud_id' ORDER BY yr_and_sem ASC ";
$display_student_req = $mysqli->query($sql);


// show download button if the student request is approved.

$sql1 = "SELECT * FROM student_accounts WHERE stud_id = '$stud_id' ";
$stats_pdf = mysqli_query($con, $sql1);
$user_stats = mysqli_fetch_assoc($stats_pdf);


if ($user_stats['stud_stats'] == 'Approved' ){
    $style = "style='display:grid;'";
    $style1 = "style ='background-color:white;'";
}
else {
    $style = "style='display:none;'";
    $style1 = "style='display:none;'";
}

// if submitted disable the button
if ($user_stats['stud_stats'] == 'Processing' ){
    echo "<script>document.getElementById('validationTooltip01').disabled = false;</script>";
    echo "<script>document.getElementById('validationTooltip02').disabled = false;</script>";
    echo "<script>document.getElementById('updategrade').disabled = false;</script>";
    echo "<script>document.getElementById('submitbtn').disabled = false;</script>";
    $disable_style = "style='background-color:#E2435E;'";
    
}
else {
    echo "<script>document.getElementById('validationTooltip01').disabled = true;</script>";
    echo "<script>document.getElementById('validationTooltip02').disabled = true;</script>";
    echo "<script>document.getElementById('updategrade').disabled = true;</script>";
    echo "<script>document.getElementById('submitbtn').disabled = true;</script>";
    $disable_style = "style='background-color:#e2a2ad; border: 0; color:#E2435E;'";
}






//UPDATING OF GRADES
if(array_key_exists('updateAction', $_POST)) {
    updateAction();
}
else if(array_key_exists('submitAction', $_POST)) {
    submitAction();
}
else if(array_key_exists('editAction', $_POST)) {
    editAction();
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

    
    // Call student id
    $email = $_SESSION['email'];
    $stud_sql = "SELECT stud_id FROM student_accounts WHERE email ='$email' ";
    $stud_sql_result = mysqli_query($con, $stud_sql);
    $user_data = mysqli_fetch_assoc($stud_sql_result);

    
    //input was posted
    $stud_id = $user_data['stud_id'];
	$sub_code = $_POST['sub_code'];
	$grades = $_POST['grades'];


    // sql to update the record subject of the student in database
    $sql = "SELECT * FROM student_request WHERE stud_id ='$stud_id' AND sub_code = '$sub_code' limit 1";
    $result = (mysqli_query($con, $sql));

    if ($result)
    {
        if($result && mysqli_num_rows($result) > 0){
 
            $update_result = "UPDATE `student_request` SET grades = '$grades' WHERE sub_code = '$sub_code' AND stud_id = '$stud_id' ";
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

//submit and add image function
function submitAction() {
    //source : https://www.etutorialspoint.com/index.php/411-how-to-insert-image-in-database-using-php

    //confirmation
    // https://stackoverflow.com/questions/37659396/confirm-box-in-php

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

    // Call student id
    $email = $_SESSION['email'];
    $stud_sql = "SELECT stud_id FROM student_accounts WHERE email ='$email' ";
    $stud_sql_result = mysqli_query($con, $stud_sql);
    $user_data = mysqli_fetch_assoc($stud_sql_result);

    
    //input was posted
    $stud_id = $user_data['stud_id'];


    // sql to update the record subject of the student in database
    $sql = "SELECT * FROM student_accounts WHERE stud_id ='$stud_id' limit 1";
    $result = (mysqli_query($con, $sql));

    if ($result)
    {
        if($result && mysqli_num_rows($result) > 0){

            $filename = $_FILES['image']['name'];
	
            // Select file type
            $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
            
            // valid file extensions
            $extensions_arr = array("jpg","jpeg","png","gif");
         
            // Check extension
            if( in_array($imageFileType,$extensions_arr) ){
         
            // Upload files and store in database
            if(move_uploaded_file($_FILES["image"]["tmp_name"],'upload/'.$filename)){
                // Image db insert sql and update student status
                $stud_stats ="Requested";
                $insert =  "UPDATE student_accounts SET image = '$filename', stud_stats ='$stud_stats' WHERE stud_id = '$stud_id' ";
                if(mysqli_query($con, $insert)){
                  echo 'Data inserted successfully';
                }
                else{
                  echo 'Error: '.mysqli_error($con);
                }
            }else{
                echo 'Error in uploading file - '.$_FILES['image']['name'].'<br/>';
            }
            }
            // Display the alert box 
            echo "<script>alert('Submit request successfully.');</script>";

        }
        else {
                    
            // Display the alert box 
            echo "<script>alert('Unsuccessful');</script>";
           
        }
    }
    else {
        echo mysqli_connect_error();
    }
 
    
}

function editAction() {
    //echo "<script>alert('Handling error.');</script>";

}


?>