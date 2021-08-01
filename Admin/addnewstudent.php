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


if(isset($_REQUEST['newStuSubmmitBtn'])){
    // checking for Empty Fields
    if(($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "")
    || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_occ'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 text-center"> Please Fill All Fields</div>';

    }else{

        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_pass = $_REQUEST['stu_pass'];
        $stu_occ = $_REQUEST['stu_occ'];
        

        $sql = "INSERT INTO student(stu_name,stu_email,stu_pass,stu_occ) VALUES('$stu_name','$stu_email','$stu_pass','$stu_occ')";

        $iquery = mysqli_query($con,$sql);

    if($iquery){

        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2 text-center">Student Added Successfully</div>';
  
  }else{
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2 text-center">Unable to Add Student </div>';
      
  }

    }







}







?>
<div class="col-sm-6 mt-2 mx-3 jumbotron">
    <h3 class="text-center">&nbsp; Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <lable for="stu_name">&nbsp; Name</lable>
        <input autocomplete="off" required type="text" class="form-control" id="stu_name" name="stu_name">
    </div>

    <div class="form-group">
        <lable for="stu_email">&nbsp; Email</lable>
        <input autocomplete="off" required type="text" class="form-control" id="stu_email" name="stu_email">
    </div>

    

    <div class="form-group">
        <lable for="stu_name">&nbsp; Password</lable>
        <input autocomplete="off" required type="text" class="form-control" id="stu_pass" name="stu_pass">
    </div>

    <div class="form-group">
        <lable for="stu_name">&nbsp; Occupation</lable>
        <input autocomplete="off" required type="text" class="form-control" id="stu_occ" name="stu_occ">
    </div>




    <div class="text-center">
        <button type="submit" class="btn btn-danger" id="newStuSubmmitBtn" name="newStuSubmmitBtn"> Submit</button> <a href="student.php" class=" btn btn-secondary">Close</a>
    </div>
 <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>
 






<?php
 include('../Admin/footer.php');
?> 