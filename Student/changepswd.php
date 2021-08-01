<?php
  if(!isset($_SESSION)){
    session_start();
}

include('./stuInclude/header.php');
include('../dbcon.php');


if(isset($_SESSION['is_login'])){
    $stuEmail =  $_SESSION['stud_email'];
    $stud_id = $_SESSION['stuId'];
}else{
    echo "<script> location.href='../index.php'; </script>";
}
    
$studEmail =   $_SESSION['stud_email'];
if(isset($_REQUEST['studPassUpdatebtn'])){
    if(($_REQUEST['studpass'] =="")){
        //msg displayed if required field missing
        // $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"></div>';
        $passmsg = '<script>alert("please Enter password")</script>';
    }else{
        $sql = "SELECT * FROM sign_up WHERE Email = '$studEmail'";
        $result = $con->query($sql);
        if($result->num_rows == 1){
            $studpass = $_REQUEST['studpass'];
            $sql = "UPDATE sign_up SET Password = '$studpass' WHERE Email = '$studEmail'";
            if($con->query($sql) == TRUE){
                //below msg display on form submit  success
                $passmsg = '<div class="alert alert-success col-sm-11  mt-2 role="alert">Update Successfully</div>';
            }else{
                //below msg display on form submit failed
                $passmsg = '<div class="alert alert-danger col-sm-11 ml-5 mt-2 role="alert"> Unable to Update</div>'; 
            }
        }
    }
}
    ?>
    
    
<div class="col-sm-9  mx-auto mt-3">
<div class="row">
    <div class="col-sm-6">
    <h4 class=" mt-3 mb-3 font-weight-bold text-primary">Change Password <i class="fa fa-key"></i></h4>
<form class=" ">
<div class="form-group">
<label for="inputEmail">Email</label>
<input type="email" class="form-control" id="inputEmail" value="<?php echo $studEmail ?>" readonly>
</div>

<div class="form-group">
<label for="inputPassword">New Password</label>
<input autocomplete="off" required type="text" class="form-control" id="inputnewpassword" placeholder="New Password" name="studpass">
</div>

<button type="submit" class="btn btn-warning shadow-sm  mr-4 mt-4 mb-3" name="studPassUpdatebtn">Update</button>
<button type="reset" class="btn btn-danger  shadow-sm mr-4 mt-4 mb-3" >Reset</button>
<?php if(isset($passmsg)){echo $passmsg;}?>

</form>
</div>


</div>
</div>







<?php
 include('../Admin/footer.php');
?> 
   

    
    
    
    
    
    
    
