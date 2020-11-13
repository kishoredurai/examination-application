<!--// source code modified by jacksonsilass@gmail.com +255 763169695 from weblessons -->
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Online Examination System in PHP</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="style1/bootstrap.min.css">
    <link rel="stylesheet" href="style1/dataTables.bootstrap4.min.css">
  	<script src="style1/jquery.min.js"></script>
  	<script src="style1/parsley.js"></script>
  	<script src="style1/popper.min.js"></script>
  	<script src="style1/bootstrap.min.js"></script>
    <script src="style1/dataTables.min.js"></script>
    <script src="style1/dataTables.bootstrap4.min.js"></script>
  	<link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/TimeCircles.css" />
    <script src="style/TimeCircles.js"></script>
    <link href="style/button.css" rel="stylesheet" type="text/css">
</head>
<body>
	<!-- <div class="jumbotron text-center" style="margin-bottom:0; padding: 1rem 1rem;background-color:white;">
        <img src="https://www.bitsathy.ac.in/assets/images/headlogo.svg" class="img-fluid" width="900" alt="Online Examination System in PHP">
       
  </div> -->

  <?php
  if(isset($_SESSION['user_id']))
  {
  ?>
  <nav class="navbar fixed-top navbar-expand-sm navbar-light" style="background-color: #fcf0ff;">
  <a class="navbar-brand" href="index.php">
    <img src="https://www.bitsathy.ac.in/assets/images/headlogo.svg" width="200" height="40" alt="">
  </a>

    <!-- <a class="navbar-brand" href="index.php"><img src="https://www.bitsathy.ac.in/assets/images/headlogo.svg" class="img-fluid" height="50"  width="200" alt="Online Examination System in PHP"></a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
    <div class="topnav">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="enroll_exam.php">Enroll Exam</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="change_password.php">Change Password</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>    
      </ul>
  
</div>
    </ul>
    <!-- <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="enroll_exam.php">Enroll Exam</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="change_password.php">Change Password</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>    
      </ul> -->

      <!-- <a class="nav-link" href="#home">Enroll Exam</a>
  <a class="nav-item" href="#news">Profile</a>
  <a href="#contact">Change Password</a>
  <a class="navbar-right" href="#contact">Logout</a> -->
    </div>  
  </nav>
<style>
 
 .topnav {
  overflow: hidden;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 10px 10px;
  text-decoration: none;
  font-size: 18px;
  border-bottom: 3px solid transparent;
}

.topnav a:hover {
  border-bottom: 3px solid red;
}

.topnav a.active {
  border-bottom: 3px solid red;
}
</style>
  <div class="container-fluid">
  <?php
  }
  ?>