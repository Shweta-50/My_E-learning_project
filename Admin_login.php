<?php
include 'dbcon.php';
 session_start();


if(isset($_POST['admin'])){
    $email = $_POST['mail'];
    $password  = $_POST['password'];
    $_SESSION['email']= $email;

    $query = "SELECT * FROM admin WHERE Email='$email' && Password='$password'";
    $sql = mysqli_query($con,$query);
    $data = mysqli_num_rows($sql);
    // $arr = mysqli_fetch_assoc($data);
    
    if($data == 1){
        $_SESSION['is_admin_login'] = true;
        $_SESSION['email']= $email;
        header('location:Admin/dashboard.php');
    }else{
        $error ="<script>alert('Your password is inncorrect')</script>";
        $_SESSION['error'] = $error;
        header('location:index.php');
    }
    }


?>