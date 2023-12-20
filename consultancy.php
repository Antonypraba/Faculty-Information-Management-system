<?php
include("database/connect.php");
session_start();
if (!isset($_SESSION['USER_ID'])) {
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

  <link rel="stylesheet" href="includes/footer/footer.css">
  <link rel="stylesheet" href="css/scholers.css">
  <link rel="stylesheet" href="css/nodata.css">

  <style>
    .top {
      margin-left: 40px;
      margin-top: 65px;
    }

    .ii {
      font-size: 15px;
      font-style: normal;
      margin-right: 200px;
    }

    .name {
      margin-left: 20px;
      font-size: 15px;
    }

    .blockquote-custom {
      margin-top: -200px;
      position: relative;
      font-size: 1.3rem;
      width: 600px;
      height: 100px;
      margin-left: 150px;
      border-radius: 1.25rem;
      box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.775);
    }

    .blockquote-custom-icon {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      top: 400px;
      left: 19px;
    }

    .content {
      margin-top: 40px;
      margin-bottom: 50px;
    }

    .click {
      font-size: 18px;
      margin-left: 10px;
      text-decoration: underline;
    }

    p {
      font-size: 20px;
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

  </style>

</head>

<body>

  <?php
  $user = $_SESSION['UNSER_NAME'];
  $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
  $row = mysqli_fetch_array($query);
  $id = $row['email'];

  $query1 = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$id'");
  $result = mysqli_num_rows($query1);

  $row =  mysqli_fetch_array($query1)
  ?>

  <!-- Image and text -->
  <?php
  include "includes/header5.php";
  ?>

  <div class="top">
    <h3><?php echo $row['name']; ?></h3>
    <span>Project Details</span>
  </div>



  <?php
  $user = $_SESSION['UNSER_NAME'];
  $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
  $row = mysqli_fetch_array($query);
  $faculty_id = $row['faculty_id'];

  $query1 = mysqli_query($con, "SELECT * FROM consultancy WHERE faculty_id = '$faculty_id'");
  $result = mysqli_num_rows($query1);


  if ($query1->num_rows > 0) {

    while ($row = $query1->fetch_assoc()) {



  ?>
      <input type="text" hidden="true" name="id" value="<?php echo $row['faculty_id']; ?>">
      <div class="content">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
          <div class="panele">
            <div class="panel-body">
              <a <?php echo 'href="consultancyinsert.php?id=' . $row['consultancy_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-success editbutton" type="submit">New</a>
              <a <?php echo 'href="consultancyedit.php?id=' . $row['consultancy_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-warning editbutton" type="submit">Edit</a>
              <!-- <form action="database/delete.php<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> -->
                <!-- <input type="int" hidden="true" name="delete_action" value="deleteconsultancy"> -->
                <!-- <input type="int" hidden="true" name="consultancy_id" value="<?php echo $row['consultancy_id']; ?>"> -->
 <button onclick="passValue('<?php echo $row['consultancy_id']; ?>','deleteconsultancy','consultancy_id')" type="button" width="50px" style="border-radius: 30px;" class="btn btn-danger editbutton" data-toggle="modal" data-target="#exampleModal">
                Delete
              </button>                 </form>

              <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">Consultancy</h3>
              <table class="table">
                <br>
                <tr>
                  <td> <label class="name">	Title of Consultancy  project </label></td>
                  <td> <i class="ii"><?php echo $row['Consultancy_title']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">	Name of faculty (Chief Consultant) </label></td>
                  <td> <i class="ii"><?php echo $row['faculty_name']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">	Status </label></td>
                  <td> <i class="ii"><?php echo $row['consultancy_status']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name"> Role </label></td>
                  <td> <i class="ii"><?php echo $row['consultancy_roll']; ?></i></td>
                </tr>
                <tr> 
                  <td> <label class="name"> Duration </label></td>
                  <td> <i class="ii"><?php echo $row['consultancy_duration']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Financial Year: </label></td>
                  <td> <i class="ii"><?php echo $row['finincial_year']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Client Organization </label></td>
                  <td> <i class="ii"><?php echo $row['client_organization']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Amount received rupee (₹)</label></td>
                  <td> <i class="ii">₹ -  <?php echo $row['recived_rupee']; ?> </i></td>
                </tr>
                <tr>
                  <td> <label class="name">Amount received word</label></td>
                  <td> <i class="ii"><?php echo $row['recived_amount']; ?></i></td>
                </tr>
                <br>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
  <?php  }
  } else {
    echo '<div class="container-fluidd text-center">
   <!-- -->
    <div class="row">
     <div class="col-xs-12 col-sm-6 col-sm-offset-3">
       <div class="new-message-box">
                     <div class="new-message-box-warning">
                         <div class="info-tab tip-icon-warning" title="error"><i></i></div>
                         <div class="tip-box-warning">
                             <!--<p><strong>Tip:</strong> If you want to enable the fading transition effect while closing the alert boxes, apply the classes <code>.fade</code> and <code>.in</code> to them along with the contextual class.</p>-->
                             <p>There is NO consultancy data Available
                             <a class="click" href="consultancyinsert.php" class="btn btn-sm" href="555">Click to Add</a></p>
                         </div>
                     </div>
                 </div>
                </div>
            </div> 
        </div>
  
  
              ';
  }
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <?php

  include "includes/footer/footer.php";

  ?>
</body>

</html>