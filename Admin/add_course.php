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


if(isset($_REQUEST['courseSubmitBtn'])){
    // checking for Empty Fields
    if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "")
    || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_original_price'] == "") || ($_REQUEST['course_price'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 text-center"> Please Fill All Fields</div>';

    }else{

        $course_name = $_POST['course_name'];
        $course_desc = $_POST['course_desc'];
        $course_author = $_POST['course_author'];
        $course_duration = $_POST['course_duration'];
        $course_price = $_POST['course_price'];
        $course_original_price = $_POST['course_original_price'];
        $course_image = $_FILES['course_img']['name'];
        $course_image_temp = $_FILES['course_img']['tmp_name'];
        $img_folder = '../images/courseimg/'.$course_image;
        move_uploaded_file($course_image_temp,$img_folder);

        // $sql = "INSERT INTO course (C_Name,C_desk,C_author,C_img,C_duration,C_price,C_original_price)
        // VALUES('$course_name','$course_desc','$course_author','$img_folder','$course_duration','$course_price','$course_original_price')";

        $sql = "INSERT INTO course ( C_Name, C_desk, C_author,C_img,C_duration,C_price,C_original_price) VALUES ('$course_name','$course_desc',' $course_author','$img_folder','$course_duration',' $course_price','$course_original_price')";

           
           
    if($con->query($sql) == TRUE){

        $msg = '<div class="alert alert-success col-sm-8  mt-2 text-center">Feedback Added Successfully</div>';
  
  }else{
    $msg = '<div class="alert alert-danger col-sm-6  mt-2 text-center">Unable to Add Feedback </div>';
      
  }



    }

}







?>
<div class="col-sm-6 mt-2 mx-3 jumbotron">
    <h3 class="text-center">&nbsp; Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <lable for="course_name">&nbsp; Course Name</lable>
        <input autocomplete="off" required type="text" class="form-control" id="course_name" name="course_name">
    </div>

    <div class="form-group">
        <lable for="course_name">&nbsp; Course Description</lable>
        <textarea class="form-control" id="course_desc" name="course_desc" row=2 ></textarea>
    </div>

    <div class="form-group">
        <lable for="course_name">&nbsp; Author</lable>
        <input autocomplete="off" required type="text" class="form-control" id="course_author" name="course_author">
    </div>

    <div class="form-group">
        <lable for="course_name">&nbsp; Course Duration</lable>
        <input autocomplete="off" required type="text" class="form-control" id="course_duration" name="course_duration">
    </div>

    <div class="form-group">
        <lable for="course_name">&nbsp; Course Original Price</lable>
        <input autocomplete="off" required type="text" class="form-control" id="course_original_price" name="course_original_price">
    </div>

    <div class="form-group">
        <lable for="course_name">&nbsp; Course Selling Price</lable>
        <input autocomplete="off" required type="text" class="form-control" id="course_price" name="course_price">
    </div>

    <div class="form-group">
        <lable for="course_name">&nbsp; Course Images</lable>
        <input autocomplete="off" required type="file" class="form-control-file" id="course_img" name="course_img">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn"> Submit</button> <a href="courses.php" class=" btn btn-secondary">Close</a>
    </div>
 <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>
 






<?php
 include('../Admin/footer.php');
?> 