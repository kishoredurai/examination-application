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
</head>
<body>
	<div class="jumbotron text-center" style="margin-bottom:0; padding: 1rem 1rem;">
    <!-- <img src="data:image/png;base64,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" class="img-fluid" width="300" alt="Online Examination System in PHP" /> -->
    <img src="logo.png" class="img-fluid" width="300" alt="Online Examination System in PHP">
  </div>

  <?php
  if(isset($_SESSION['user_id']))
  {
  ?>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="index.php">User Side</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
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
  </nav>

  <div class="container-fluid">
  <?php
  }
  ?>