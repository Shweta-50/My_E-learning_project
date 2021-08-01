<style>
    .heading {
        text-align: center;
        background-color: #5cb85c;
        padding: 20px 20px;
        color: white;
        margin: 100px auto;
        width: 50%;
        font-size: 2.5rem;
        font-family: arial;
        box-shadow: 0px 0px 10px black;
    }
</style>


<?php
session_start();

include('./dbcon.php');



if (isset($_SESSION['is_login'])) {
    $stuEmail =  $_SESSION['stud_email'];
    $course_id = $_SESSION['course_id'];
} else {
    echo "<script>alert('please login first')
    location.href='index.php';
     </script>";
}


?>





<?php if (isset($_POST['submitCheckOut'])) {
    $order_id = $_POST['ORDER_ID'];
    $stuMail  = $_SESSION['stud_email'];
    $c_id = $_SESSION['course_id'];
    $course_price = $_POST['TXN_AMOUNT'];
    // $order_date = date("m-d-y");
    $status = "TXN_SUCCESS";
    $respmsg = "Txn success";
    $sql = "INSERT INTO courseorder(order_id,stu_email,course_id,status,respmsg,amount) VALUES('$order_id','$stuMail','$c_id','$status','$respmsg','$course_price')";

    if ($con->query($sql) == TRUE) {
        echo "<h4 class='heading'>Redirecting to My profile....</h4>";
        echo "<script> setTimeout(()=>{
					window.location.href = 'Student/mycourses.php';
				},1500);</script>";
    } else {
        echo "<b>Transaction status is failure</b>" . "<br/>";
    }
}

?>