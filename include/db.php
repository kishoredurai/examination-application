<?php
$db = mysqli_connect('localhost', 'root', '', 'online_examination');
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=calendar;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>


