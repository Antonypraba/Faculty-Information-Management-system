<?php
SESSION_start();
include 'connect.php';


if(isset($_POST["submit"])){
if(!empty($_POST['mail']) && !empty($_POST['pass'])) {
    $email=$_POST['mail'];
    $pass=$_POST['pass'];


    $hostname="localhost"; //local server name default localhost.
    $username="root";  //mysql username default is root.
    $password="";       //blank if no password is set for mysql.
    $database="faculty";  //database name.
    $con= new mysqli($hostname,$username,$password,"facultys");
    if(!$con)
    {
    die('Connection Failed');
    }else {
      
    
    
    $query= mysqli_query($con,"SELECT * FROM admin WHERE email='".$email."' && password='".$pass."'");
    $numrows=mysqli_num_rows($query);

    if($numrows!=0)
    {
    while($row=mysqli_fetch_assoc($query))
    {


   $_SESSION['EMAIL'] =$row['email'];

    

    header("location:http://localhost/faculty/admin/index.php");
    }}
     else {
      echo '<script>';
      echo 'alert("Invalid Email or Password Try Again");';
      echo 'window.location.href = "http://localhost/faculty/admin/login.php";';
      echo '</script>';
    }}

}} else {
  echo "<SCRIPT>
          alert('All fields are requires!')
         window.location.replace('http://localhost/faculty/admin/login.php');
       </SCRIPT>";
}

 ?>
