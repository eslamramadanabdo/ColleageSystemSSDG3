<?php

include("../shared/head.php");
include("../general/connectDB.php");


// insert new student

// select all department
$selectD = "SELECT * FROM department";
$Alldepartment = mysqli_query($connect, $selectD);

// select all courses
$selectC = "SELECT * FROM course";
$AllCourses = mysqli_query($connect, $selectC);

if (isset($_POST['submit'])) {

    $dname = $_POST['dname'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $departmentID = $_POST['departmentID'];
    $courseid = $_POST['courseid'];


    $insert = "INSERT INTO doctor VALUES( NULL , '$dname' , '$address'  , '$salary' ,  $departmentID , $courseid )";
    $insertStatus = mysqli_query($connect, $insert);

    // if ($insertStatus) {
    //     echo "insert true";
    // } else {
    //     echo "insert false";
    // }

}

?>

<?php 
    if(  ($_SESSION['admin'] == "admin")   ){}
    
    else if( ($_SESSION['admin'] == "doctor") || ($_SESSION['admin'] == "employee")   ){
        header("location: /start/admin/notauth.php");
    }
    else{
        header("location: /start/admin/login.php");
    }
?>

<h1 class="text-center text-info my-3"> Add New Doctor </h1>
<div class="container col-6 my-1" style=" background-color: gray; color: white; ">
    <form method="POST">
        <div class="form-group">
            <label>Doctor Name</label>
            <input name="dname" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Address</label>
            <input name="address" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Salary</label>
            <input name="salary" type="number" class="form-control">
        </div>



        <div class="form-group">
            <label>Department Name</label>
            <select name="departmentID" class="form-control">

                <?php foreach ($Alldepartment as $depart) { ?>

                    <option value="<?php echo $depart['id'] ?>"> <?php echo $depart['name'] ?> </option>

                <?php } ?>

            </select>
        </div>

        <div class="form-group">
            <label>Course Name</label>
            <select name="courseid" class="form-control">

                <?php foreach ($AllCourses as $course) { ?>

                    <option value="<?php echo $course['id'] ?>"> <?php echo $course['name'] ?> </option>

                <?php } ?>

            </select>
        </div>

        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>










<?php
include("../shared/footer.php");
?>