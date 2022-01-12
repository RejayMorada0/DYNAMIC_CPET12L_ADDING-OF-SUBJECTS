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

<body>

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

            <div class="studenttag">
                <div class="btn-group-vertical">
                    <!-- Button trigger modal -->
                    <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="">cyrine.osorio@gsfe.tupcavite.edu.ph</a>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <form class="reqsub">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">REQUEST SUBJECTS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
                        </div>
                        <div class="modal-body" id="modalBody">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="approveone" data-toggle="modal" data-target="#staticBackdrop">Approve</button>
                            <button type="button" class="approveall" data-toggle="modal" data-target="#staticBackdrop">Approve All</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal -->
        <div class="modal fade " id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width: 500px;">
                <div class="modal-content">
                    <div class="modal-header" style="border: transparent;">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
                    </div>
                    <div class="modal-body" style="display: grid; justify-items: center;width: 100%;  row-gap: 50px;">
                        <img src="https://img.icons8.com/office/100/000000/checked--v1.png" />
                        <h1 style="color: #000000;">Thanks for approving!</h1>
                    </div>

                </div>
            </div>
        </div>





    </section>






    <!--JAVASCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="requestapproval.js"></script>
</body>

</html>