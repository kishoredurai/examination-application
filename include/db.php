<?php
$db = mysqli_connect('localhost', 'root', '', 'online_examination');
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
