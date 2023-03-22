<?php

include("../shared/head.php");
include("../general/connectDB.php");


// edite  student

// select all department
$selectD = "SELECT * FROM department";
$Alldepartment = mysqli_query($connect, $selectD);

// select all courses
$selectC = "SELECT * FROM course";
$AllCourses = mysqli_query($connect, $selectC);


if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    
    $selectOne = "SELECT * FROM doctor where id = $id";

    $oneSelect = mysqli_query($connect  , $selectOne);
    $row = mysqli_fetch_assoc($oneSelect);

    $name = $row['name'];     
    $address = $row['address'];     
    $salary = $row['salary'];     
    $courseID = $row['courseID'];     
    $departmentID  = $row['departmentID']; 
    
    // update
    if(isset($_POST['update'])){
        

        $dname = $_POST['dname'];
        $address = $_POST['address'];
        $salary = $_POST['salary'];
        $departmentID = $_POST['departmentID'];
        $courseid = $_POST['courseid'];
        
        
            $update = "UPDATE doctor SET name = '$dname' ,
                                        address= '$address' , 
                                        salary  = '$salary',
                                        departmentID = $departmentID,
                                        courseid = $courseid
                                        WHERE id = $id ";
            $updateStatus = mysqli_query($connect, $update);
        
            // if ($updateStatus) {
            //     echo "updateStatus true";
            // } else {
            //     echo "updateStatus false";
            // }
            header("location: /start/Doctor/list.php");
        
    }



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

<h1 class="text-center text-info my-3"> Edite Doctor </h1>
<div class="container col-6 my-1" style=" background-color: gray; color: white; ">
<form method="POST">
        <div class="form-group">
            <label>Doctor Name</label>
            <input name="dname" value="<?php echo $name?>" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Address</label>
            <input name="address" value="<?php echo $address?>" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Salary</label>
            <input name="salary" value="<?php echo $salary?>" type="number" class="form-control">
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

        <button name="update" type="submit" class="btn btn-primary">Update</button>
    </form>
</div>










<?php
include("../shared/footer.php");
?>