<?php
include('../Admin/header.php');
include('../dbcon.php');

session_start();
// authentication code
if(isset($_SESSION['is_admin_login'])){
    $email = $_SESSION['email'];
 } else {
    echo "<script> location.href='../index.php'</script>";
 }
 $sql = "SELECT * FROM sign_up";
 $result = $con->query($sql);
 $totalStu = $result->num_rows;

 $sql = "SELECT * FROM course";
 $result = $con->query($sql);
 $totalCourses = $result->num_rows;

 $sql = "SELECT * FROM courseorder";
 $result = $con->query($sql);
 $totalOrder = $result->num_rows;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./admin_css/admin_style.css" >
    <style>
        .table td,
.table th {
  padding: 15px 2.3rem !important;
}
ul li .nav-link{
        color: white !important;
        margin:0 0.4rem;
        line-height:2.2;
        transition: 0.2s linear all;
        letter-spacing:1.3px;
    }
   

    </style>
</head>
<body>
<div class="col-lg-9 mx-auto col-sm-11 ">
    <div class="row  mx-auto text-center " >
    <div class="col-sm-4 mt-5  ">
    <div class="card text-white dash-card mb-3 " style="max-width:30rem;">
    <div class="card-header"><i class="fa fa-book"></i> Courses</div>
    <div class="card-body">
    <h4 class="card-title"><?php  echo  $totalCourses;?></h4>
    <a class="btn text-white" href="courses.php">View</a>
    </div>
    </div>
    </div>

    <div class="col-sm-4 mt-5 ">
    <div class="card text-white dash-card mb-3 " style="max-width:25rem;">
    <div class="card-header"><i class="fa fa-users"></i> Students</div>
    <div class="card-body">
    <h4 class="card-title"><?php  echo $totalStu;?></h4>
    <a class="btn text-white" href="student.php">View</a>
    </div>
    </div>
    </div>

    <div class="col-sm-4 mt-5 ">
    <div class="card text-white dash-card mb-3 " style="max-width:25rem!important;">
    <div class="card-header"><i class="fa fa-rupee"></i> Sold</div>
    <div class="card-body">
    <h4 class="card-title"><?php  echo $totalOrder;?></h4>
    <a class="btn text-white" href="sellReport.php">View</a>
    </div>
    </div>
    </div>





    </div>
    <div class="  mx-auto mt-5 text-center">
    <!-- Table  -->
    <p class="bg-dark text-white p-2">Courses Ordered</p>
    <?php
    $sql = "SELECT * FROM courseorder";
    $result = $con->query($sql);
    if($result->num_rows > 0){
        echo '<table class="table table-responsive shadow table-hovered table-striped mx-auto " cellpadding="4" >
        <thead>
        <tr class="bg-primary">
        <th scope="col">Order ID</th>
        <th scope="col">Courses ID</th>
        <th scope="col">Student Email</th>
        <th scope="col">Order Date</th>
        <th scope="col">Amount</th>
        <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>';
        while($row=$result->fetch_assoc()){
            echo '<tr>';
            echo '<th scope="row">'.$row['order_id'].'</th>';
            echo '<td style="" >'.$row['course_id'].'</td>';
            echo '<td style="">'.$row['stu_email'].'</td>';
            echo '<td style="">'.$row['order_date'].'</td>';
            echo '<td style="">'.$row['amount'].'</td>';
            echo '<td style="">

            <form action="" method="post" class="d-inline">
            <input type="hidden" name="id" value='.$row["co_id"].'>
            <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="fa fa-trash"></i></button></form>
            </td>';
            echo '</tr>';
           
            
        }
        echo ' </tbody> 
        </table>';

    }else{
        echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2 role="alert">
        0 Record Found ! ☹️
        ';
    }
    if(isset($_POST['delete'])){
        $sql = "DELETE FROM courseorder WHERE co_id ={$_REQUEST['id']}";
        if($con->query($sql)=== TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?delete"/>';
        }
        else{
            echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2 role="alert">
           Unable to Delete the data ! ☹️
            ';
        }
    }

    ?>


    
  
  

   
  
    </div>
</div>

</div>
    
</body>
</html>

    








<?php
include('../Admin/footer.php');
?>