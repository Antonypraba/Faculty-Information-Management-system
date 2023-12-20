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
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/fcpedit.css'>
    <script src='main.js'></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//code.jquery.com/jquery-1.11.1.min.js">
        rel = "stylesheet" >
    </script>


    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="includes/footer/footer.css">
    <link rel="stylesheet" href="css/fcpedit.css">
    <style>
        .date {
            margin-left: -14px;
        }
        .content {
            margin-top: 10rem;
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

    include "includes/header5.php";
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

    <?php
    $id = $_GET["id"];
    $user = $_SESSION['UNSER_NAME'];
    $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
    $row = mysqli_fetch_array($query);
    $email = $row['email'];

    $query1 = mysqli_query($con, "SELECT * FROM consultancy WHERE consultancy_id = '$id'");
    $result = mysqli_num_rows($query1);


    if ($query1->num_rows > 0) {

        while ($row = $query1->fetch_assoc()) {



    ?>



            <div class="mainbody container-fluid">
                <form action="database\update.php" method="POST" value="">
                    <input type="int" hidden="true" name="id" value="<?php echo $row['consultancy_id']; ?>">
                    <div class="content">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="panele">
                                <div class="panel-body">
                                    <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">Edit Consultancy</h3>
                                    <br><br>
                                    <label for="name">Title of Consultancy project</label>
                                    <input type="text" class="form-control" id="First_name" placeholder="" value="<?php echo $row['Consultancy_title']; ?>" required name="Consultancy_title">
                                    <br>
                                    <label for="faculty_id">Name of faculty (Chief Consultant)</label>
                                    <input type="text" class="form-control" id="posting" value="<?php echo $row['faculty_name']; ?>" name="faculty_name">
                                    <br>
                                    <label for="faculty_id">Status</label>
                                    <input type="text" class="form-control" id="posting" value="<?php echo $row['consultancy_status']; ?>" name="consultancy_status">
                                    <br>
                                    <label for="faculty_id">Role</label>
                                    <input type="text" class="form-control" id="posting" value="<?php echo $row['consultancy_roll']; ?>" name="consultancy_roll">
                                    <br>
                                    <label for="faculty_id">Duration</label>
                                    <input type="text" class="form-control" id="posting" value="<?php echo $row['consultancy_duration']; ?>" name="consultancy_duration">
                                    <br>
                                    <div class="col-xs-3 pull-left date">
                                        <label for="email">Financial Year</label>
                                        <input type="text" name="finincial_year" value="<?php echo $row['finincial_year']; ?>" placeholder="eg: 1998" />
                                    </div>
                                    <br><br><br><br>
                                    <label for="phone">Client Organization </label>
                                    <input type="text" class="form-control" id="phone" value="<?php echo $row['client_organization']; ?>" name="client_organization">
                                    <br>
                                    <label for="aadhar">Amount received rupee (₹)</label>
                                    <input type="text" class="form-control" id="aadhar" value="<?php echo $row['recived_rupee']; ?>" name="recived_rupee">
                                    <br>
                                    <label for="aadhar">Amount received word</label>
                                    <input type="text" class="form-control" id="aadhar" value="<?php echo $row['recived_amount']; ?>" name="recived_amount">
                                    <br>
                                    <button name="consultancyupdate" type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check update"></i>Update</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
    include "includes/footer/footer.php";
    ?>
            </div>
    <?php  }
    } else {
    }
    ?>

    </div>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $(function() {
            $('[data-toggle="popover"]').popover()
        })
    </script>


    <script>
        // j Query for View scho data 

        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var inputValue = $(this).attr("value");
                $("#" + inputValue).show();
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>