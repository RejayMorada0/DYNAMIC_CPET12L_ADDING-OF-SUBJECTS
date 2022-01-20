
<?php
//FUNCTIONS FOR CREATE ACCOUNTS
if($_SERVER['REQUEST_METHOD'] == "POST")
{
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
        // sql search the stud_id
        $sql = "SELECT * FROM student_accounts WHERE stud_id = '$stud_id' limit 1";
        $result = (mysqli_query($con, $sql));

        // sql search the email
        $sql1 = "SELECT * FROM student_accounts WHERE email = '$email' limit 1";
        $result1 = (mysqli_query($con, $sql1));

        if ($result)
        {
            if($result && mysqli_num_rows($result) > 0){
  
                // Display the alert box 
                echo "<script>alert('Student ID already exist.');</script>";       
            }
            else if ($result1)
            {
                if($result1 && mysqli_num_rows($result1) > 0){
     
                    // Display the alert box 
                    echo "<script>alert('Student Email already exist.');</script>";
                }
                else 
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
                    //$trans_id = rand(1, 3);
                
                    $grades = "";
                    $remarks = "";

                    while($rows=$result->fetch_assoc())
                    {   
                        $sub_code = $rows['sub_code'];
                        $sub_name= $rows['sub_name'];
                        $yr_and_sem= $rows['yr_and_sem'];
                        $add_result = "INSERT INTO student_request (stud_id, sub_code, sub_name, yr_and_sem, grades, remarks) VALUES ('$stud_id','$sub_code','$sub_name', '$yr_and_sem', '$grades','$remarks')";
                        $result1 = (mysqli_query($con, $add_result));
                    }
                    
                    // Display the alert box 
                    echo "<script>alert('Successfully created account, but you need to login first.');</script>";
                   

                    // head to the nect page directory
                    $path = $_SERVER['SERVER_NAME'].'../../../signinlogin';
                    header("location: " . $path ."/index.php");
                    die;
                }
            }
        }

    }
    else 
    {
        // Display the alert box 
        echo "<script>alert('Complete all fields');</script>";
    }
}
?>
