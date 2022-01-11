


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

        //save to database
        $stud_stats = "Processing";
        $query = "insert into student_accounts (stud_id,fn,ln,section,email,passw,stud_stats) values ('$stud_id','$fn','$ln','$section','$email', '$passw', '$stud_stats')";

        mysqli_query($con, $query);

        // head to the nect page directory
        $path = $_SERVER['SERVER_NAME'].'../../../students';
        header("location: " . $path ."/student.php");

        die;
    }else
    {
        //error handling
        echo "Please enter some valid information!";
        
    }
}


?>
