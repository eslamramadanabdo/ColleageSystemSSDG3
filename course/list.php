<?php

include("../shared/head.php");
include("../general/connectDB.php");


// select all student
$select = "SELECT * FROM course ";

$all = mysqli_query($connect, $select);
// ===================================================

// delete student
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $delete = "DELETE from course where id = $id";
    $deleteStatus = mysqli_query($connect , $delete);

    header( "location: /start/course/list.php" );

}





?>


<?php 
    if(  ($_SESSION['admin'] == "admin")  ||  ($_SESSION['admin'] == "doctor")  ||  ($_SESSION['admin'] == "employee") ){}
    else{
        header("location: /start/admin/login.php");
    }
?>

<h1 class="text-center text-info my-3"> List All Courses </h1>
<div class="container col-6 my-5">

    <table class="table ">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Hourse</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody style=" background-color: gray; color: white; ">
            <?php foreach($all  as $key => $item) {  ?>
                <tr>
                    <th> <?php  echo $key +1  ?> </th>
                    <td>  <?php echo $item['name']    ?>   </td>
                    <td>  <?php echo $item['hourse']    ?>   </td>

                    <td>
                        <a href="/start/course/list.php/?delete=<?php echo $item['id'] ?>"> <i class="fa-solid fa-trash-can text-danger display-5 mr-2"></i>  </a>
                        <a href="/start/course/edite.php/?edit=<?php echo $item['id'] ?>"> <i class="fa-solid fa-pen-to-square text-info display-5"></i>  </a>
                    </td>
                
                </tr>
            <?php  } ?>
        </tbody>
    </table>


</div>









<?php

include("../shared/footer.php");

?>