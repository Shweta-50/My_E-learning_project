<?php
session_start();
include('dbcon.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All courses</title>
  <!-- Customcss -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/mobile.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- GoogleFont -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">


  <style>
    * {
      margin: 0px;
      padding: 0px;
      box-sizing: border-box;
    }

    .scrolled {
      background-color: rgba(0, 0, 0, 0.4) !important;

    }

    .navbar-brand {
      font-family: 'Ubuntu', sans-serif;
     
      font-weight: bold;
      color: #fff !important;
    }

    .custom-nav-item {
      color: #fff !important;

    }

    .custom-nav-item:hover {
      background-color: #ff0000;
      border-radius: 5px;
      color: white !important;


    }

    .log-btn:hover {
      background-color: #ff0000 !important;
      border-radius: 5px !important;
      color: white !important;
    }

    .sign-btn:hover {
      background-color: #ff0000 !important;
      border-radius: 5px !important;
      color: white !important;
    }

    #banner_img {
      box-shadow: 0px 0px 5px black;
      height: 60vh;
      width: 100%;
      background: url('images/1.jpg');
      text-shadow: 0px 0px 5px black;


    }

    .footer {

      background-color: black !important;
      margin-bottom: -15px !important;
      ;

    }

    footer .fa {
      height: 50px;
      width: 50px;
      border-radius: 50px;
      border: 3px solid blueviolet;
      border: none;
      background: #232b2b;
      padding-top: 9px;
      margin-top: 15px !important;




      transition: 0.3s ease all;

    }

    footer .fa:hover {

      transform: scale(0.8, 0.8) !important;


    }

    .content {

      position: absolute;
      top: 25%;
      left: 50%;
      text-align: center;
      transform: translate(-50%, -50%);
      color: white;
      z-index: 2;
      width: 100%;

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
  <!-- Navigationbar -->


  <!-- End Navigationbar -->

  <header class="header" id="banner_img">

    <h1 class="content mt-4">“I did then what I knew how to do. Now that <br><br> I know better, I do better.”</h1>
    <!-- <h4 class="content2"> “Develop a passion for learning. If you do, you will never cease to grow.” </h4><br> -->

  </header>





  <div class="container  ">
    <div class="row">
      <div class="col-md-8 col-sm-10 mx-auto ">
        <?php
        if (isset($_GET['course_id'])) {
          $course_id = $_GET['course_id'];

          $sql = "SELECT * FROM course WHERE course_id='$course_id'";

          $result = $con->query($sql);

          if ($row = $result->fetch_assoc()) {
            $s_img = $row['C_img'];
            $n_img = str_replace('..', '.', $s_img);
            $course_id = $row['course_id'];
            $_SESSION['course_id'] = $course_id;
          }
        }


        ?>

        <div class="card detail_card mb-3 mx-auto my-3 mt-3 " >
          <div class="row no-gutters ">
            <div class="col-md-5 col-sm-4 " style="height:280px;">
              <img src="<?php echo $n_img; ?>" class="card-img h-100" alt="...">
            </div>
            <div class="col-md-7 col-sm-6 mt-4">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['C_Name']; ?></h5>
                <p class="card-text"><?php echo $row['C_desk']; ?></p>
                <p class="card-text">Duration : <?php echo $row['C_duration']; ?></p>

                <form action="checkout.php" method="POST">
                  <p class="card-text d-inline">Price:<small><del>&#8377 <?php echo $row['C_original_price'] ?></del></small><span class="font-weight-bolder">&#8377 <?php echo $row['C_price'] ?></span></p>
                  <input type="hidden" name="price" value="<?php echo $row['C_price']; ?>">
                  <br><br>
                  <input type="submit" class="btn btn-primary text-white font-weight-bolder  " name="buy" value="Buy Now">
                </form>


                <!-- <a href="checkout.php" class="btn btn-primary  my-3">Buy now</a> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- table -->
  <div class="container px-4">
    <div class="row">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">Lesson No.</th>
            <th scope="col">Lesson Name.</th>


          </tr>

        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM lesson";
          $result = $con->query($sql);
          if ($result->num_rows > 0) {
            $num = 0;
            while ($row = $result->fetch_assoc()) {
              if ($course_id == $row['course_id']) {
                $num++;
                echo '
            <tr>
            <td scope="col">' . $num . '</td>
            <td scope="col">' . $row['lesson_name'] . '</td>
            </tr>';
              }
            }
          }

          ?>


        </tbody>
      </table>

    </div>
  </div>




  <!-- footer -->
  <footer class="footer mb-0">
    <center>
      <p><a href="https://www.facebook.com" target="_blank"><i class=" fa fa-facebook text-primary mt-3 fa-2x ml-3"></i></a>
        <a href="https://www.instagram.com" target="_blank"><i class=" fa fa-instagram text-danger fa-2x ml-3"></i></a>
        <a href="https://twitter.com" target="_blank"><i class="
                  fa fa-twitter text-info fa-2x ml-3"></i></a>
        <a href="https://in.linkedin.com" target="_blank"><i class="
                        fa fa-linkedin text-primary fa-2x ml-3"></i></a>
      </p>
      <h5 class="text-center text-white pb-2">Copyright © 2020, Designed by TechLearning</a></h5>
    </center>

  </footer>


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
          <input type="email"  name="mail" id="defaultForm-email" class="form-control validate">
         
        </div>

        <div class="md-form ">
        &nbsp;&nbsp;<i class="fa fa-key " ></i>
          <label data-error="wrong" data-success="right" for="defaultForm-pass" class="text-white"> Your password</label>
          <input type="password" id="defaultForm-pass" type="password" name="password" class="form-control validate">
          
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
        echo "Email already exists";
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
          <input type="text" name="name" id="orangeForm-name" class="form-control validate" autocomplete="off" required>
         </div>
         <div class="md-form mb-3">
        &nbsp;&nbsp;<i class="fa fa-phone text-white"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name" class="text-white">Your Mobile</label>
          <input type="number" name="mobile" id="orangeForm-name" class="form-control validate" autocomplete="off" required>
         </div>

        <div class="md-form mb-3">
        &nbsp;&nbsp;<i class="fa fa-envelope text-white"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-email" class="text-white">Your email</label>
          <input type="email" name="email" id="orangeForm-email" class="form-control validate" autocomplete="off" required>
          
        </div>

        <div class="md-form mb-3">
        &nbsp;&nbsp;<i class="fa fa-key text-white "></i>
          <label data-error="wrong" data-success="right" for="orangeForm-pass" class="text-white">Your password</label>
          <input type="password" name="password" id="orangeForm-pass" class="form-control validate" autocomplete="off" required>
        </div>

        
      
        
      </div>
      <div class="modal-footer d-flex justify-content-center">
    
        <button  type="submit" name="submit" class="btn btn-deep-orange mb-3 btn-success mb-5"style="width:100px;border-radius:50px;box-shadow:0px 0px 5px black;">Submit</button>
        
         
        
      </div>
      </form>
    </div>
  </div>
</div>



  <!-- Footer -->
  <!-- javascript links -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <script>
    $(window).scroll(function() {
      $('nav').toggleClass('scrolled', $(this).scrollTop() > 300);
    });
  </script>


</body>

</html>