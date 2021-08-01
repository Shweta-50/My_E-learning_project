<style>
    table{
        text-align:center!important;

    }
        .table td,
.table th {
    padding: 15px 1.53rem !important;;
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
<div class="col-sm-8 mt-5  mx-auto">
    <form action="" method="POST" class="d-print-none">
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="date" name="startdate" id="startdate" class="form-control">
            </div>
            <span class="mr-2 my-2 text-center"> to </span>
            <div class="form-group col-md-4">
                <input type="date" name="enddate" id="enddate" class="form-control">
            </div>
            
            <div class="form-group col-md-2">
                <input type="submit" name="searchsubmit"  class="btn btn-primary" value="Search">
            </div>
        </div>
       
     
  
    </form>
    <?php if(isset($_REQUEST['searchsubmit'])){
        $startdate = $_REQUEST['startdate'];
        $enddate = $_REQUEST['enddate'];
        $sql = "SELECT * FROM courseorder WHERE order_date BETWEEN '$startdate' AND '$enddate' ";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            echo' 
            <h4 class="bg-dark text-white py-3 text-center mt-4">Details</h4>
            <table class="table table-responsive shadow">
            <thead>
            <tr class="bg-primary">
            <th scope="col">Order ID</th>
            <th scope="col">Course ID</th>
            <th scope="col">Student Email</th>
            <th scope="col">Payment Status </th>
            <th scope="col">Order Date </th>
            <th scope="col">Amount</th>
            </tr>
            <thead>
            </tbody>';

            while($row = $result->fetch_assoc()){
                echo '<tr>
                <th scope="row">'.$row["order_id"].'</th>
                <td>'.$row["course_id"].'</td>
                <td>'.$row["stu_email"].'</td>
                <td>'.$row["status"].'</td>
                <td>'.$row["order_date"].'</td>
                <td>'.$row["amount"].'</td>
                </tr>';
            }
            echo '
            </tbody>
            </table> ';
        }else{
            echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2 role="alert">
            No Record Found ! ☹️
            ';
        }


    }
    
    
    
    ?>
</div>
</div>
</div>
</div>
</div>

<?php
include('../Admin/footer.php');
?>