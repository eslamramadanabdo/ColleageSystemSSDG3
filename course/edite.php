<?php

include("../shared/head.php");
include("../general/connectDB.php");


// edite  course

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    
    $selectOne = "SELECT * FROM course WHERE id = $id";

    $One = mysqli_query($connect  , $selectOne);
    $row = mysqli_fetch_assoc($One);

    $cname = $row['name'];     
    $hourse = $row['hourse'];     

    
    // update
    if(isset($_POST['update'])){
        

        $cname = $_POST['cname'];
        $hourse = $_POST['hourse'];
        
            $update = "UPDATE course SET name = '$cname' , hourse = $hourse where id = $id";
            $updateStatus = mysqli_query($connect, $update);
        
            // if ($updateStatus) {
            //     echo "updateStatus true";
            // } else {
            //     echo "updateStatus false";
            // }

        header("location: /start/course/list.php");
        
    }



}




?>



<h1 class="text-center text-info my-3"> Edite Student </h1>
<div class="container col-6 my-1" style=" background-color: gray; color: white; ">
<form method="POST">
        <div class="form-group">
            <label>Course Name</label>
            <input name="cname" value="<?php echo $cname ?>" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Hourse</label>
            <input name="hourse" value="<?php echo $hourse ?>" type="number" class="form-control">
        </div>

        <button name="update" type="submit" class="btn btn-primary">Update</button>
    </form>
</div>










<?php
include("../shared/footer.php");
?>