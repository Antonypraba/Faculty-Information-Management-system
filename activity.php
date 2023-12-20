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
  <title>Activity</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <script src='main.js'></script>

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
      width: 80%;
      place-items: center;


    }

    .det_com {
      margin-top: 5rem;
      display: grid;
      width: 80%;
      place-items: center;

    }

    .det_con {
      display: grid;
      width: 80%;
      place-items: center;
      margin-top: 50px;
      margin-bottom: 20rem;

    }

    .det_jour {
      display: grid;
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
    <div id="interactions" class="book js-tilt">
      <img src="images/interaction.png" alt="Avatar" style="width:50% ; height:50%">
      <div class="container">
        <h4><b>Interactions</b></h4>
      </div>
    </div>

    <div id="committee" class="book js-tilt">
      <img src="images/Committee.png" alt="Avatar" style="width:50% ; height:60%">
      <div class="container">
        <h4><b>Committee</b></h4>
      </div>
    </div>

    <div id="contributions" class="book js-tilt">
      <img src="images/contribution.png" alt="Avatar" style="width:50% ; height:70%">
      <div class="container">
        <h4><b>Contributions</b></h4>
      </div>
    </div>
  </div>




  <!-- Books -->
  <?php
  $user = $_SESSION['UNSER_NAME'];
  $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
  $row = mysqli_fetch_array($query);
  $faculty_id = $row['faculty_id'];

  $query1 = mysqli_query($con, "SELECT * FROM interactions WHERE faculty_id = '$faculty_id'");
  $result = mysqli_num_rows($query1);


  if ($query1->num_rows > 0) {

    while ($row = $query1->fetch_assoc()) {



  ?>


      <div style="margin-left: 130px;" hidden="true" class="det_int">
        <div class="image-wrapper">
          <div class="panele">
            <div class="panel-body">
              <!-- <form action="database/delete.php<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> -->
              <a <?php echo 'href="interactioninsert.php?id=' . $row['interaction_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-success editbutton" type="submit">New</a>
              <a <?php echo 'href="interactionedit.php?id=' . $row['interaction_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-warning editbutton" type="submit">Edit</a>
              <!-- <input type="int" hidden="true" name="delete_action" value="deleteinteraction"> -->
              <!-- <input type="int" hidden="true" name="interaction_id" value="<?php echo $row['interaction_id']; ?>"> -->
              <button onclick="passValue('<?php echo $row['interaction_id']; ?>','deleteinteraction','interaction_id')" type="button" width="50px" style="border-radius: 30px;" class="btn btn-danger editbutton" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger editbutton" type="submit">
                Delete
              </button> </form><br>
              <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">INTERACTIONS</h3>
              <table class="table">
                <tr>
                  <td><label class="name">Details: </label></td>
                  <td> <i class="ii"><?php echo $row['interaction_details']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Interaction: </label></td>
                  <td> <i class="ii"><?php echo $row['inner_outing']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Year: </label></td>
                  <td><i class="ii"><?php echo $row['interaction_year']; ?></i></td>
                </tr>

                <br><br>
              </table>
            </div>
          </div>
        </div>
      </div>
  <?php  }
  } else {
  }
  ?>

  <!-- committee -->

  <?php
  $user = $_SESSION['UNSER_NAME'];
  $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
  $row = mysqli_fetch_array($query);
  $faculty_id = $row['faculty_id'];

  $query1 = mysqli_query($con, "SELECT * FROM committee WHERE faculty_id = '$faculty_id'");
  $result = mysqli_num_rows($query1);


  if ($query1->num_rows > 0) {

    while ($row = $query1->fetch_assoc()) {



  ?>
      <div style="margin-left: 130px;" hidden="true" class="det_com">
        <div class="image-wrapper">
          <div class="panele">
            <div class="panel-body">
              <!-- <form action="database/delete.php<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> -->
              <a <?php echo 'href="committeeinsert.php?id=' . $row['committee_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-success editbutton" type="submit">New</a>
              <a <?php echo 'href="committeeedit.php?id=' . $row['committee_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-warning editbutton" type="submit">Edit</a>
              <!-- <input type="int" hidden="true" name="delete_action" value="deletecommittee"> -->
              <!-- <input type="int" hidden="true" name="committee_id" value="<?php echo $row['committee_id']; ?>"> -->
              <button onclick="passValue('<?php echo $row['committee_id']; ?>','deletecommittee','committee_id')" type="button" width="50px" style="border-radius: 30px;" class="btn btn-danger editbutton" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger editbutton" type="submit">
                Delete
              </button> </form>
              <table class="table">
                <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">COMMITTEE</h3>
                <br>
                <tr>
                  <td><label class="name">Committee Name: </label></td>
                  <td><i class="ii"><?php echo $row['committee_name']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Year: </label></td>
                  <td> <i class="ii"><?php echo $row['committee_year']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Role: </label></td>
                  <td> <i class="ii"><?php echo $row['committee_role']; ?></i></td>
                </tr>
              </table>

            </div>
          </div>
        </div>
      </div>

  <?php  }
  } else {
  }
  ?>
  <!-- patent -->

  <?php
  $user = $_SESSION['UNSER_NAME'];
  $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
  $row = mysqli_fetch_array($query);
  $faculty_id = $row['faculty_id'];

  $query1 = mysqli_query($con, "SELECT * FROM contributions WHERE faculty_id = '$faculty_id'");
  $result = mysqli_num_rows($query1);



  if ($query1->num_rows > 0) {

    while ($row = $query1->fetch_assoc()) {



  ?>
      <div style="margin-left: 130px;" hidden="true" class="det_con">
        <div class="image-wrapper">
          <div class="panele">
            <div class="panel-body">
              <!-- <form action="database/delete.php<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> -->
              <!-- <a <?php echo 'href="contributioninsert.php?id=' . $row['contribution_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-success editbutton" type="submit">Insert</a> -->
              <a <?php echo 'href="contributionedit.php?id=' . $row['contribution_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-warning editbutton" type="submit">Edit</a>
              <!-- <input type="int" hidden="true" name="delete_action" value="deletepatent"> -->
              <!-- <input type="int" hidden="true" name="patent_id" value="<?php echo $row['patent_id']; ?>"> -->
              <button onclick="passValue('<?php echo $row['contribution_id']; ?>','deletecontribution','contribution_id')" type="button" width="50px" style="border-radius: 30px;" class="btn btn-danger editbutton" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger editbutton" type="submit">
                Delete
              </button> </form>
              <table class="table">

                <ul id="pointList">


                </ul>
                <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">CONTRIBUTIONS</h3>

                <tr>
                  <td> <label class="name">Name</label></td>
                  <td>:</td>
                  <td> <i class="ii"><?php echo $row['faculty_name']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Interaction with Outside World</label></td>
                  <td>:</td>
                  <td> <i class="ii"><?php echo $row['interaction_with_outside_world']; ?> </i></td>  
                </tr>
                <tr>
                  <td> <label class="name">Year</label></td>
                  <td>:</td>
                  <td> <i class="ii"><?php echo $row['year']; ?> </i></td>  
                </tr>
                <br><br>
              </table>
            </div>
          </div>
        </div>
      </div>

  <?php  }
  } else {
  }
  ?>


  <?php

  include "includes/footer/footer.php";

  ?>



  <!--delete Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Data ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are You sure you want to delete this ?
        </div>
        <div class="modal-footer">
          <form action="database/delete.php<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" hidden id="inputField2" name="delete_action" value="">
            <input type="text" hidden name="" value="" id="inputField">
            <button name="deletebook" class="btn btn-danger" type="submit"> Yes Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    function passValue(value, value2, value3) {
      var input = document.getElementById('inputField');
      var input2 = document.getElementById('inputField2');
      var input3 = document.getElementById('inputField');
      input.value = value;
      input2.value = value2;
      input3.name = value3;
    }
  </script>


  <script>
    $(document).ready(function() {
      $('#interactions').click(function() {

        $('.det_int').toggle();
      });
      $('#interactions').click(function() {

        $('#committee').toggle();
        $('#contributions').toggle();


      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#committee').click(function() {

        $('.det_com').toggle();
      });
      $('#committee').click(function() {

        $('#interactions').toggle();
        $('#contributions').toggle();


      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#contributions').click(function() {

        $('.det_con').toggle();
      });
      $('#contributions').click(function() {

        $('#committee').toggle();
        $('#interactions').toggle();


      });
    });
  </script>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>