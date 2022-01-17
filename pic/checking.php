<?php 

session_start();

    include("checking_function.php");


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
    <title>PIC : Checking of Grades</title>

    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../signinlogin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="css/checking.css">

    <!--ICONS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="icon" href="images/tuplogo.png">

</head>

<body onresize="openpage()" id="ajax_func">
    <nav class="navbar navbar-expand-lg" id="tupcnav">
        <img src="../signinlogin/images/tuplogo.png" width="50" height="50" alt="tuplogo">

        <a class="navbar-brand" href="pic.php" id="atech">TECHNOLOGICAL UNIVERSITY <br> OF THE PHILIPPINES</a>

        <form class="d-flex" id="cancelnav">
            <ul class="navbar-nav mr-auto" id="ulid">
                <li class="nav-item">
                    <p class="nav-link" id="studentname">STUDENT: email1@gmail.com </p>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pic.php" id="cancelbutton">Cancel</a>
                </li>
            </ul>
        </form>


        <i class="bi bi-journal" onclick="details_hide_show()"></i>


    </nav>


    <section id="offered">
        <div class="offered">
            <p>Offered Subjects:</p>
                <ol type="1" id="modalBody">
                    <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                    <?php   // LOOP TILL END OF DATA 
                        while($rows=$offer_result->fetch_assoc())
                        {
                    ?>
                        <!--FETCHING DATA FROM EACH 
                            ROW OF EVERY COLUMN-->
                        <li><?php echo $rows['sub_code'];?> <?php echo $rows['sub_name'];?></li>          
                    
                    <?php
                        }
                    ?>
                </ol>
        </div>
        <a class="nav-link" href="pic.php" id="cancelbutton1">Cancel</a>
    </section>


    <section>
        <div class="grades">
            <p>CHECKING OF GRADES</p>
        </div>
        <form class="needs-validation" method="post">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationTooltip01">Subject Code</label>
                    <input type="text" name = "sub_code" class="form-control" id="validationTooltip01" required>

                </div>

                <div class="col-md-4 mb-3">
                    <label for="validationTooltip02">Remarks</label>
                    <select name = "remarks" class="custom-select" id="validationTooltip02" required>
                  <option selected disabled value="">Choose...</option>
                  <option value="Passed">Passed</option>
                  <option value="Failed">Failed</option>
                  <option value="To Offer">To Offer</option>
                  
                </select>
                </div>

                <div class="remarkbttn">
                    <input class="btn btn-primary" type="submit" id="addremarks" value="Add Remarks" name="remarkAction">
                </div>
        </form>

        </div>






        <form>

            <div class="tableborder">
                <table>
                    <legend>ALL YEAR - ALL SEMESTER</legend>
                    <thead>
                        <th>SUBJECT CODE</th>
                        <th>SUBJECT NAME</th>
                        <th>GRADES</th>
                        <th>REMARKS</th>
                    </thead>
                    <tbody id="allsub">
                        <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                        <?php   // LOOP TILL END OF DATA 
                            while($rows=$student_grades_result->fetch_assoc())
                            {
                        ?>

                        <tr>
                            <!--FETCHING DATA FROM EACH 
                                ROW OF EVERY COLUMN-->
                            <td><?php echo $rows['sub_code'];?></td>
                            <td><?php echo $rows['sub_name'];?></td>
                            <td><?php echo $rows['grades'];?></td>
                            <td><?php echo $rows['remarks'];?></td>
                        </tr>

                        <?php
                            }
                        ?>
                    </tbody>

                </table>

            </div>

            <div class="imgforgrades">
                <p>*Attached Files.</p>
                <a target="_blank" href="tupclogo.png">Grades_Img.jpg</a>
            </div>

            </div>

        </form>

        <form class="needs-validation" action="javascript:submitToAdmin();" novalidate>
            <div class="submitbutton">
                <button class="btn btn-primary" type="submit" id="submitbtn">Submit Requests</button>
                <!--<input type="button" value="Submit" id="submitbtn" data-toggle="modal" data-target="#staticBackdrop">-->
            </div>
        </form>
    </section>







    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="../signinlogin/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
    <script>
        
        function openpage() {
            var x = document.getElementById("offered");
            if (window.innerWidth > 1000) {
                x.style.display = "grid";
            }
        }

        function details_hide_show() {
            var x = document.getElementById("offered");
            if (x.style.display === "none") {
                x.style.display = "grid";
            } else {
                x.style.display = "none";
            }
        }

        $(document).ready (function () {
                    var updater = setTimeout (function () {
                        $('body#ajax_func').load ('checking.php', 'update=true');
                    }, 10);
                });

        // get student email from student cell in index page
        var id = localStorage.getItem("id");
        var name = localStorage.getItem("name");
        document.getElementById("studentname").innerHTML = "Student:" + " " + id + " " + name;

        //trancfer js var in php var
        document.cookie = "id = " + id ;
      
    </script>
</body>

</html>