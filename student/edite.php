<?php

include("../shared/head.php");
include("../general/connectDB.php");


// edite  student

// select all doctor
$selectD = "SELECT * FROM doctor";
$AllDoctor = mysqli_query($connect, $selectD);

// select all courses
$selectC = "SELECT * FROM course";
$AllCourses = mysqli_query($connect, $selectC);


if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    
    $selectOne = "SELECT  
        student.id , 
        student.name as sname , 
        student.level ,
        student.phone,
        student.age,
        student.GPA,
        doctor.name as dname,
        course.name as cname
        from student  JOIN doctor JOIN course ON
        student.courseid = course.id AND
        student.doctorid = doctor.id
        WHERE student.id = $id
        ORDER BY student.id;";

    $OneStudent = mysqli_query($connect  , $selectOne);
    $row = mysqli_fetch_assoc($OneStudent);

    $sname = $row['sname'];     
    $level = $row['level'];     
    $phone = $row['phone'];     
    $age = $row['age'];     
    $GPA = $row['GPA'];     
    $dname = $row['dname'];     
    $cname = $row['cname']; 
    
    // update
    if(isset($_POST['update'])){
        

        $sname = $_POST['sname'];
        $phone = $_POST['phone'];
        $level = $_POST['level'];
        $age = $_POST['age'];
        $gpa = $_POST['gpa'];
        $doctorid = $_POST['doctorid'];
        $courseid = $_POST['courseid'];
        
        
            $update = "UPDATE student SET name = '$sname' ,
                                        phone= '$phone' , 
                                        level  = '$level',
                                        age = $age,
                                        GPA = $gpa,
                                        doctorid = $doctorid,
                                        courseid = $courseid
                                        WHERE id = $id ";
            $updateStatus = mysqli_query($connect, $update);
        
            // if ($updateStatus) {
            //     echo "updateStatus true";
            // } else {
            //     echo "updateStatus false";
            // }
        
    }



}




?>


<?php 
    if(  ($_SESSION['admin'] == "admin")  ||  ($_SESSION['admin'] == "doctor")  ||  ($_SESSION['admin'] == "employee") ){}
    else{
        header("location: /start/admin/login.php");
    }
?>
<h1 class="text-center text-info my-3"> Edite Student </h1>
<div class="container col-6 my-1" style=" background-color: gray; color: white; ">
    <form method="POST">
        <div class="form-group">
            <label>Student Name</label>
            <input name="sname" value="<?php echo $sname ?>" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input name="phone" value="<?php echo $phone ?>"  type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Level</label>
            <input name="level" value="<?php echo $level ?>"  type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Age</label>
            <input name="age" value="<?php echo $age ?>" type="number" class="form-control">
        </div>

        <div class="form-group">
            <label>GPA</label>
            <input name="gpa" value="<?php echo $GPA ?>" type="number" class="form-control">
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

        <button name="update" type="submit" class="btn btn-primary">Update</button>
    </form>
</div>










<?php
include("../shared/footer.php");
?>