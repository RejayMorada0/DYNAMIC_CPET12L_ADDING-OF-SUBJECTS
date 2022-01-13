<?php 

session_start();

    include("pic_function.php");


    // kapag nakapaglogout na hindi pwede mag click go back para maghold sa history
    // para ito sa security sa data ng pic
    if(!isset($_SESSION['email']))
    {
        // head to the nect page directory
        $path = $_SERVER['SERVER_NAME'].'../../../signinlogin';
        header("location: " . $path ."/index.php");
        die;
    }

?> 

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Technological University of the Philippines</title>

    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../signinlogin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="css/requests.css">

    <!--ICONS-->
    <link rel="icon" href="images/tuplogo.png">

</head>



    <body  id="ajax_func">

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
                            <a class="nav-link" href="pic.php" id="requests">Request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="studentrecords.php" id="studentrecords">Student Records</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" id="logoutbutton">Logout</a>
                        </li>
                    </ul>


                </form>
            </div>
        </nav>
        <section>
            <div class="welcome">
                WELCOME, PERSON IN CHARGE!
            </div>

            <div class="requesttxt">
                <p>REQUESTS:</p>
            </div>



            <div class="tableborder">
                <table>
                    <thead>
                        <tr>
                            <th>Student Number</th>
                            <th>Student Name</th>
                            <th>Section</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id=picstudenttable onclick="getDataFromCurrentCell(event)" border="1">
                        <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                        <?php   // LOOP TILL END OF DATA 
                            while($rows=$student_data->fetch_assoc())
                            {
                        ?>

                        <tr>
                            <!--FETCHING DATA FROM EACH 
                                ROW OF EVERY COLUMN-->
                            <td><?php echo $rows['stud_id'];?></td>
                            <td><?php echo $rows['fn'];?> <?php echo $rows['ln'];?></td>
                            <td><?php echo $rows['section'];?></td>
                            <td><?php echo $rows['email'];?></td>
                            <td><?php echo $rows['stud_stats'];?></td>
                        </tr>

                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
        
        <script type="text/javascript">
            
            $(document).ready (function () {
                    var updater = setTimeout (function () {
                        $('body#ajax_func').load ('pic.php', 'update=true');
                    }, 100);
                });


            function getDataFromCurrentCell(e) {

                var currow = (e.target.parentNode.innerText); //Current row.
                // whole cell;
                var postTitle = event.target.parentNode.parentNode.childNodes[1].textContent;
                var stud_id = e.target.parentNode.childNodes[0].textContent;
                alert(postTitle)
                // set student details from student cell to transfet on checking page
                localStorage.setItem("stud_id", stud_id);
            
                document.location = 'checking.php'
            }

        </script>
    </body>

</html>