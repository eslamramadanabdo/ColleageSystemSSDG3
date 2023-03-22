<?php

include('../shared/head.php');
include('../general/connectDB.php');



if(isset($_POST['login'])){

    $username  = $_POST['username'];
    $pass      = $_POST['password'];

    $select = "SELECT * FROM `admin` WHERE username = '$username' and password = '$pass' "; 
    $oneAdmin = mysqli_query($connect , $select);

    $row = mysqli_fetch_assoc($oneAdmin);

    $count  =   mysqli_num_rows($oneAdmin);

    if($count == 1){
        $_SESSION['admin'] = $row['role'];
        header("location: /start/index.php"); 
    }
    else if(  $count == 0 ){
        echo "<div class='alert alert-danger text-center mx-auto w-50' role='alert'>
                Login Faild Please Try Again!!
            </div>";
    }



}

print_r($_SESSION);


?>
<?php 

if(  ( isset($_SESSION['admin']) == "admin")  ||  ( isset($_SESSION['admin']) == "doctor")  ||  (isset($_SESSION['admin']) == "employee") ){ ?>
    
    <div class="container col-6">
    <h1 class="text-center text-info my-3"> Your Already Login </h1>
    </div>


<?php 
}
else{


?>


<h1 class="text-center text-info my-3"> Login </h1>

<div class="container col-4 my-5 px-4 bg-dark text-light">
    <form method="POST"  >
        <div class="form-group">
            <label >User Name</label>
            <input name="username" type="text" class="form-control" >
        </div>

        <div class="form-group">
            <label >Password</label>
            <input name="password" type="password" class="form-control" >
        </div>

        <button name="login" type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?php  } ?>



<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
    crossorigin="anonymous"></script>

    <script src="./start/js/home.js"></script>

</body>

</html>