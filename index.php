
<?php
session_start();
include('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechLearning</title>
    <!-- carousel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    
   
    <!-- Customcss -->
    <link rel="stylesheet" href="css/style.css">  
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- GoogleFont -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
<style>
  .scrolled {
      background-color: rgba(0, 0, 0, 0.4) !important;}

    @media (max-width:991.98px) {
     .padding {
         padding: 1.5rem;
     }
 }

 @media (max-width:767.98px) {
     .padding {
         padding: 1rem;
     }
 }
</style>

</head> 
<body>
<?php


if(isset($_SESSION['is_login'])){
    $stuEmail =  $_SESSION['stud_email'];
   include('nav_login.php');
  }else{
    include('nav.php');
  }

?>

<!-- start video background -->
<div class="container-fluid vid-mar-remove">
  <div class="vid-parent">
    <video playsonline autoplay muted Loop>
      <source src="videos/typeing.mp4">
    </video>
    <div class="vid-overlay">

    </div>
    <div class="vid-content mx-auto">
      <h1 class="my-content1">Welcome to TechLearning</h1>
      <p class="my-content2 ">Learn and Implement</p><br>
      <?php 
        if(isset($_SESSION['is_login'])){
          $button = '     
          <a class=" btn bg-primary btn-sm shadow ml-2" href="./Student/studentProfile.php">My Profile</a>';

        }else{ 
            $button =' 
            <a href="" class="btn get-btn btn-sm btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">Get started</a>';
        }
    
    ?>
      <?php echo $button;?>
  


    </div>
  </div>
</div>
<!--  End video background -->
 <!-- Start Text Banner -->
 <div class="container-fluid txt-banner">
   <div class="row bottom-banner py-2 pt-3" >
   <div class="col-sm ml-5">
   <h6><i class="fa fa-book"></i> 100 + Online Courses</h6>
  </div>
  <div class="col-sm ml-5">
   <h6><i class="fa fa-users"></i> Expert Instructors</h6>
  </div>
  
  <div class="col-sm ml-5">
   <h6><span><img src="images/keybord.svg " height="25px" ></span> Lifetime Access</h6>
  </div>
  <div class="col-sm ml-5">
   <h6><span><img src="images/dollar.svg " height="25px"></span>  Money Bank</h6>
  </div>
   </div>

 </div>
 <!--End Text Banner -->
 <!-- start Most Popular Courses -->
 <div class="container courses mt-4" id="courses">
 <h3 class="text-center pop-h mb-4" style="text-shadow:0px 0px 10px white; ">Popular Courses</h3>
 <!-- start most popular course 1st card Deck -->
 <div class="row mb-5">
 <?php
      $sql = "SELECT * FROM course LIMIT 6 ";

      $result = $con->query($sql);
      if($result->num_rows > 0){
        while($row = $result-> fetch_assoc()){
          $s_img = $row['C_img'];
          $n_img = str_replace('..','.',$s_img);
          $course_id = $row['course_id'];?>
 

 <div class="col-lg-4 col-sm-11 mb-5 coloum ">
 <div class="card mx-auto" style=" height:380px;">
  <img src="<?php echo $n_img ?>" class="card-img-top" alt="..."style="height:180px;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['C_Name'] ?></h5>
    <p class="card-text"><?php echo $row['C_desk'] ?></p>
    <p class="card-text d-inline">Price:<small><del>&#8377 <?php echo $row['C_original_price'] ?></del></small><span class="font-weight-bolder">&#8377 <?php echo $row['C_price'] ?></span></p>
    <a href="course_details.php?course_id=<?php echo $course_id ?>" class="btn btn-primary">Enroll</a>
    
  </div>
</div>
 </div>
  <?php
    }
  }
  ?>

<div class="text-center  course_btn  mx-auto" style=" background-color:#ff0000; border:none!important;  border-radius:50px; padding:5px; justify-content:center;" >
<a class=" btn btn-sm text-white" href="all_courses.php"  >View All Courses</a>
 </div>
  </div>
 
 
 </div>
<!-- End Most Popular Courses -->

<!-- happyclient -->
<div class="container ">
<div id="feedback">
<h3 class="text-center mb-4" style="text-shadow:0px 0px 10px white;">What our client's says..!!</h3>

<div class="items "style="margin-bottom:20px !important; ">

<?php
      $sql = "SELECT s.Name, s.stu_occp, s.stu_img, f.f_content FROM sign_up AS s JOIN feedback AS f ON s.id = f.stu_id";
      $result = $con->query($sql);
      if($result->num_rows > 0){
        while($row = $result-> fetch_assoc()){
          $s_img = $row['stu_img'];
          $n_img = str_replace('..','.',$s_img);
        ?>

    <div class="card"  style="background-color:blueviolet;color:white;">
        <div class="card-body">
        <h4 class="card-title"><img src="https://img.icons8.com/ultraviolet/40/000000/quote-left.png"></h4>
            <div class="template-demo">
                <p><?php echo $row['f_content'] ?></p>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-2 "> <img class="profile-pic" src="<?php echo './Student/'.$n_img ?>" > </div>
                <div class="col-sm-10">
                    <div class="profile ml-4 text-uppercase">
                        <h4 class="cust-name"><?php echo $row['Name'] ?></h4>
                        <p class="cust-profession"><?php echo $row['stu_occp'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
      }
    ?>
   
</div>
</div>
    </div>
    </div>

<!-- ---end happyclint -->

  







<!-- Contact-Us start -->
<div class="container-fluid sec-cont  py-3" id="contact" >
  
  <h1 class="cont mt-5 text-white py-2">Contact Us</h1>
  <div class="row mb-3 pb-3 ml-2 mx-auto">
    <div class="col-lg-8 col-sm-11 ">
  <form class="contact " action="mailto:shwetay629@gmail.com" method="post" enctype="text/plain">
  <div class="form-group ">
    <label for="exampleInputEmail1" class="text-white">&nbsp;&nbsp;<i class="fa fa-user text-white"></i>  Name</label>
    <input autocomplete="off" required type="name" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" required>
    
  </div>

  <div class="form-group ">
    <label for="exampleInputEmail1 " class="text-white">&nbsp;&nbsp;<i class="fa fa-book text-white"></i>  Subject</label>
    <input autocomplete="off" required type="text" class="form-control "name="subject" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" required>
    
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"  class="text-white">&nbsp;&nbsp;<i class="fa fa-envelope text-white"></i> Email address</label>
    <input autocomplete="off" required type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" autocomplete="off" required>
    
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1"  class="text-white">&nbsp;&nbsp;&nbsp;<i class="fa fa-comment text-white"></i> Message</label></label>
    <textarea class="form-control " id="exampleFormControlTextarea1" name="textfield" rows="3" autocomplete="off" required></textarea>
  </div>
  <center><button type="submit" class="btn btn-primary ">Submit</button></center>
</form>
</div>
<div class="col-lg-4 col-sm-11 mx-auto">
  <div class="card details mx-auto ml-3 mt-4" style="width: 20rem;" >
<h3 class="text-white text-center pt-4">Get In Touch <i class="fa fa-handshake-o text-white"></i></h3>
<div class="sub-cont ml-5 mt-5">
<p><i class="fa fa-envelope text-white "></i> Email: shwetay629@gmail.com</p>
<p><i class="fa fa-phone text-white "></i> Mobile: 9120699927</p>
<p><i class="fa fa-globe text-white "></i> Website: TechLearning.co.in</p>
<p><i class="fa fa-map text-white "></i> Location: Lucknow.U.P.India</p>
</div>

  </div>
</div>
</div>
</div>
<!-- Contact-Us End -->
<!-- About -->
<!-- Footer -->
<footer class="footer text-white  p-1 pt-3">

  <!-- Footer Text -->
  <div class="container-fluid text-center ">

    <!-- Grid row -->
    <div class="row ">

      <!-- Grid column -->
      <div class="col-md-4 col-sm-11  text-center pt-3 first">

        <!-- Content -->
       <h5 class="text-uppercase text-center font-weight-bold">About Us</h5></center>
        <p>TechLearning provides universal access <br>to world's best education, partnering <br>with top university and organization <br> to offer courses online. </p>

      </div>
      <!-- Grid column -->

      

      <!-- Grid column -->
      <div class="col-md-4 col-sm-11 text-center pt-3">

        <!-- Content -->
        <h5 class="text-uppercase font-weight-bold">Cetegory</h5>
        <p>Web Development <br> Web Designing <br> Android App Dev <br> iOS Development <br> Data Analysis</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-sm-11 mb-3 pt-3 ">

        <!-- Content -->
        <h5 class="text-uppercase font-weight-bold">Contact Us</h5>
        <p>TechLearning pvt Ltd <br>Viswaas Khand 3, GomtiNagar <br> Lucknow <br> Ph.912069927 </p>

      </div>
      <!-- Grid column -->


    </div>
    <!-- Grid row -->

  </div>
  


<!-- Footer -->
<!-- About -->

<!-- footer -->

      <center>
        <p ><a href="https://www.facebook.com" target="_blank"><i
              class=" fa fa-facebook text-primary mt-5 fa-2x ml-3"></i></a>
          <a href="https://www.instagram.com" target="_blank"><i
              class=" fa fa-instagram text-danger fa-2x ml-3"></i></a>
          <a href="https://twitter.com" target="_blank"><i class="
                  fa fa-twitter text-info fa-2x ml-3"></i></a>
          <a href="https://in.linkedin.com" target="_blank"><i class="
                        fa fa-linkedin text-primary fa-2x ml-3"></i></a>
        </p>
        <h5 class="text-center">Copyright © 2020, Designed by TechLearning || <a href="#modaladminLoginForm" class=" text-white" data-toggle="modal" data-target="#modaladminLoginForm">Admin Login</a></h5>
      </center>

    </footer> 
    


<!-- Footer -->
<!-- End Footer -->
<!-- LogIn Modal form  -->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog  modal-dialog-centered " role="document">
  <div class="modal-content log-modal">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold  ">Student LogIn <i class="fa fa-lock"></i> </h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="log_in.php" method="POST">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          &nbsp;&nbsp;<i class="fa fa-envelope" ></i> 
          <label data-error="wrong" data-success="right" for="defaultForm-email "class="text-white" type="email" name="mail">  Your email</label>
          <input autocomplete="off" required type="email"  name="mail" id="defaultForm-email" class="form-control validate" >
         
        </div>

        <div class="md-form ">
        &nbsp;&nbsp;<i class="fa fa-key " ></i>
          <label data-error="wrong" data-success="right" for="defaultForm-pass" class="text-white"> Your password</label>
          <input autocomplete="off" required type="password" id="defaultForm-pass" type="password" name="password" class="form-control validate">
          
        </div>
        
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default btn btn-primary mb-5" type="submit" name="login" style="width:100px;border-radius:50px;box-shadow:0px 0px 5px black;">Login</button>
       
        
      </div>
      </form>
    </div>
  </div>
</div> 

<!-- LogIn Modal form end-->
<!-- SignUp Modal form start-->

<?php
//registration 
include 'dbcon.php';

if(isset($_POST['submit'])){
  $username = mysqli_real_escape_string($con, $_POST['name']);
  $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);//special characters are not use in password this method use for security purposre of hackers.

  // password encrypt code 
  // $pass = password_hash($password, PASSWORD_BCRYPT);

  // dublicate email not existing code
  $emailquery = "select * from sign_up where email='$email'";
  $query = mysqli_query($con,$emailquery);

  $emailcount = mysqli_num_rows($query);
  if($emailcount>0){
    echo '<script>alert("Email already exists")</script>';
  }else{
    $insert_query="INSERT INTO sign_up( Name, Phone, Email, Password) VALUES ('$username','$mobile','$email','$password')";

    $iquery = mysqli_query($con,$insert_query);

    if($iquery){

      echo"<script>alert('SignUp Successfully')</script>";
  
  }else{
      echo"<script>alert('SignUp Failed')</script>";
      
  }
  }
}
?>

<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered  " role="document">
    <div class="modal-content sign-modal">
      <div class="modal-header text-center">
        <h5 class="modal-title text-white w-100  mt-3 font-weight-bold">Student Registration  <i class="fa fa-user text-white"></i> </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">

      <form action="" method="POST"> 

        <div class="md-form mb-3">
        
        &nbsp;&nbsp;<i class="fa fa-user text-white"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name" class="text-white">Your name</label>
          <input autocomplete="off" required type="text" name="name" id="orangeForm-name" class="form-control validate" autocomplete="off" required>
         </div>
         <div class="md-form mb-3">
        &nbsp;&nbsp;<i class="fa fa-phone text-white"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name" class="text-white">Your Mobile</label>
          <input autocomplete="off" required type="number" name="mobile" id="orangeForm-name" class="form-control validate" autocomplete="off" required>
         </div>

        <div class="md-form mb-3">
        &nbsp;&nbsp;<i class="fa fa-envelope text-white"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-email" class="text-white">Your email</label>
          <input autocomplete="off" required type="email" name="email" id="orangeForm-email" class="form-control validate" autocomplete="off" required>
          
        </div>

        <div class="md-form mb-3">
        &nbsp;&nbsp;<i class="fa fa-key text-white "></i>
          <label data-error="wrong" data-success="right" for="orangeForm-pass" class="text-white">Your password</label>
          <input autocomplete="off" required type="password" name="password" id="orangeForm-pass" class="form-control validate" autocomplete="off" required>
        </div>

        
      
        
      </div>
      <div class="modal-footer d-flex justify-content-center">
    
        <button  type="submit" name="submit" class="btn btn-deep-orange mb-3 btn-success mb-5"style="width:100px;border-radius:50px;box-shadow:0px 0px 5px black;">Submit</button>
        
         
        
      </div>
      </form>
    </div>
  </div>
</div>




<!-- Admin start -->

<div class="modal fade" id="modaladminLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog  modal-dialog-centered " role="document">
  <div class="modal-content log-modal">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold  ">Admin LogIn <i class="fa fa-lock"></i> </h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="Admin_login.php" method="POST">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          &nbsp;&nbsp;<i class="fa fa-envelope" ></i> 
          <label data-error="wrong" data-success="right" for="defaultForm-email "class="text-white" type="email" name="mail">  Your email</label>
          <input autocomplete="off" required type="email"  name="mail" id="defaultForm-email" class="form-control validate">
         
        </div>

        <div class="md-form ">
        &nbsp;&nbsp;<i class="fa fa-key " ></i>
          <label data-error="wrong" data-success="right" for="defaultForm-pass" class="text-white"> Your password</label>
          <input autocomplete="off" required type="password" id="defaultForm-pass"  name="password" class="form-control validate">
          
        </div>
        
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default btn btn-primary mb-5" type="submit" name="admin" style="width:100px;border-radius:50px;box-shadow:0px 0px 5px black;">Login</button>
      
        
      </div>
      </form>
    </div>
  </div>
</div> 

<!-- LogIn Modal form end-->
<!-- Admin End -->







<!-- javascript links -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
    <script>
      $(window).scroll(function () {
        $('nav').toggleClass('scrolled', $(this).scrollTop() > 180);
      });
      
    </script>
    <script>
    $(document).ready(function(){

$('.items').slick({
dots: true,
infinite: true,
speed: 800,
autoplay: true,
autoplaySpeed: 2000,
slidesToShow: 4,
slidesToScroll: 4,
responsive: [
{
breakpoint: 1024,
settings: {
slidesToShow: 3,
slidesToScroll: 3,
infinite: true,
dots: true
}
},
{
breakpoint: 600,
settings: {
slidesToShow: 2,
slidesToScroll: 2
}
},
{
breakpoint: 480,
settings: {
slidesToShow: 1,
slidesToScroll: 1
}
}

]
});
});
    </script>

    
  </body>
</html>