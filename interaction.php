<?php
include ("database/connect.php");
session_start();
if (!isset($_SESSION['USER_ID'])) 
{
	header("location:login.php");
	die();
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="css\header.css">
<style>
  
  .top{
    margin-left: 40px;
    margin-top: 20px;
  }


</style>

</head>
<body>
  
<?php 
$user = $_SESSION['UNSER_NAME'];
$query = mysqli_query($con,"SELECT * FROM fcprofile WHERE email = '$user'");
$row =mysqli_fetch_array($query);
$id = $row['email'];

$query1 = mysqli_query($con,"SELECT * FROM fcprofile WHERE email = '$id'");
$result = mysqli_num_rows($query1);

     $row =  mysqli_fetch_array($query1)
     ?>
    <!-- Image and text -->

<nav class=" navbar navbar-expand-lg navbar-light bg-secondary text-white">
<a class="navbar-brand" href="#">
    <img src="images/ptu.jpg" width="50" height="50" class="d-inline-block align-top" alt="">
  </a>
  <h4 class="two" href="#">Interaction</h4>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="position-absolute top-10 end-0 " id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active ">
        <a class="nav-link text-white" href="fcprofile.php">Home</a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link text-white" href="fcprofile.php">Insert</a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link text-white" href="fcprofile.php">Update</a>
      </li>
      <a href="database/logout.php" class="btn btn-light" type="submit">Logout</a>
    </ul>
  </div>
</nav> 
<div class="top">
     <h3 ><?php echo $row['name'];?></h3>
            <span>Associate Professor</span>             
            </div>     
</body>
</html>