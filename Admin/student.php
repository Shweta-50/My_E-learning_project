
<style>
    table{
        text-align:center!important;

    }
        .table td,
.table th {
    padding: 15px 4.65rem !important;
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
    <div class="col-lg-9 col-sm-11 mx-auto ">
    <div class=" mt-5 text-center ">
    <!-- Table  -->
    <p class="bg-dark text-white p-2">List of Students</p>
    <?php
    $sql = "SELECT * FROM student";
    $result = $con->query($sql);
    if($result->num_rows >0){
    ?>

    <table class="table table-responsive table-striped table-hover shadow"  >
    <thead>
    <tr class="bg-primary">
     
    <th scope="col">Student ID</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
   <?php while($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<th scope="row">'.$row['stu_id'].'</th>';
          echo '<td>'.$row['stu_name'].'</td>';
          echo '<td>'.$row['stu_email'].'</td>';
        echo '<td>';
        echo '
        <form action="editstudent.php" method="POST" class="d-inline" >
        <input type="hidden" name="id" value='.$row["stu_id"].'>
        <button type="submit" class="btn btn-info mr-3 " name="view" value="view"><i class="fa fa-edit"></i></button>
        </form>
    
        <form action="" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["stu_id"].'>
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
        $sql = "DELETE FROM student WHERE stu_id = {$_REQUEST['id']}";
            if($con->query($sql) == TRUE){
                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
            }else{
                echo"<script>alert('Unable to Delete Data')</script>";
            }
    }


    ?>
    </div>
    </div>
    <!-- div row close from header -->
    <!-- plus btn for adding new users bottom right -->
    <div>
    <a class="btn btn-danger box" href="../Admin/addnewstudent.php"><i class="fa fa-plus fa-2x"></i></a>
    </div>

</div>

<?php
include('../Admin/footer.php');
?>



