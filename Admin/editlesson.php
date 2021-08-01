<?php

if(!isset($_SESSION)){
    session_start();
}

include('../Admin/header.php');
include('../dbcon.php');
// authentication code
if(isset($_SESSION['is_admin_login'])){
    $email = $_SESSION['email'];
 } else {
    echo "<script> location.href='../index.php'</script>";
 }


// Update
if(isset($_REQUEST['requpdate'])){
    // checking empty files
    if(($_REQUEST['lesson_id'] == "") || ($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "")){
        // msg displayed if required field missing
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" mx-auto role="alert">Fill All Fields </div>';

    }else{
        //Assigning User Values to Variable
       
        $lid = $_REQUEST['lesson_id'];
        $lname = $_REQUEST['lesson_name'];
        $ldesc = $_REQUEST['lesson_desc'];
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $lesson_link = $_FILES['lesson_data']['name'];
        $lesson_link_temp = $_FILES['lesson_data']['tmp_name'];
        $link_folder = '../lessonvid/'.$lesson_link;
        move_uploaded_file($lesson_link_temp,$link_folder);

            $sql = "UPDATE lesson SET lesson_id = '$lid', lesson_name = '$lname', lesson_desc = '$ldesc', lesson_link = '$link_folder', course_id = '$cid',course_name = '$cname' WHERE lesson_id = '$lid' ";
                if($con->query($sql) == TRUE){
                    // below msg display on form submit success
                    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2 text-center mx-auto">Course Updated Successfully</div>'; 
                }else{
                    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2 text-center mx-auto">Course Unable to Update</div>';
                }

    }

} 













?>

<div class="col-sm-6 mt-2 mx-3 jumbotron">
    <h3 class="text-center">&nbsp; Update Lesson Details</h3>
        <?php
            if(isset($_REQUEST['view'])){
                $sql = "SELECT * FROM lesson WHERE lesson_id = {$_REQUEST['id']}";

                $result = $con->query($sql);
                $row =   $result->fetch_assoc();

            }

        ?>



    <form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <lable for="lesson_id">&nbsp; Lesson ID</lable>
        <input type="text" class="form-control" id="lesson_id" name="lesson_id" value ="<?php if(isset($row['lesson_id'])) {echo $row['lesson_id']; } ?>" readonly >
    </div>

    <div class="form-group">
        <lable for="lesson_name">&nbsp; Lesson Name</lable>
        <input type="text" class="form-control" id="lesson_name" name="lesson_name" value ="<?php if(isset($row['lesson_name'])) {echo $row['lesson_name']; } ?>" >
    </div>

    <div class="form-group">
        <lable for="lesson_desc">&nbsp; Lesson Description</lable>
        <textarea class="form-control" id="lesson_desc" name="lesson_desc" row=2 ><?php if(isset($row['lesson_desc'])) {echo $row['lesson_desc']; } ?></textarea>
    </div>

    

    <div class="form-group">
        <lable for="course_id">&nbsp; Course ID </lable>
        <input type="text" class="form-control" id="course_id" name="course_id" value ="<?php if(isset($row['course_id'])) {echo $row['course_id']; } ?>">
    </div>

    <div class="form-group">
        <lable for="course_name">&nbsp; Course Name</lable>
        <input type="text" class="form-control" id="course_name" name="course_name" onkeypress="isInputNumber(event)"
        value ="<?php if(isset($row['course_name'])) {echo $row['course_name']; } ?>" readonly>
    </div>

    <div class="form-group">
        <lable for="lesson-link">&nbsp; Lesson Link </lable>
        <div class="embed-responsive embed-responsive-16by9">
       
        <video width = "500" height = "300" controls>
         <source src = "<?php if(isset($row['lesson_link'])) {echo $row['lesson_link'];} ?>" type = "video/mp4">
         This browser doesn't support video tag.
      </video>

        </div>
        <input type="file" class="form-control-file mt-5" id="lesson-link" name="lesson_data" required>
    </div>

    

    <div class="text-center">
        <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate"> Update</button> <a href="lesson.php" class=" btn btn-secondary">Close</a>
    </div>
 <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>














<?php
include('../Admin/footer.php');
?>
