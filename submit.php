<?php
session_start();
$_SESSION['start'] = 1;
header("location:enroll_exam.php");
?>