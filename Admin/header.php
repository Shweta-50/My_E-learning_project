
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechLearning</title>
    <!-- Customcss -->
    <!-- <link rel="stylesheet" href="css/style.css">   -->
    <link rel="stylesheet" href="admin_css/admin_style.css">  
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- GoogleFont -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">

<style>
  .scrolled {
      background-color: rgba(0, 0, 0, 0.4) !important;

    }
    ul li .nav-link{
        color: white !important;
        margin:0 0.8rem;
        line-height:2.2;
        transition: 0.2s linear all;
        letter-spacing:1.3px;
    }
    ul li .nav-link:hover{
        border-bottom:2px solid white;
        color:#0396F3 !important;   
        transform: scale(1.1,1.1);
         }
</style>

</head> 
<body>
<!-- Navigationbar -->

  <div class="container-fluid header p-2">
    <a class="navbar-brand text-white ml-3" href="../index.php"><h3>TechLearning</h3></a>
    <span class="navbar-text text-white mr-auto mx-3 ">Learn and Implement</span>
  </div>

<!-- End Navigationbar -->
<div class="row dashboard_row ">
<div class="col-lg-2 first col-sm-11 "style=" height:auto;background-image: linear-gradient( 94.3deg,  rgba(26,33,64,1) 10.9%, rgba(81,84,115,1) 87.1% );
    ">
    <nav class="navbar navbar-light py-4 px-1" >
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link text-primary active" href="dashboard.php"><i class="fa fa-tachometer"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="courses.php"><i class="fa fa-book"></i> Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="lesson.php"> <i class="fa fa-book"></i> Lessons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="student.php"> <i class="fa fa-user"></i> Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="sellReport.php"><i class="fa fa-table"></i> Sells Report</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-primary" href="feedback.php"><i class="fa fa-comments"></i> Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="adminChangePass.php"> <i class="fa fa-key" ></i>Change Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="admin_logout.php"> <i class="fa fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </nav>
    </div>