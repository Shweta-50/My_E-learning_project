<style>
    table{
        text-align:center!important;

    }
        .table td,
.table th {
    padding: 15px 0.42rem !important;
}

    </style>


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

  <!-- second coloum -->
  <div class="col-lg-9 mx-auto col-sm-11 ">
    <div class=" mt-5 text-center ">
    <!-- Table  -->
    <p class="bg-dark text-white p-2">List of Courses</p>
    <?php
    $sql = "SELECT * FROM feedback";
    $result = $con->query($sql);
    if($result->num_rows >0){
    ?>

    <table class="table table-responsive table-striped table-hovered shadow">
    <thead>
    <tr>
     
    <th scope="col">Feedback ID</th>
    <th scope="col">Content</th>
    <th scope="col">Student ID</th>
    <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
   <?php while($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<th scope="row">'.$row['f_id'].'</th>';
        echo '<td>'.$row['f_content'].'</td>';
        echo '<td>'.$row['stu_id'].'</td>';
        echo '<td>';

        echo '
        
        <form action="" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["f_id"].'>
                <button type="submit" class="btn btn-info mr-3 edit   " name="delete"       value="Delete"><i class="fa fa-trash"></i></button>
        </form>

        </td>
        </tr>';
 }?>
        </tbody>
            </table>
        <?php
    }else{echo"<script>alert('0 Result')</script>";}

    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM feedback WHERE f_id = {$_REQUEST['id']}";
            if($con->query($sql) == TRUE){
                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
            }else{
                echo"<script>alert('Unable to Delete Data')</script>";
            }
    }


    ?>
    </div>
    </div>