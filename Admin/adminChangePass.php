<?php
if(!isset($_SESSION)){
    session_start();
}
include('header.php');
include('../dbcon.php');

if(isset($_SESSION['is_admin_login'])){
    $email = $_SESSION['email'];
 } else {
    echo "<script> location.href='../index.php'</script>";
 }

$adminEmail =  $_SESSION['email'];
if(isset($_REQUEST['adminPassUpdatebtn'])){
    if(($_REQUEST['adminPass'] =="")){
        //msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"></div>';
    }else{
        $sql = "SELECT * FROM admin WHERE Email = '$adminEmail'";
        $result = $con->query($sql);
        if($result->num_rows == 1){
            $adminPass = $_REQUEST['adminPass'];
            $sql = "UPDATE admin SET Password = '$adminPass' WHERE Email = '$adminEmail'";
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

<div class="col-sm-9 mt-2">
<div class="row">

<div class="col-sm-6">
<form class="mt-5 mx-5">
<div class="form-group">
<label for="inputEmail">Email</label>
<input autocomplete="off" required type="email" class="form-control" id="inputEmail" value="<?php echo $adminEmail ?>" readonly>
</div>

<div class="form-group">
<label for="inputPassword">New Password</label>
<input autocomplete="off" required type="text" class="form-control" id="inputnewpassword" placeholder="New Password" name="adminPass">
</div>

<button type="submit" class="btn btn-danger mr-4 mt-4 mb-2" name="adminPassUpdatebtn">Update</button>
<button type="reset" class="btn btn-secondary mr-4 mt-4 mb-2" >Reset</button>
<?php if(isset($passmsg)){echo $passmsg;}?>

</form>
</div>


</div>
</div>







<?php
 include('../Admin/footer.php');
?> 