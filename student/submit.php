<?php
session_start();
$exam = new Examination;
$exam->user_session_private();
include('../include/db.php');
require_once '../include/db.php';

$_SESSION['start'] = 1;
header("location:enroll_exam.php");


if(isset($_REQUEST['del']))
{
	$userid=intval($_GET['del']);
	$sql= "DELETE FROM feedback_table WHERE f_id = '$userid';";
	$result = mysqli_query($db, $sql);


}


?>
