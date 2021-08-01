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


if(isset($_REQUEST['lessonSubmitBtn'])){
    // checking for Empty Fields
    if(($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "")
    || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 text-center"> Please Fill All Fields</div>';

    }else{

        $lesson_name = $_REQUEST['lesson_name'];
        $lesson_desc = $_REQUEST['lesson_desc'];
        $course_id = $_REQUEST['course_id'];
        $course_name = $_REQUEST['course_name'];
        $lesson_link = $_FILES['lesson_link']['name'];
        $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
        $link_folder = '../lessonvid/'.$lesson_link;
        move_uploaded_file($lesson_link_temp,$link_folder);

        $sql = "INSERT INTO lesson(lesson_name,lesson_desc,lesson_link,course_id,course_name) VALUES('$lesson_name','$lesson_desc','$link_folder','$course_id','$course_name')";

        $iquery = mysqli_query($con,$sql);

    if($iquery){

        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2 text-center mx-auto">Lesson Added Successfully </div>';
  
  }else{
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2 text-center mx-auto ">Unable to Add Lesson </div>';
      
  }

    }







}







?>
<div class="col-sm-6 mt-2 mx-3 jumbotron">
    <h3 class="text-center">&nbsp; Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <lable for="course_id">&nbsp; Course ID</lable>
        <input autocomplete="off" required type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];}?>" readonly>
    </div>

    <div class="form-group">
        <lable for="lesson_name">&nbsp; Course Name</lable>
        <input autocomplete="off" required type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];}?>" readonly> 
    </div>

    <div class="form-group">
        <lable for="lesson_name">&nbsp; Lesson Name</lable>
        <input autocomplete="off" required type="text" class="form-control" id="lesson_name" name="lesson_name">
    </div>

    <div class="form-group">
        <lable for="course_name">&nbsp; Lesson Description</lable>
        <textarea class="form-control" id="lesson_desc" name="lesson_desc" row=2></textarea>
    </div>

    <div class="form-group">
        <lable for="lesson_link">&nbsp; Lesson Video Link</lable>
        <input autocomplete="off" required type="file" class="form-contro-file" id="lesson_link" name="lesson_link">
    </div>

    

    

    <div class="text-center">
        <button type="submit" class="btn btn-danger" id="lessonSubmitBtn" name="lessonSubmitBtn"> Submit</button> <a href="lesson.php" class=" btn btn-secondary">Close</a>
    </div>
 <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>
 






<?php
 include('../Admin/footer.php');
?> 