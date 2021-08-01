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
    <title>watch course</title>
</head>
<body>
    <div class="container col-sm-8">
    <div class="container-fluid bg-success pb-3 my-3">
        <h3  class="text-center text-white pt-3">Welcome to Tech~Learning</h3>
        <!-- <a href="./mycourses.php" class="btn btn-danger">MyCourse</a> -->
    </div>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-11 mx-auto ">
                <h4 class="text-center">Video Lessons</h4>
                <ul id="playlist" class="nav flex-column justify-content-center "></ul>
                <?php if(isset($_GET['course_id'])){ 
                    $course_id = $_GET['course_id'];
                    $sql ="SELECT * FROM lesson WHERE course_id=' $course_id'";
                    $result = $con->query($sql);
                    if($result->num_rows> 0 ){
                        while($row = $result->fetch_assoc()){
                            echo '<li class="nav-item border-bottom py-2 mb-2 " movieurl='.$row['lesson_link'].' style="cursor:pointer;">'.$row['lesson_name'].'</li>
                            <video id="videoarea" src="'.$row['lesson_link'].'" class="mb-4 w-75 ml-2" controls >

                            </video>
                            
                            ';
                        }
                    }  
                }
                ?>
                </ul>
            </div>
            

            </div>
        </div>
  

            
<!-- javascript links -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- <script src="./stuInclude/custom.js"></script> -->


</body>
</html>