<?php
if(!isset($_SESSION)){
    session_start();
}

include('./stuInclude/header.php');
include('../dbcon.php');


if(isset($_SESSION['is_login'])){
    $stuEmail =  $_SESSION['stud_email'];
    
}else{
    echo "<script> location.href='../index.php'; </script>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">  
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Mycourses</title>
</head>
<body>
    <div class="container col-sm-8  ">
        <h4 class=" text-center my-4 font-weight-bold text-primary">All Courses <i class="fa fa-book"></i></h4>
        <div class="row  px-3">
            
            <?php
            if(isset($stuEmail)){
                $sql = "SELECT co.order_id,c.course_id,c.C_Name,c.C_duration,c.C_desk,c.C_img,c.C_author,c.C_original_price,c.C_price FROM courseorder AS co JOIN course AS c ON c.course_id = co.course_id WHERE co.stu_email ='$stuEmail'";
                $result = $con->query($sql);
                if($result->num_rows > 0){
                    while($row=$result->fetch_assoc()){
                        ?>

                        <div class="bg-light mb-3 shadow">
                        <h5 class="card-header">
                            <?php echo $row['C_Name']?>
                        </h5>
                        <div class="row">
                            <div class="col-sm-5">
                                <img src="<?php echo $row['C_img'];?>"
                                class="card-img-top h-100 " alt="course_image">
                            </div>
                            <div class="col-sm-4 mb-3">
                                <div class="card-body">
                                    <p class="card-title">
                                        <?php echo $row['C_desk'];?>
                                    </p>
                                    <small class="card-text">Duration: <?php echo $row['C_duration']?>
                                </small><br/>
                                <small class="card-text">Instructor: <?php echo $row['C_author']?>
                                </small><br/>
                                <p class="card-text d-inline">Price: <small><del>&#8377 <?php echo $row['C_original_price']?></del>
                            </small>
                        <span class="font-weight-bolder">&#8377 <?php echo $row['C_price']?></span>
                        </p><br>
                        <a href="watchcourse.php?course_id=<?php echo $row['course_id']?>" class="btn btn-primary mt-3">Watch Course</a>
                                </div>
                            </div>
                        </div>
                        </div>

            <?php
                    }
                }
            }
            
            ?>
                     <hr>
                 </div>
             </div>
        </div>
        </div>
      

       
  <?php
include('./stuInclude/footer.php');
?>