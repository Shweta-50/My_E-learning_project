<?php
include('../Admin/header.php');
session_start();
// authentication code
if(isset($_SESSION['is_admin_login'])){
    $email = $_SESSION['email'];
 } else {
    echo "<script> location.href='../index.php'</script>";
 }
include('../dbcon.php');

// Update
if(isset($_REQUEST['requpdate'])){
    // checking empty files
    if(($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_price'] == "") ||
    ($_REQUEST['course_original_price'] == "")){
        // msg displayed if required field missing
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mx-auto mt-2" role="alert">Fill All Fields </div>';

    }else{
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $cdesc = $_REQUEST['course_desc'];
        $cauthor = $_REQUEST['course_author'];
        $cduration = $_REQUEST['course_duration'];
        $cprice = $_REQUEST['course_price'];
        $coriginalprice = $_REQUEST['course_original_price'];
        $cimg = '../images/courseimg/'.$_FILES['course_img']['name'];

            $sql = "UPDATE course SET course_id = '$cid', C_Name = '$cname', C_desk = '$cdesc', C_author = '$cauthor',C_duration = '$cduration', C_price = '$cprice',C_original_price = '$coriginalprice',C_img = '$cimg' WHERE course_id = '$cid' ";
                if($con->query($sql) == TRUE){
                    // below msg display on form submit success
                    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2 text-center mx-auto">Course Updated Successfully</div>'; 
                }else{
                    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2 text-center mx-auto">Course Unable to Update</div>';
                }









    }

} 













?>

<div class="col-sm-6 mt-2 mx-3 jumbotron">
    <h3 class="text-center">&nbsp; Update Course Details</h3>
        <?php
            if(isset($_REQUEST['view'])){
                $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['id']}";

                $result = $con->query($sql);
                $row =   $result->fetch_assoc();

            }

        ?>



    <form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <lable for="course_id">&nbsp; Course ID</lable>
        <input type="text" class="form-control" id="course_id" name="course_id" value ="<?php if(isset($row['course_id'])) {echo $row['course_id']; } ?>" readonly >
    </div>

    <div class="form-group">
        <lable for="course_name">&nbsp; Course Name</lable>
        <input type="text" class="form-control" id="course_name" name="course_name" value ="<?php if(isset($row['C_Name'])) {echo $row['C_Name']; } ?>" >
    </div>

    <div class="form-group">
        <lable for="course_name">&nbsp; Course Description</lable>
        <textarea class="form-control" id="course_desc" name="course_desc" row=2 ><?php if(isset($row['C_desk'])) {echo $row['C_desk']; } ?></textarea>
    </div>

    <div class="form-group">
        <lable for="course_name">&nbsp; Author</lable>
        <input type="text" class="form-control" id="course_author" name="course_author" value ="<?php if(isset($row['C_author'])) {echo $row['C_author']; } ?>">
    </div>

    <div class="form-group">
        <lable for="course_name">&nbsp; Course Duration</lable>
        <input type="text" class="form-control" id="course_duration" name="course_duration" value ="<?php if(isset($row['C_dueration'])) {echo $row['C_dueration']; } ?>">
    </div>

    <div class="form-group">
        <lable for="course_name">&nbsp; Course Original Price</lable>
        <input type="text" class="form-control" id="course_original_price" name="course_original_price"
        value ="<?php if(isset($row['C_original_price'])) {echo $row['C_original_price']; } ?>">
    </div>

    <div class="form-group">
        <lable for="course_name">&nbsp; Course Selling Price</lable>
        <input type="text" class="form-control" id="course_price" name="course_price" value ="<?php if(isset($row['C_price'])) {echo $row['C_price']; } ?>">
    </div>

    <div class="form-group">
        <lable for="course_name">&nbsp; Course Images</lable>
            <img src="<?php  if(isset($row['C_img'])) {echo $row['C_img']; } ?>" alt="" class="img-thumbnail" >

        <input type="file" class="form-control-file" id="course_img" name="course_img">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate"> Update</button> <a href="courses.php" class=" btn btn-secondary">Close</a>
    </div>
 <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>














<?php
include('../Admin/footer.php');
?>
