<?php
include 'connect.php';
 session_start();

setcookie("uname","",time()-3600);
setcookie("pwd","",time()-3600);
  date_default_timezone_set('Asia/Kolkata');
  $time = date("h:i:sa");
$date = date("Y-m-d");
$mail=$_SESSION['email'];

$query="UPDATE `sessiontracking` SET `logout_date`='$date',`logout_time`='$time' WHERE `uname`='$name'";
$result = mysqli_query($con, $query);
session_unset();
 if (session_destroy()) {

   header("location:http://localhost/faculty/index.php");
}
 ?>
