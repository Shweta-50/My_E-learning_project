<?php
include 'dbcon.php';
session_start();

if(isset($_POST['login'])){
    $email = $_POST['mail'];
    $password  = $_POST['password'];
   

    $query = "SELECT * FROM sign_up WHERE Email='$email' && Password='$password'";
    $sql = mysqli_query($con,$query);
    $data = mysqli_num_rows($sql);

    

$result = mysqli_fetch_assoc($sql);
      
    
    if($data == 1){
        $_SESSION['is_login'] = true;
        $_SESSION['stud_email']= $email;
       
        
        // echo "<script> alert('login sucessfull');</script>";
        echo "<script> location.href='home.php'; </script>";
        // header('location:home.php');
    }else{
        $error ="<script>alert('Your password is inncorrect')</script>";
        $_SESSION['error'] = $error;
        echo "<script> alert('login failed')
        location.href='index.php';
        
        </script>";
        
    }
    // print_r($data['id']);
    $q = "SELECT * FROM sign_up WHERE Email='$email' ";
    $sl = mysqli_query($con,$q);
    $dta = mysqli_num_rows($sl);
    

    $result = mysqli_fetch_assoc($sl);

    $_SESSION['stuId']= $result['id'];
    // print_r($_SESSION['stuId']);

    }

    


?>