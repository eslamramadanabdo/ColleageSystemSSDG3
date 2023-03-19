<?php

include("../shared/head.php");
include("../general/connectDB.php");


// select all docotr
$select = "SELECT doctor.id , doctor.name , doctor.address , doctor.salary  , course.name as cname , department.name as dname
FROM `doctor` JOIN course JOIN department ON
doctor.courseID = course.id and 
doctor.departmentID = department.id;";

$allDoctors = mysqli_query($connect, $select);
// ===================================================

// delete student
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $delete = "DELETE from doctor where id = $id";
    $deleteStatus = mysqli_query($connect , $delete);

    header( "location: /start/Doctor/list.php" );

}





?>




<h1 class="text-center text-info my-3"> List All Doctors </h1>
<div class="container col-6 my-5">

    <table class="table ">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Salary</th>
                <th> course Name </th>
                <th> Department Name </th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody style=" background-color: gray; color: white; ">
            <?php foreach($allDoctors  as $key => $item) {  ?>
                <tr>
                    <th> <?php  echo $key +1  ?> </th>
                    <td>  <?php echo $item['name']    ?>   </td>
                    <td>  <?php echo $item['address']    ?>   </td>
                    <td>  <?php echo $item['salary']    ?>   </td>
                    <td>  <?php echo $item['cname']    ?>   </td>
                    <td>  <?php echo $item['dname']    ?>   </td>
                    <td>
                        <a href="/start/Doctor/list.php/?delete=<?php echo $item['id'] ?>"> <i class="fa-solid fa-trash-can text-danger display-5 mr-2"></i>  </a>
                        <a href="/start/Doctor/edite.php/?edit=<?php echo $item['id'] ?>"> <i class="fa-solid fa-pen-to-square text-info display-5"></i>  </a>
                    </td>
                
                </tr>
            <?php  } ?>
        </tbody>
    </table>


</div>









<?php

include("../shared/footer.php");

?>