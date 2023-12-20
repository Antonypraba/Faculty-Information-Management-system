<?php
SESSION_start();
include 'connect.php';
// if (isset($_POST['submit']))
//  {
//   $email = $_POST['email'];
//   $password = $_POST['password'];
//   // $rem=$_POST['remember'];
//   date_default_timezone_set('Asia/Kolkata');
//   $login_date = date("Y-m-d");
//   $login_time = date("h:i:sa");
//   $sql = "SELECT * from facultys where email = '$email' and password = '$password'";
//   $result = mysqli_query($con, $sql);
//   $row = mysqli_fetch_array($result);
//   $count =  mysqli_num_rows($result);
//
//   if ($count == 1) {
//     // $_SESSION["email"]=$email;
//     // $id=session_id();
//     // $sql="INSERT INTO `sessiontracking`(`sessionID`,`uname`, `login_date`, `login_time`, `logout_date`, `logout_time`) VALUES ('$id','$uname','$login_date','$login_time','','')";
//     // $result = mysqli_query($con);
//     header("location:http://localhost/faculty/index.php");
//
//   }
//   else {
//     echo "<SCRIPT>
//          alert('Invalid Details')
//          window.location.replace('http://localhost/faculty/login.php');
//      </SCRIPT>";
//
//   }
// }

if(isset($_POST["submit"])){
if(!empty($_POST['mail']) && !empty($_POST['pass'])) {
    $email=$_POST['mail'];
    $pass=$_POST['pass'];


    $hostname="localhost"; //local server name default localhost.
    $username="root";  //mysql username default is root.
    $password="";       //blank if no password is set for mysql.
    $database="facultys";  //database name.
    $con= new mysqli($hostname,$username,$password,$database);
    if(!$con)
    {
    die('Connection Failed');
    }
    else {
      
    $query= mysqli_query($con,"SELECT * FROM fcprofile WHERE email='$email' AND password='$pass'");

    $numrows=mysqli_num_rows($query);
    
    if($numrows!=0)
    {
    while($row=mysqli_fetch_assoc($query))
    {

   $_SESSION['USER_ID'] =$row['staff_id'];
   $_SESSION['UNSER_NAME'] =$row['email'];
   $_SESSION['FACULTY_ID'] =$row['faculty_id'];
    

    header("location:http://localhost/faculty/facultyprofile.php");
    }}
    else {
      echo '<script>';
      echo 'alert("Invalid Email or Password Try Again");';
      echo 'window.location.href = "http://localhost/faculty/login.php";';
      echo '</script>';
    }
    } 
} }else {
  echo "<SCRIPT>
          alert('All fields are requires!')
         window.location.replace('http://localhost/faculty/login.php');
       </SCRIPT>";
}

 ?>
