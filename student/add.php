<?php

include("../shared/head.php");
include("../general/connectDB.php");


// insert new student

// select all doctor
$selectD = "SELECT * FROM doctor";
$AllDoctor = mysqli_query($connect, $selectD);

// select all courses
$selectC = "SELECT * FROM course";
$AllCourses = mysqli_query($connect, $selectC);

if (isset($_POST['submit'])) {

    $sname = $_POST['sname'];
    $phone = $_POST['phone'];
    $level = $_POST['level'];
    $age = $_POST['age'];
    $gpa = $_POST['gpa'];
    $doctorid = $_POST['doctorid'];
    $courseid = $_POST['courseid'];


    $insert = "INSERT INTO student VALUES( NULL , '$sname' , '$phone'  , '$level' , $age  ,$gpa , $doctorid , $courseid )";
    $insertStatus = mysqli_query($connect, $insert);

    // if ($insertStatus) {
    //     echo "insert true";
    // } else {
    //     echo "insert false";
    // }

}

?>



<?php 
    if(  ($_SESSION['admin'] == "admin")  ||  ($_SESSION['admin'] == "doctor")  ||  ($_SESSION['admin'] == "employee") ){}
    else{
        header("location: /start/admin/login.php");
    }
?>
<h1 class="text-center text-info my-3"> Add New Student </h1>
<div class="container col-6 my-1" style=" background-color: gray; color: white; ">
    <form method="POST">
        <div class="form-group">
            <label>Student Name</label>
            <input name="sname" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input name="phone" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Level</label>
            <input name="level" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Age</label>
            <input name="age" type="number" class="form-control">
        </div>

        <div class="form-group">
            <label>GPA</label>
            <input name="gpa" type="number" class="form-control">
        </div>

        <div class="form-group">
            <label>Doctor Name</label>
            <select name="doctorid" class="form-control">

                <?php foreach ($AllDoctor as $doctor) { ?>

                    <option value="<?php echo $doctor['id'] ?>"> <?php echo $doctor['name'] ?> </option>

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

