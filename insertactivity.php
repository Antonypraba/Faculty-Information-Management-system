<?php
include("database/connect.php");
session_start();
if (!isset($_SESSION['USER_ID'])) {
  header("location:login.php");
  die();
}

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Research</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <script src='main.js'></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

  <!------ Include the above in your HEAD tag ---------->


  <link rel="stylesheet" href="includes/footer/footer.css">
  <link rel="stylesheet" href="css/fcpedit.css">


  <style>
    .panel-body {
      margin-left: 30px;
      font-size: large;
    }

    .det_int {
      display: grid;
      margin-top: 5rem;
      height: 100vh;
      width: 80%;
      place-items: center;


    }

    .det_com {
      margin-top: 5rem;
      display: grid;
      height: 100vh;
      width: 80%;
      place-items: center;

    }

    .det_con {
      display: grid;
      height: 100vh;
      width: 80%;
      place-items: center;
      margin-top: 50px;
      margin-bottom: 20rem;

    }

    .det_jour {
      display: grid;
      height: 100vh;
      width: 80%;
      place-items: center;
      margin-top: 50px;


    }

    .section-title {
      font-size: 30px;
      text-decoration: underline;
    }

    .image-wrapper {
      text-align: left;
    }

    .top {
      margin-left: 40px;
      margin-top: 40px;
    }




    .book {
      margin: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      width: 25%;
      height: 26%;
      display: flex;
      margin-top: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.775);
      border-radius: 15px;

    }

    .book:hover {
      box-shadow: 0px 0px 30px 0px rgba(255, 75, 75, 0.775);
    }

    .book .container {
      padding: 2px 16px;
      text-align: center;
      min-width: 110px;
      line-height: 110px;
      height: 110px;
      display: flex;


    }

    .researchcards {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 3rem;

    }

    .researchcards .book {
      transition: .2s ease;
    }

    .researchcards .book:hover {
      -webkit-transform: rotateZ(-10deg);
      -ms-transform: rotateZ(-10deg);
      transform: rotateZ(-10deg);
      transition: .2s ease;
    }

    .footer-distributed {
      margin-top: 40rem;
      background: #585a5c !important;
      box-shadow: 10px 10px 10px 10px rgba(13, 0, 0, 0.12);
      box-sizing: border-box;
      width: 100%;
      height: 39%;
      border-top-right-radius: 20px;
      border-top-left-radius: 20px;
      text-align: left;
      font: bold 16px sans-serif;
      padding: 55px 50px;
      position: relative;
      left: 0;
      bottom: 0;

    }

    .top {
      margin-left: 40px;
      margin-top: 65px;
    }


    .ii {
      font-size: 15px;
      font-style: normal;
      margin-right: 180px;
    }

    #Patent {
      margin-left: 40px;
      display: flexbox;

    }

    #conference {
      overflow: visible;
    }
  </style>
   <script>
    function handleClick1(id) {
      window.location.href = 'interactioninsert.php?id=' + id;
    }
  </script>
     <script>
    function handleClick2(id) {
      window.location.href = 'committeeinsert.php?id=' + id;
    }
  </script>
     <script>
    function handleClick3(id) {
      window.location.href = 'contributioninsert.php?id=' + id;
    }
  </script>
</head>

<body>
  <?php
  include "includes/header6.php";
  ?>

  <?php
  $user = $_SESSION['UNSER_NAME'];
  $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
  $row = mysqli_fetch_array($query);
  $id = $row['email'];

  $query1 = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$id'");
  $result = mysqli_num_rows($query1);

  $row =  mysqli_fetch_array($query1)
  ?>
  <div class="top">
    <h3><?php echo $row['name']; ?></h3>
    <span>Activity</span>
  </div>

  <div class="researchcards">
    <div id="interactions" onclick="handleClick1(<?php echo' '. $row['faculty_id'] . '';?>)" class="book js-tilt">
      <img src="images/interaction.png" alt="Avatar" style="width:50% ; height:50%">
      <div class="container">
        <h4><b>Add Interactions</b></h4>
      </div>
    </div>

    <div id="committee" onclick="handleClick2(<?php echo' '. $row['faculty_id'] . '';?>)" class="book js-tilt">
      <img src="images/Committee.png" alt="Avatar" style="width:50% ; height:60%">
      <div class="container">
        <h4><b>Add Committee</b></h4>
      </div>
    </div>

    <div id="contributions" onclick="handleClick3(<?php echo' '. $row['faculty_id'] . '';?>)" class="book js-tilt">
      <img src="images/contribution.png" alt="Avatar" style="width:50% ; height:70%">
      <div class="container">
        <h4><b>Add Contributions</b></h4>
      </div>
    </div>
  </div>





  <?php

  include "includes/footer/footer.php";

  ?>






  <script src="js/research.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</body>

</html>