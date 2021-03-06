
<?php 

session_start();

    include("admin_function.php");
 

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
    <title>TUPC Administration: All Subjects</title>


    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">

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
        <div class="subject">
            <p>SUBJECT OF BACHELOR OF ENGINEERING TECHNOLOGY Major in COMPUTER ENGINEERING TECHNOLOGY </p>

        </div>
        <form class="needs-validation" method="post">

            <legend>Add or Remove Subject</legend>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="sub_code">Subject Code</label>
                    <input type="text" class="form-control" name="sub_code" id="sub_code" required>

                </div>
                <div class="col-md-4 mb-3">
                    <label for="sub_name">Subject Name</label>
                    <input type="text" class="form-control" name="sub_name" id="sub_name">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="yr_and_sem">Year and Semester</label>
                    <select class="custom-select" name="yr_and_sem" id="yr_and_sem">
                  <option selected disabled value="">Choose...</option>
                  <option value="FIRST YEAR - FIRST SEMESTER">First Year - First Sem</option>
                  <option value="FIRST YEAR - SECOND SEMESTER">First Year - Second Sem</option>
                  <option value="SECOND YEAR - FIRST SEMESTER">Second Year - First Sem</option>
                  <option value="SECOND YEAR - SECOND SEMESTER">Second Year - Second Sem</option>
                  <option value="THIRD YEAR - FIRST SEMESTER">Third Year - First Sem</option>
                  <option value="THIRD YEAR - SECOND SEMESTER">Third Year - Second Sem</option>
                  <option value="FOURTH YEAR - FIRST SEMESTER">Fourth Year - First Sem</option>
                  <option value="FOURTH YEAR - SECOND SEMESTER">Fourth Year - Second Sem</option>
                </select>

                </div>
            </div>
            <div class="button1">
            
                <input class="btn btn-primary" type="submit" value="x remove subject" name="removeAction">
                <input class="btn btn-primary" type="submit" value="+ add subject" name="addAction">
            </div>
        </form>


        <form class="needs-validation" method="post">

            <legend>Change Offer Status</legend>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="sub_code1">Subject Code</label>
                    <input type="text" class="form-control" name="sub_code1" id="sub_code1" required>

                </div>

                <div class="col-md-4 mb-3">
                    <label for="offer_stats">Offer Status</label>
                    <select class="custom-select" name="offer_stats" id="offer_stats" required>
                  <option selected disabled value="">Choose...</option>
                  <option value="Not Offer">Not Offer</option>
                  <option value="Offer">Offer</option>
                </select>
                </div>

                <div class="offerbttn">
                    <input class="btn btn-primary" type="submit" value="Change Status" name="changeAction">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="color:black; background-color: white; border: 1px solid black;">View Offered</a>
                </div>
        </form>


        <div class="main">
            <!--HTML code to display data in tabular format-->
            <table>
                <legend>ALL YEAR - ALL SEMESTER</legend>
                <thead>
                    <th>SUBJECT CODE</th>
                    <th>SUBJECT NAME</th>
                    <th>YEAR AND SEMESTER</th>
                    <th>OFFERED STATUS</th>
                </thead>
                <tbody id="allsubtable">
                    <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                    <?php   // LOOP TILL END OF DATA 
                        while($rows=$result->fetch_assoc())
                        {
                    ?>
                    <tr>
                        <!--FETCHING DATA FROM EACH 
                            ROW OF EVERY COLUMN-->
                        <td><?php echo $rows['sub_code'];?></td>
                        <td><?php echo $rows['sub_name'];?></td>
                        <td><?php echo $rows['yr_and_sem'];?></td>
                        <td><?php echo $rows['offer_stats'];?></td>
                    </tr>
                    <?php
                        }
                    ?>


                </tbody>

            </table>

        </div>


        <!-- Modal -->
        <form class="reqsub">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">OFFERED SUBJECTS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                        </div>
                        <div class="modal-body">
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

                        

                    </div>
                </div>
            </div>
        </form>




    </section>


    <!--JAVASCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>


    <script type="text/javascript">

    $(document).ready (function () {
        var updater = setTimeout (function () {
            $('body#ajax_func').load ('admin.php', 'update=true');
        }, 5000);
    });


    </script>


</body>

</html>