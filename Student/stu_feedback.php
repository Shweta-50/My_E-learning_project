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

$sql = "SELECT * FROM sign_up WHERE Email='$stuEmail'";
$result = $con->query($sql);
if($result->num_rows == 1){
  $row = $result->fetch_assoc();
  $stuId = $row['id'];
  

}
// authentication code
// if(isset($_SESSION['is_admin_login'])){
//     $email = $_SESSION['email'];
//  } else {
//     echo "<script> location.href='../index.php'</script>";
//  }


if(isset($_REQUEST['submitFeedbackbtn'])){
    // checking for Empty Fields
    if(($_REQUEST['f_content'] == "") ){
        $passmsg = '<div class="alert alert-warning col-sm-6  mt-2 text-center"> Please Fill All Fields</div>';

    }else{

       
        $f_content = $_POST['f_content'];
        

        $sql = "INSERT INTO feedback (f_content, stu_id) VALUES('$f_content','$stuId')";
    

       
    if($con->query($sql) == TRUE){

        $passmsg = '<div class="alert alert-success col-sm-8  mt-2 text-center">Feedback Added Successfully</div>';
  
  }else{
    $passmsg = '<div class="alert alert-danger col-sm-6  mt-2 text-center">Unable to Add Feedback </div>';
      
  }

 }
}


?>




<div class="col-sm-8 mx-auto mt-3">
    
<div class="row mx-auto">
<div class="col-sm-7">

<form class="mt-5 " method="POST">
<h4 class="  my-3 font-weight-bold text-primary">Feedback <i class="fa fa-comments"></i></h4>
<div class="form-group">
<label for="stuId">Id</label>
<input type="text" class="form-control" id="stuId" value="<?php echo  $stuId ?>" readonly>
</div>

<div class="form-group">
<label for="f_content">Write Feedback</label>
<textarea class="form-control" id="f_content" name="f_content" row=2 ></textarea>
</div>

<button type="submit" class="btn btn-primary mr-4 mb-4 " name="submitFeedbackbtn">Submit</button>

<?php if(isset($passmsg)){echo $passmsg;}?>

</form>
</div>


</div>
</div>

<?php
include('./stuInclude/footer.php');
?>
