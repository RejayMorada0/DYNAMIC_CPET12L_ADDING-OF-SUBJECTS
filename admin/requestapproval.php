<?php 

session_start();

    include("requestapproval_function.php");


    // kapag nakapaglogout na hindi pwede mag click go back para maghold sa history
    // para ito sa security sa data ng admin
    if(!isset($_SESSION['email']))
    {
        // head to the nect page directory
        $path = $_SERVER['SERVER_NAME'].'../../../signinlogin';
        header("location: " . $path ."/index.php");
        die;
    }


?> 


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUPC Request Approval</title>


    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/requestapproval.css">

    <!--FONTS-->
    <link rel="stylesheet" href="../css/fonts.css">

    <!--ICONS-->
    <link rel="icon" href="images/tuplogo.png">

</head>

<body id="ajax_func">

    <nav class="navbar navbar-expand-lg" id="tupcnav">
        <img src="images/tuplogo.png" width="50" height="50" alt="tuplogo">
        <a class="navbar-brand" href="index.html" id="atech">TECHNOLOGICAL UNIVERSITY <br> OF THE PHILIPPINES</a>

        <nav class="navbar">
            <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
        </nav>


        <div class="collapse navbar-collapse" id="navbarToggleExternalContent">

            <form class="d-flex">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="admin.php" id="allsubjects">All Subjects <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="requestapproval.php" id="request">Request Approval</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" id="logoutbutton">Logout</a>
                    </li>
                </ul>


            </form>
        </div>
    </nav>

    <section>
        <div class="welcome">WELCOME, DEPARTMENT HEAD!</div>

        <div class="reqapproval">
            <p>REQUEST APPROVAL</p>
            <form class="needs-validation" method="post">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Student Number</label>
                        <input type="text" name = "stud_id" class="form-control" id="validationTooltip01" required>

                    </div>

                    <div class="remarkbttn">
                        <input class="btn btn-primary" type="submit" id="Approved" value="Approved" name="Approved">
                    </div>
            </form>
        </div>

        <div class="reqapproval">

            <table>
                <thead>
                    <th>ID</th>
                    <th>STUDENT NUMBER</th>
                    <th>SUBJECT CODE</th>
                    <th>SUBJECT NAME</th>
                    <th>GRADES</th>
                    <th>REMARKS</th>
                </thead>
                <tbody id="fyfs">
                    <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                    <?php   // LOOP TILL END OF DATA 
                        if (!($result && mysqli_num_rows($result) > 0)) {
                            echo "";
                        } else {
                        while($rows=$display_student_req->fetch_assoc())
                        {
                    ?>
                    <tr>
                        <!--FETCHING DATA FROM EACH 
                            ROW OF EVERY COLUMN-->
                        <td><?php echo $rows['trans_id'];?></td>
                        <td><?php echo $rows['stud_id'];?></td>
                        <td><?php echo $rows['sub_code'];?></td>
                        <td><?php echo $rows['sub_name'];?></td>
                        <td><?php echo $rows['grades'];?></td>
                        <td><?php echo $rows['remarks'];?></td>
                    </tr>
                    <?php
                        }
                        }
                    ?>
                </tbody>

            </table>
        </div>


    </section>



    <!--JAVASCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="requestapproval.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
        
    <script type="text/javascript">
        $(document).ready (function () {
        var updater = setTimeout (function () {
            $('body#ajax_func').load ('requestapproval.php', 'update=true');
        }, 5000);
    });
    </script>
</body>

</html>