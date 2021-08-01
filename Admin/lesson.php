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
?>
<div class="col-sm-9 mt-5 mx-auto mx-3">
<div>
<form action="" class="  form-inline d-print-none ">
<div class="form-group">
<label for="checkid ">&nbsp; Enter Course ID: </label>
<input autocomplete="off" required type="text" class="form-control mb-3 ml-2 mt-3 " id="checkid" name="checkid">
</div>
<button type="submit" class="btn btn-danger mt-3 mb-3 ml-4 ">Search</button>
</form>
</div>


<?php
$sql = "SELECT course_id FROM course";
$result = $con->query($sql);
while($row = $result->fetch_assoc()){
    if(isset($_REQUEST['checkid'])&& $_REQUEST['checkid'] == $row['course_id']){
        $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        if(($row['course_id']) == $_REQUEST['checkid']){
            $_SESSION['course_id'] = $row['course_id'];
            $_SESSION['course_name'] = $row['C_Name'];
            ?>
            <h4 class="mt-5 text-center bg-dark text-white p-2">Course ID: <?php if(isset($row['course_id'])){echo $row['course_id'];}?>
            Course Name: <?php if(isset($row['C_Name'])) {echo $row['C_Name'];}?></h4>
            <?php
            $sql = "SELECT * FROM lesson WHERE course_id = {$_REQUEST['checkid']}";
            $result = $con->query($sql);
            echo '<table class="table text-center table-responsive table-striped table-hover mx-auto shadow">
            <thead>
            <tr class="bg-primary">
             
            <th scope="col">Lesson ID</th>
            <th scope="col">Lesson Name</th>
            <th scope="col">Lesson Link</th>
            <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>';
            while($row = $result->fetch_assoc()){
                echo '<tr>';
                echo '<th scope="row">'.$row["lesson_id"].'</th>';
                echo '<td>'.$row['lesson_name'].'</td>';
                echo '<td style="width: 50% !important;">'.$row['lesson_link'].'</td>';
    
                echo '<td style=" width:12%!important;">
                <form action="editlesson.php " method="POST" class="d-inline " >
                 <input autocomplete="off" required type="hidden" name="id" value='.$row["lesson_id"].'>
                 <button type="submit" class="btn btn-info  mb-2" name="view" value="view"><i class="fa fa-edit"></i></button>
                 </form>

                <form action="" method="POST" class="d-inline">
                <input autocomplete="off" required type="hidden" name="id" value='.$row["lesson_id"].'>
                <button type="submit" class="btn btn-secondary  mb-2 " name="delete" value="Delete">   <i class="fa fa-trash"></i></button>
                </form>
                </td>
                </tr>';
                
            }
            echo '</tbody>
            </table>';
        }else{
            echo '<div class="alert-dark mt-4 role="alert"> Course Not Found !</div>';
        }  
        if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
            if($con->query($sql) === TRUE){
                //echo "Record Deleted Successfully";
                //below code will refresh the page after deleting the record
                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
            }else{
                echo "Unable to Delete Data";
            }

        }  
            
            ?>



            <?php
        }
    }

?>
</div>
<?php
if(isset($_SESSION['course_id'])){
   echo '<div>
    <a class="btn btn-danger box" href="../Admin/add_lesson.php"><i class="fa fa-plus fa-2x"></i></a>
    </div>';
}
?>

<?php
include('../Admin/footer.php');
?>