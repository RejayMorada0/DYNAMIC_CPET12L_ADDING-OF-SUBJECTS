
<?php 
//FUNCTIONS FOR LOGIN ACCOUNTS
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $email = $_POST['email'];
    $passw = $_POST['passw'];


    if(!empty($email) && !empty($passw))
    {

        //read student accounts from database
        $query = "select * from student_accounts where email = '$email' limit 1";
        $result = mysqli_query($con, $query);

        //read pic accounts from database
        $query1 = "select * from pic_access where email = '$email' limit 1";
        $result1 = mysqli_query($con, $query1);

        //read admin accounts from database
        $query2 = "select * from admin_access where email = '$email' limit 1";
        $result2 = mysqli_query($con, $query2);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {

                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['passw'] === $passw)
                {

                    $_SESSION['email'] = $user_data['email'];
                    // head to the nect page directory
                    $path = $_SERVER['SERVER_NAME'].'../../../students';
                    header("location: " . $path ."/student.php");
                    die;
                }
            }
        }
        if($result1)
        {
            if($result1 && mysqli_num_rows($result1) > 0)
            {

                $user_data = mysqli_fetch_assoc($result1);
                
                if($user_data['passw'] === $passw)
                {

                    $_SESSION['email'] = $user_data['email'];
                    // head to the nect page directory
                    $path = $_SERVER['SERVER_NAME'].'../../../pic';
                    header("location: " . $path ."/index.php");
                    die;
                }
            }
        }

        if($result2)
        {
            if($result2 && mysqli_num_rows($result2) > 0)
            {

                $user_data = mysqli_fetch_assoc($result2);
                
                if($user_data['passw'] === $passw)
                {

                    $_SESSION['email'] = $user_data['email'];
                    // head to the nect page directory
                    $path = $_SERVER['SERVER_NAME'].'../../../admin';
                    header("location: " . $path ."/index.php");
                    die;
                }
            }
        }
        
        // Function definition
        function function_alert($message) {
            
            // Display the alert box 
            echo "<script>alert('$message');</script>";
        }
        // Function call
        function_alert("Wrong username or password!");
    }
    else
    {
        // Function definition
        function function_alert($message) {
            
            // Display the alert box 
            echo "<script>alert('$message');</script>";
        }
        // Function call
        function_alert("Wrong username or password!");
    }
}

?>