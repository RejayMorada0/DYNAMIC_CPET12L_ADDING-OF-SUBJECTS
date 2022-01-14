


<?php
//FUNCTIONS FOR CREATE ACCOUNTS
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted 
    $stud_id = $_POST['stud_id'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $section = $_POST['section'];
    $email = $_POST['email'];
    $passw = $_POST['passw'];
    $cpassw = $_POST['cpassw'];

    //error handling
    if( (!empty($stud_id) && !empty($fn) && !empty($ln) && !empty($section) && !empty($email) && !empty($passw)) && (($passw)== ($cpassw)) )
    {

        //save account to student accounts database
        $stud_stats = "Processing";
        $query = "INSERT INTO student_accounts (stud_id,fn,ln,section,email,passw,stud_stats) VALUES ('$stud_id','$fn','$ln','$section','$email', '$passw', '$stud_stats')";
        mysqli_query($con, $query);

        //save subject to student accounts database
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

        // sql search the sub_code
       
        $get_sub_code = "SELECT * FROM all_subjects ORDER BY yr_and_sem ASC";
        $result = (mysqli_query($con, $get_sub_code));
        $subject_data = mysqli_fetch_assoc($result);

        //$trans_id = rand(1, 3);
        $sub_code = $subject_data['sub_code'];
        $sub_name= $subject_data['sub_name'];
        $grades = "";
        $remarks = "";
        while($rows=$result->fetch_assoc())
        {
            $add_result = "INSERT INTO student_request (stud_id, sub_code, sub_name, grades, remarks) VALUES ('$stud_id','$sub_code','$sub_name', '$grades','$remarks')";
            $result1 = (mysqli_query($con, $add_result));
        }





        // Function definition
        function function_alert($message) {
            
            // Display the alert box 
            echo "<script>alert('$message');</script>";
        }
        // Function call
        function_alert("Successfully created account, but you need to login first.");


        // head to the nect page directory
        $path = $_SERVER['SERVER_NAME'].'../../../signinlogin';
        header("location: " . $path ."/index.php");
        die;
    }else
    {
        //error handling
        // Function definition
        function function_alert1($message1) {
            
            // Display the alert box 
            echo "<script>alert('$message1');</script>";
        }
        // Function call
        function_alert1("Please enter some valid information!");
    }
}


?>
