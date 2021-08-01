<?php
//    session_start();
   include ("dbcon.php");
   $_SESSION['stud_email'];
   $user_profile = $_SESSION['stud_email'];
  $query = "SELECT * FROM sign_up where Email='$user_profile'";
  $data = mysqli_query($con,$query);
  
  $result= mysqli_fetch_array($data);
 
?>
<div class="container">



<!-- Navigationbar -->
<nav class="navbar navbar-expand-sm navbar-light  pl-5 fixed-top">
  <a class="navbar-brand " href="index.php" >TechLearning</a>
  <span class="navbar-text text-white">Learn and Implement</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse  navbar-collapse" id="navbarNav">
    <ul class="navbar-nav custom-nav text-center mx-auto">
      <li class="nav-item active">
        <a class="nav-link text-white  ml-2" href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white ml-2" href="all_courses.php">Courses</a>
      </li>
     
    
      <li class="nav-item">
        <a class="nav-link text-white ml-2" href="index.php#feedback">Feedback</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white ml-2" href="index.php#contact">Contact</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link  text-white ml-2" href="./Student/studentProfile.php">My Profile</a>
      </li>
      <li class="nav-item">
      <a href="logout.php" class=" nav-link  text-white ml-2 text-white">Logout</a>
      </li>
      <li class="nav-item name">
      <span class="badge badge-danger mt-2 text-center mr-4 ml-5 badge-pill  float-right " style="font-size:18px;background-color:#ff0000"><?php echo  $result['Name'];?></span>
      </li>
      
      

    </ul>
  
  </div>
  
</nav>
</div>

 
<!-- End Navigationbar -->