<?php

include("../shared/head.php");
include("../general/connectDB.php");


// select all student
$select = "SELECT  
            student.id , 
            student.name as sname , 
            student.level , 
            student.GPA,
            doctor.name as dname,
            course.name as cname
            from student  JOIN doctor JOIN course ON
            student.courseid = course.id AND
            student.doctorid = doctor.id
            ORDER BY student.id;";

$allStudent = mysqli_query($connect, $select);
// ===================================================

// delete student
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $delete = "DELETE from student where id = $id";
    $deleteStatus = mysqli_query($connect , $delete);

    header( "location: /start/student/list.php" );

}





?>




<h1 class="text-center text-info my-3"> List All Students </h1>
<div class="container col-6 my-5">

    <table class="table ">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Level</th>
                <th>GPA</th>
                <th> Doctor Name </th>
                <th> Course Name </th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody style=" background-color: gray; color: white; ">
            <?php foreach($allStudent  as $key => $student) {  ?>
                <tr>
                    <th> <?php  echo $key +1  ?> </th>
                    <td>  <?php echo $student['sname']    ?>   </td>
                    <td>  <?php echo $student['level']    ?>   </td>
                    <td>  <?php echo $student['GPA']    ?>   </td>
                    <td>  <?php echo $student['dname']    ?>   </td>
                    <td>  <?php echo $student['cname']    ?>   </td>
                    <td>
                        <a href="/start/student/list.php/?delete=<?php echo $student['id'] ?>"> <i class="fa-solid fa-trash-can text-danger display-5 mr-2"></i>  </a>
                        <a href="/start/student/edite.php/?edit=<?php echo $student['id'] ?>"> <i class="fa-solid fa-pen-to-square text-info display-5"></i>  </a>
                    </td>
                
                </tr>
            <?php  } ?>
        </tbody>
    </table>


</div>









<?php

include("../shared/footer.php");

?>