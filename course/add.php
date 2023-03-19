<?php

include("../shared/head.php");
include("../general/connectDB.php");


// insert new course


if (isset($_POST['submit'])) {

    $cname = $_POST['cname'];
    $hourse = $_POST['hourse'];


    $insert = "INSERT INTO course VALUES( NULL , '$cname' , $hourse   )";
    $insertStatus = mysqli_query($connect, $insert);

    // if ($insertStatus) {
    //     echo "insert true";
    // } else {
    //     echo "insert false";
    // }

}

?>



<h1 class="text-center text-info my-3"> Add New Course </h1>
<div class="container col-6 my-1" style=" background-color: gray; color: white; ">
    <form method="POST">
        <div class="form-group">
            <label>Course Name</label>
            <input name="cname" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Hourse</label>
            <input name="hourse" type="number" class="form-control">
        </div>

        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>










<?php
include("../shared/footer.php");
?>