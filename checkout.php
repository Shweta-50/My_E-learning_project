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


<?php

if (!isset($_SESSION['is_login'])) {
  $stuEmail =  $_SESSION['stud_email'];
  echo "<script>alert('please login first')
    location.href='index.php';
     </script>";
} else {

  header("Pragma: no-cache");
  header("Cache-Control: no-cache");
  header("Expires: 0");
  $stuEmail =  $_SESSION['stud_email'];
  $c_id =  $_SESSION['course_id'];


?>







  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <meta name="GENERATOR" content="Evrsoft First Page">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- GoogleFont -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 mt-5 offset-sm-3 jumbotron">
          <h4 class="mb-5 text-center">Welcome to Tech-Learning Payment Page.</h4>
          <form method="POST" action="success.php">
            <div class="form-group row">
              <label for="ORDER_ID" class="col-sm-4 col-form-label">ORDER_ID</label>
              <div class="col-sm-8">
                <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000, 99999999) ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="CUST_ID" class="col-sm-4 col-form-label">Student Email</label>
              <div class="col-sm-8">
                <input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php if (isset($stuEmail)) {echo $stuEmail;} ?>" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
              <div class="col-sm-8">
                <input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" class="form-control" id="TXN-AMOUNT" value="<?php
                                                                                                                                  if (isset($_POST['price'])) {
                                                                                                                                    echo $_POST['price'];
                                                                                                                                  }
                                                                                                                                  ?>" readonly>
              </div>
            </div>
            <div class="text-center mb-5">
              <input value="Checkout" type="submit" class="btn btn-primary" name="submitCheckOut" onclick="">
              <a href="all_courses.php" class="btn btn-secondary">Cancel</a>
            </div>
          </form>
          <center><small class="alert text-muted  alert-warning  mt-5">Note: Complete Payment by Clicking Checkout Button</small></center>

        </div>
      </div>
    </div>

  </body>

  </html>
<?php
}
?>