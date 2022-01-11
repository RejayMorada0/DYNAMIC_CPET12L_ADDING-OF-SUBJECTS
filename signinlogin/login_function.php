



<?php 
//FUNCTIONS FOR LOGIN ACCOUNTS
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $email = $_POST['email'];
    $passw = $_POST['passw'];

    if(!empty($email) && !empty($passw))
    {

        //read from database
        $query = "select * from students where email = '$email' limit 1";
        $result = mysqli_query($con, $query);

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
        
        echo "wrong username or password!";
    }else
    {
        echo "wrong username or password!";
    }
}

?>