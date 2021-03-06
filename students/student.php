<?php 

session_start();

	include("connection.php");
    include("student_function.php");

	$user_data = check_login($con);

    
    // kapag nakapaglogout na hindi pwede mag click go back para maghold sa history
    // para ito sa security sa data ng estudyante
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

    <!--CSS Custom -->
    <link rel="stylesheet" href="css/student.css">

    <!--FONTS-->
    <link rel="stylesheet" href="../signinlogin/css/fonts.css">

    <!--ICONS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="icon" href="../signinlogin/images/tuplogo.png">

</head>

<body onresize="openpage()" id="ajax_func">
    <nav class="navbar navbar-expand-lg" id="tupcnav">
        <img src="../signinlogin/images/tuplogo.png" width="50" height="50" alt="tuplogo">
        <a class="navbar-brand" href="student.php" id="atech">TECHNOLOGICAL UNIVERSITY <br> OF THE PHILIPPINES</a>

        <div class="collapse navbar-collapse" id="navbarToggleExternalContent">

            <form class="d-flex" id="logoutflex">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../students/logout.php" id="logoutbutton">Logout</a>
                    </li>
                </ul>


            </form>
        </div>

        <i class="bi bi-person-circle" onclick="details_hide_show()"></i>

    </nav>


    <section id="section">
        <div class="studentinfostatus" id="studentinfostatus">
            <div class="studentinfo">
                <div class="info">
                    <label>Student Number:</label>
                    <label>Name:</label>
                    <label>Year Course and Section:</label>
                </div>
                <div class="data">
                    <label id='studentnumber1'><?php echo $user_data['stud_id']; ?></label>
                    <label id='fullname1'><?php echo $user_data['fn']; ?> <?php echo $user_data['ln']; ?></label>
                    <label id='section1'><?php echo $user_data['section']; ?></label>
                </div>

            </div>

            <div class="studentstatus">
                <div class="info">
                    <label>Status:</label>
                </div>
                <div class="statusCenter">
                    <label id='status1'><?php echo $user_data['stud_stats']; ?></label>
                </div>
                <form class="form-inline" target="_blank" method="post" action="generate_pdf.php">
                    <div class="statusCenter" <?php echo $style;?>>
                        <button download type="submit" id="pdf" name="generate_pdf" > <i class="bi bi-download"></i> Download PDF</button>
                    </div>
                </form>
            </div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../students/logout.php" id="logoutbutton1">Logout</a>
                </li>
            </ul>


        </div>
    </section>

    <section>
        <div class="subject">
            <p>REQUEST OF SUBJECT</p>
            <form method="post">
                <input type="submit" value="Request New" id="editGrade"  name="editAction" <?php echo $style1;?>  >
            </form>
        </div>

        <div>
            <form class="needs-validation" method="post">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Subject Code</label>
                        <input type="text" name= "sub_code" class="form-control" id="validationTooltip01" required >

                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Select Grade Here</label>
                        <input type="number" name= "grades" class="form-control" id="validationTooltip02" step=0.01 required>
                    </div>

                    <div class="gradebutton">
                        <input class="btn btn-primary" type="submit" value="Update Grade" id="updategrade"  name="updateAction">
                    </div>
            </form>
            </div>




            <form>
                <div class="tab-content" id="myTabContent">

                    <div class="tableborder">
                        <table>
                            <legend>ALL YEAR - ALL SEMESTER</legend>
                            <thead>
                                <th>SUBJECT CODE</th>
                                <th>SUBJECT NAME</th>
                                <th>GRADES</th>
                            </thead>
                            <tbody id="fyfs">
                                <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                                <?php   // LOOP TILL END OF DATA 
                                    while($rows=$display_student_req->fetch_assoc())
                                    {
                                ?>
                                <tr>
                                    <!--FETCHING DATA FROM EACH 
                                        ROW OF EVERY COLUMN-->
                                    <td><?php echo $rows['sub_code'];?></td>
                                    <td><?php echo $rows['sub_name'];?></td>
                                    <td><?php echo $rows['grades'];?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>

                        </table>
                    </div>

                    <form name="student_grade" method="post">
                        <div class="imgforgrades" hidden>
                            <p>*Input your previous grades on the following academic year and upload a photo from ers as a proof.</p>
                            <input type="file" name="gradesfile" accept=".jpg, .png, .jpeg">
                        </div>

                        <div class="submitbutton" hidden>
                                <input type="submit" value="SUBMIT REQUEST" id="" >
                        </div>
                    </form>

                    <form method="post" enctype='multipart/form-data'>
                        <div class="imgforgrades">
                            <p>*Before submitting the Submit Request button make sure to input your previous grades on the following academic year and upload a photo from ers as a proof. After that your transaction status will be changed as 'Requested' and wait for the approval of Admin.</p>
                            <input type="file" name="image" id="file" required>
                        </div>

                        <div class="submitbutton">
                                <input type="submit" value="SUBMIT REQUEST" id="submitbtn" name="submitAction" <?php echo $disable_style;?> >
                        </div>
                    </form>

    </section>



    <script src="../signinlogin/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>


    <script type="text/javascript">

        function openpage() {
            var x = document.getElementById("section");
            if (window.innerWidth > 1000) {
                x.style.display = "grid";
            }
        }

        function details_hide_show() {
            var x = document.getElementById("section");
            if (x.style.display === "none") {
                x.style.display = "grid";
            } else {
                x.style.display = "none";
            }
        }

        $(document).ready (function () {
            var updater = setTimeout (function () {
                $('body#ajax_func').load ('student.php', 'update=true');
            }, 1000);
        });

        var id = document.getElementById("studentnumber1").innerHTML
        //trancfer js var in php var
        document.cookie = "id = " + id ;

    </script>

</body>

</html>