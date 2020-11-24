<?php
session_start();
include('../include/db.php');
$_SESSION['start'] = 1;
header("location:enroll_exam.php");
?>