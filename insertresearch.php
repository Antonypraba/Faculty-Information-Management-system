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
    <link rel='stylesheet' type='text/css' media='screen' href='css/fcpedit.css'>
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

        .det_bok {
            display: grid;
            height: 100vh;
            width: 80%;
            place-items: center;


        }

        .det_conf {
            display: grid;
            height: 100vh;
            width: 80%;
            place-items: center;

        }

        .det_pat {
            display: grid;
            height: 100vh;
            width: 80%;
            place-items: center;
            margin-top: 50px;

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
            margin: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 23%;
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
            margin-top: 25rem;
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
    </style>
     <script>
    function handleClick1(id) {
      window.location.href = 'bookinsert.php?id=' + id;
    }
  </script>
       <script>
    function handleClick2(id) {
      window.location.href = 'conferenceinsert.php?id=' + id;
    }
  </script>
       <script>
    function handleClick3(id) {
      window.location.href = 'patentinsert.php?id=' + id;
    }
  </script>
       <script>
    function handleClick4(id) {
      window.location.href = 'journalinsert.php?id=' + id;
    }
  </script>
</head>

<body>
    <?php
    include "includes/header3.php";
    ?>

  
    <div class="top">
        <h3>ADD RESEARCH</h3>
        <span>Insert data</span>
    </div>

    <div  class="researchcards">
    <?php
    $user = $_SESSION['UNSER_NAME'];
    $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
    $row = mysqli_fetch_array($query);
    $faculty_id = $row['faculty_id'];

 
    
    
    
      ?>
    
        <div  onclick="handleClick1(<?php echo' '. $row['faculty_id'] . '';?>)" id="book" class="book js-tilt">
            <img src="images/books.png" alt="Avatar" style="width:50% ; height:50%">
            <div class="container">
                <h4><b>Add Book's </b></h4>
            </div>
        </div>
       
<?php
    $user = $_SESSION['UNSER_NAME'];
    $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
    $row = mysqli_fetch_array($query);
    $faculty_id = $row['faculty_id'];

    
    
      ?>
        <div onclick="handleClick2(<?php echo' '. $row['faculty_id'] . '';?>)" id="conference" style="margin-left: 40px;" class="book js-tilt">
            <img src="images/conference.png" alt="Avatar" style="width:50% ; height:50%">
            <div class="container">
                <h4><b>Add Conference</b></h4>
            </div>
        </div>
 
 
    </div>
    
    
    <div class="researchcards">
    <?php
    $user = $_SESSION['UNSER_NAME'];
    $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
    $row = mysqli_fetch_array($query);
    $faculty_id = $row['faculty_id'];

    
    
      ?>
        <div  onclick="handleClick3(<?php echo' '. $row['faculty_id'] . '';?>)" id="Patent" class="book js-tilt">
            <img src="images/patent.png" alt="Avatar" style="width:50% ; height:70%">
            <div class="container">
                <h4><b>Add Patent</b></h4>
            </div>
        </div>

        <?php
    $user = $_SESSION['UNSER_NAME'];
    $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
    $row = mysqli_fetch_array($query);
    $faculty_id = $row['faculty_id'];

    
    
      ?>
        <div  onclick="handleClick4(<?php echo' '. $row['faculty_id'] . '';?>)" id="Journal" style="margin-left: 40px;" class="book js-tilt">
            <img src="images/journal.png" alt="Avatar" style="width:50% ; height:50%">
            <div class="container">
                <h4><b>Add Journal</b></h4>
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