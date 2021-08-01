<?php
include('../dbcon.php');
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['is_login'])){

    $stuLogEmail = $_SESSION['stud_email'];
 }
//  else{
//      echo "<script>location.href='../index.php';</script>";
//  }

if(isset($stuLogEmail)){
    $sql = "SELECT stu_img FROM sign_up WHERE Email = '$stuLogEmail'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechLearning</title>
    <!-- Customcss -->
     <!-- <link rel="stylesheet" href="css/style.css">   -->
    <link rel="stylesheet" href="../Admin/admin_css/admin_style.css">  
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- GoogleFont -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
<style>
  .scrolled {
      background-color: rgba(0, 0, 0, 0.4) !important;

    }
    ul li .nav-link{
        color: white !important;
        margin:0px 0.5rem;
        line-height:2.3;
        transition: 0.2s linear all;
        letter-spacing:1px;
        
    }
    ul li .nav-link:hover{
        border-bottom:2px solid white;
        color:#0396F3 !important;   
        transform: scale(1.1,1.1);
         }
        
</style>

</head> 
<body>
<!-- Navigationbar -->

<div class="container-fluid header p-2">
    <a class="navbar-brand text-white ml-3" href="../index.php" style="font-size: 15px!important;"><h3>TechLearning</h3></a>
    <span class="navbar-text text-white mr-auto mx-3 "><a  class=" text-white" href="../index.php">Learn and Implement</a></span>
  </div>

<!-- End Navigationbar -->
<div class="row dashboard_row">
    <div class="col-lg-2 first col-sm-11  "style=" height:auto;background-image: linear-gradient( 94.3deg,  rgba(26,33,64,1) 10.9%, rgba(81,84,115,1) 87.1% );
    ">
    <nav class="navbar  profile navbar-light py-4 px-2">
            <ul class="navbar-nav mx-auto " >

             
            <img src="<?php echo $stu_img?>" alt="studentimage" class="" style="height:120px;width:120px; border-radius:50%; border:2px solid white; margin-bottom:20px;box-shadow:0px 0px 10px black;">
             

            <li class="nav-item ">
                <a class="nav-link  text-primary <?php if(PAGE == 'profile'){echo 'active';}?>" 
                href="studentProfile.php"> 
                <i class="fa fa-user"></i> Profile <span class="sr-only">(current)</span></a>
            </li>

                
                
                <li class="nav-item ">
                    <a class="nav-link text-primary" href="mycourses.php"> <i class="fa fa-book"></i> My Courses</a>
                </li>
                
                <li class="nav-item ">
                    <a class="nav-link text-primary" href="../Student/stu_feedback.php"><i class="fa fa-comments"></i> Feedback</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-primary" href="../Student/changepswd.php"> <i class="fa fa-key" ></i> Change Password</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-primary" href="../logout.php"> <i class="fa fa-sign-out ml-2"></i> Logout</a>
                </li>
            </ul>
        </nav>
    </div>


























