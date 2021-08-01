<style>
label{
    padding: 10px;
    background:#32de84;
    display: table;
    box-shadow:0px 0px 5px black;
    color: black;
    font-weight:bolder;
     }



input[type="file"] {
    display: none;
}
</style>



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

$sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
$result = $con->query($sql);
if($result->num_rows == 1){
  $row = $result->fetch_assoc();
  $stuId = $row['stu_id'];
  $stuName = $row['stu_name'];
  $stuOcc = $row['stu_occ'];
  $stuImg = $row['stu_img'];

}

if(isset($_REQUEST['updateStuNameBtn'])){
    if(($_REQUEST['stuName'] == "" )){
        //msg display if required field missing
        $passmsg = '<div class=" alert alert-warning col-sm-6 ml-5 mt-2 role="alert">Fill All Fields</div>';
    }else{
        $stuName = $_REQUEST['stuName'];
        $stuOcc = $_REQUEST['stuOcc'];
        $stu_image = $_FILES['stuImg']['name'];
        $stu_image_tem = $_FILES['stuImg']['tmp_name'];
        $img_folder = 'stu_profile/'.$stu_image;
        move_uploaded_file($stu_image_tem,$img_folder);
        $sql = "UPDATE sign_up SET Name = '$stuName', stu_occp = '$stuOcc', stu_img = '$img_folder' WHERE Email = '$stuEmail'";
        if($con->query($sql) == TRUE){
            //below msg display on form submit success
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
        }else{
            //below msg display on form submit failed
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
        }
    }
}

?>

<div class="col-sm-6 mt-5">
   
    <form class="mx-5" action="" method="POST" enctype="multipart/form-data" >

    <div class="form-group">
        <lable for="stuId">&nbsp; Student ID </lable>
        <input autocomplete="off" required type="text" class="form-control" id="studId" name="stuId" value="<?php if(isset($stud_id)) {echo $stud_id;}?> " readonly> 
    </div>


    <div class="form-group">
        <lable for="stuEmail">&nbsp; Email</lable>
        <input autocomplete="off" required type="email" class="form-control" id="stuEmail" name="stuEmail" value="<?php echo $stuEmail;?> " readonly >
    </div>

    <div class="form-group">
        <lable for="stuName">&nbsp; Name</lable>
        <input autocomplete="off" required type="text" class="form-control" id="stuName" name="stuName" value="<?php if(isset($stuName)) {echo $stuName;}?> " >
    </div>

    <div class="form-group">
    <!-- Student doesnt mean school student it also mean learner -->
        <lable for="stuOcc">&nbsp; Occupation</lable>
        <input autocomplete="off" required type="text" class="form-control" id="stuOcc" name="stuOcc">
    </div>

    
    <label>Choose Photo <i class="fa fa-upload" aria-hidden="true"></i>
    <input autocomplete="off" required type="file" type="file" class="form-control shadow" id="stuImg" name="stuImg" >
    </label> 
    
    <div class="text-center">
        <button type="submit" class="btn btn-primary" id="updateStuNameBtn" name="updateStuNameBtn">Update</button> 
        <?php if(isset($passmsg)) {echo $passmsg;}?>
    </div>
</form>
</div>
<?php
include('./stuInclude/footer.php');
?>

