
<?php
session_start();


if( isset($_POST['logout']) ){
    session_unset();
    session_destroy();

    header("location: /start/admin/login.php");
}

// session_unset();
// session_destroy();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/start/css/all.min.css">
    
        <link rel="stylesheet" href="/start/css/home.css">
    <link rel="stylesheet" href="/start/css/footer.css">
</head>

<body>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/start/index.php">Colleage</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/start/index.php">Home </a>
                    </li>
            
                    <?php 
                if(  (isset( $_SESSION['admin'])  == "admin") || (isset( $_SESSION['admin'])  == "doctor") || (isset( $_SESSION['admin'])  == "employee") ){ ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            Student
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/start/student/add.php">Add Student</a>
                            <a class="dropdown-item" href="/start/student/list.php">List Student</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            Doctor
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/start/Doctor/add.php">Add Doctor</a>
                            <a class="dropdown-item" href="/start/Doctor/list.php">List Doctor</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            Courses
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/start/course/add.php">Add Course</a>
                            <a class="dropdown-item" href="/start/course/list.php">List Courses</a>
                        </div>
                    </li>
                    
                    <?php  } ?>
                </ul>


                <?php 
                if(  (isset( $_SESSION['admin'])  == "admin") || (isset( $_SESSION['admin'])  == "doctor") || (isset( $_SESSION['admin'])  == "employee") ){ ?>
                    <form class="form-inline my-2 my-lg-0" method="POST" >
                        <button  name="logout" class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
                    </form>
                <?php  } else{ ?>
                    <a href="/start/admin/login.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</a>
                <?php } ?>
                
            </div>
        </nav>
    </div>