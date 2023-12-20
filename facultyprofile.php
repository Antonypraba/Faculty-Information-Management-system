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
  <link rel="icon" type="image/png" href="images/ptu.jpg" />
  <title>Persional Profile</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='css/fcpedit.css'>
  <link rel="stylesheet" href="css/fcprofile.css">
  <script src='main.js'></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js">
    rel = "stylesheet" >
  </script>
  <!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">

  <link rel="stylesheet" href="includes/footer/footer.css">
  <link rel="stylesheet" href="css/uploadimg.css">


  <style>
    .date {
      margin-left: -14px;
    }

    label {
      font-size: 16px;


    }

    .ii {
      font-size: 15px;
      font-style: normal;
      margin-right: 180px;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    td {
      padding: 10px;
    }


    .name {
      margin-left: 30px;

    }

    .footer-distributed {

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

  <div class="mainbody container-fluid">
    <div class="row">
      <div class="navbar-wrapper">
        <div class="container-fluid">
          <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./ORqmj" style="margin-right:-8px; margin-top:-5px;">
                  <img alt="Brand" src="images/ptu.jpg " width="30px" height="30px">
                </a>
                <a class="navbar-brand" href="facultyprofile.php">Profile</a>

              </div>
              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li><a href="scholers.php">Scholars</a></li>
                  <li><a href="research.php">Research</a></li>
                  <li><a href="project.php">Project's</a></li>
                  <li><a href="consultancy.php">Consultancy</a></li>
                  <li><a href="activity.php">Activity</a></li>
                  <!-- <li><span class="badge badge-important">2</span><a href="#"><i class="fa fa-bell-o fa-lg" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i></a></li> -->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                        <img src="images/<?php echo $row['image']; ?>" class="img-responsive img-circle" title="John Doe" alt="John Doe" width="30px" height="30px">
                      </span>
                      <span class="user-name">
                        <?php echo $row['name']; ?>
                      </span>
                      <b class="caret"></b></a>
                    <ul class="dropdown-menu" style="border-radius: 30px;  box-shadow: 0px 0px 20px 0px rgb(0, 0, 0);">
                      <li>
                        <div class="navbar-content">
                          <div class="row">
                            <div class="col-md-5">
                              <img src="images/<?php echo $row['image']; ?>" alt="Alternate Text" class="img-responsive" width="120px" height="120px" />
                          
                            </div>
                            <div class="col-md-7">
                              <span><?php echo $row['name']; ?></span>
                              <p class="text-muted small">
                                <?php echo $row['email']; ?></p>
                              <div class="divider">
                              </div>
                              <a href="./56ExR" class="btn btn-default btn-xs"><i class="fa fa-user-o" aria-hidden="true"></i> Profile</a>
                              <a href="#" class="btn btn-default btn-xs"><i class="fa fa-address-card-o" aria-hidden="true"></i> Contacts</a>
                              <a href="#" class="btn btn-default btn-xs"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a>
                              <a href="#" class="btn btn-default btn-xs"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Help!</a>
                            </div>
                          </div>
                        </div>
                        <div class="navbar-footer">
                          <div class="navbar-footer-content">
                            <div class="row">
                              <div class="col-md-6">

                                <a href="#" class="btn btn-default btn-sm"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Passowrd</a>
                              </div>
                              <div class="col-md-6">
                                <a href="database/logout.php" class="btn btn-default btn-sm pull-right"><i class="fa fa-power-off" aria-hidden="true"></i> Sign Out</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div style="padding-top:100px;">
        <!-- <div class="panele">
                <div class="panel-body">
                    <h1 class="panel-title pull-left" style="font-size:30px;"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</h1>
                </div>
            </div> -->
      </div>
      <input type="text" hidden="true" name="id" value="<?php echo $row['staff_id']; ?>">
      <div class="content">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
          <div class="panele">
            <div class="panel-body">
              <div class="col-lg-19 mb-3 mb-sm-5">

                <!-- <div class="card card-style1 border-0"> -->
                <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                  <div class="row align-items-center">
                    <div class="photo col-lg-6 mb-3 mb-lg-3">
                    <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
                        <div class="upload">
                          <?php
                          $id = $row["faculty_id"];
                          $name = $row["name"];
                          $image = $row["image"];
                          ?>
                          <div class="round">
                            <input type="hidden" name="faculty_id" value="<?php echo $id; ?>">
                            <input type="hidden" name="name" value="<?php echo $name; ?>">
                            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                            <i class="fa fa-camera" style="color: #fff"></i>
                            <!-- <i class="" style="color: #038bc5b7; font-style:normal; margin-top:40px"> change profile </i> -->
                          </div>
                        </div>
                      </form>
                      <img style="border-radius: 20px;" width="50%" src="images/<?php echo $row['image']; ?>" alt="">

                      <br>
                    </div>
                    <div class="col-lg-6 px-xl-10 mt-3">
                      <div>
                        <a <?php echo 'href="fcpedit.php?id=' . $row['staff_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-warning editbutton" type="submit">Edit</a>
              
                      </div>
                

                      <div class="bg-secondary2 d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                        <h3 class="text-white mb-10"><?php echo $row['name']; ?></h3>
                        <h5 class="text-white"><?php echo $row['Designation']; ?></h5>
                      </div>
                      <div class="proftext">
                        <table class="table">
                          <tr>
                            <td><strong class="strong">Email:</strong></td>
                            <td><i class="idata"><?php echo $row['email']; ?></i></td>
                          </tr>
                          <tr>
                            <td><strong class="strong">Phone:</strong></td>
                            <td><i class="idata"><?php echo $row['phone']; ?></i></td>
                          </tr>
                          <tr>
                            <td><strong class="strong">Aadhar:</strong></td>
                            <td><i class="idata"><?php echo $row['aadhar']; ?></i></td>
                          </tr>
                          <tr>
                            <td><strong class="strong">Pan:</strong></td>
                            <td><i class="idata"><?php echo $row['pan']; ?></i></td>
                          </tr>
                          <tr>
                            <td><strong class="strong">Date of birth:</strong></td>
                            <td><i class="idata"><?php echo $row['dob']; ?></i></td>
                          </tr>

                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="panele ">
            <table class="table">
              <div class="panel-body">
                <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">QUALIFICATION</h3>

                <tr>
                  <td>
                    <label class="name">UG: </label>
                    <td>:</td>
                  </td>
                  <td><i class="ii"><?php echo $row['ug']; ?></i>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="name">Institute </label>
                  </td>
                  <td>:</td>
                  <td><i class="ii"><?php echo $row['Institution1']; ?></i>

                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="name">Year: </label>
                  </td>
                  <td>:</td>
                  <td><i class="ii"><?php echo $row['Year1']; ?></i>

                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="name">PG: </label>
                  </td>
                  <td>:</td>
                  <td><i class="ii"><?php echo $row['pg']; ?></i>

                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="name">Institute: </label>
                  </td>
                  <td>:</td>
                  <td><i class="ii"><?php echo $row['Institution2']; ?></i>

                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="name">Year: </label>
                  </td>
                  <td>:</td>
                  <td><i class="ii"><?php echo $row['Year2']; ?></i>

                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="name">P.hd: </label>
                  </td>
                  <td>:</td>
                  <td><i class="ii"><?php echo $row['phd']; ?></i>

                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="name">Institute: </label>
                  </td>
                  <td>:</td>
                  <td><i class="ii"><?php echo $row['Institution3']; ?></i>

                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="name">Year: </label>
                  </td>
                  <td>:</td>
                  <td><i class="ii"><?php echo $row['Year3']; ?></i>

                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="name">Specialization: </label>
                  </td>
                  <td>:</td>
                  <td><i class="ii"><?php echo $row['Specialization']; ?></i>

                  </td>
                </tr>
              </div>
            </table>
          </div>
          <div class="panele">
            <table class="table">
              <div class="panel-body">
                <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">DESIGNATION </h3>

                <tr>
                  <td><label class="name">Designation: </label>
                  </td>
                  <td>:</td>
                  <td><i class="ii"><?php echo $row['Designation']; ?></i>
                  </td>
                </tr>
                <tr>
                  <td><label class="name">Associate with instute: </label>
                  </td>
                  <td>:</td>
                  <td><i class="ii"><?php echo $row['associate_Institute']; ?></i>
                  </td>
                </tr>
                <tr>
                  <td><label class="name">Date on which Designated: </label></td>
                  <td>:</td>
                  <td><i class="ii"><?php echo $row['Date_Prof_Asso_Prof']; ?></i></td>
                </tr>

                <tr>
                  <td> <label class="name">Date of joining on instution: </label></td>
                  <td>:</td>
                  <td> <i class="ii"><?php echo $row['date_join_instute']; ?></i></td>
                </tr>

                <tr>
                  <td> <label class="name">Currently associated: </label></td>
                  <td>:</td>
                  <td> <i class="ii"><?php echo $row['currently_asso_date_if_no']; ?></i></td>
                </tr>

                <tr>
                  <td> <label class="name">Nature of Association:</label></td>
                  <td>:</td>
                  <td><i class="ii"><?php echo $row['association']; ?></i></td>
                </tr>


              </div>
            </table>
          </div>


          <hr>
          <div class="panele">
            <table class="table">
              <div class="panel-body">
                <h3 class="section-title text-primary mb-5 mb-sm-5 display-6">PAST EXPERIANCE</h3>

                <tr>
                  <td><label class="name">About Detaile: </label></td>
                  <td>:</td>
                  <td><i class="ii" style="margin-left: 70px;"><?php echo $row['past_experience']; ?></i></td>
                </tr>
                <br>
              </div>
            </table>
          </div>
        </div>
      </div>


    </div>
    <?php
    include "includes/footer/footer.php";
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


  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    // j Query for View scho data 

    $(document).ready(function() {
      $('input[type="radio"]').click(function() {
        var inputValue = $(this).attr("value");
        $("#" + inputValue).show();
      });
    });
  </script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript">
    document.getElementById("image").onchange = function() {
      document.getElementById("form").submit();
    };
  </script>


  <!-- // photo update -->


  <?php

  if (isset($_FILES["image"]["name"])) {

    print_r($_FILES["image"]);
    $id = $_POST["faculty_id"];
    $name = $_POST["name"];

    $imageName = $_FILES["image"]["name"];
    $imageSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    // Image validation
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $imageName);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtension)) {
      echo
      "
    <script>
      alert('Invalid Image Extension');
      document.location.href = 'http://localhost/faculty/fcpedit.php';
    </script>
    ";
    } elseif ($imageSize > 1200000) {
      echo
      "
    <script>
      alert('Image Size Is Too Large');
      document.location.href = 'http://localhost/faculty/fcpedit.php';
    </script>
    ";
    } else {
      $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
      $newImageName .= '.' . $imageExtension;
      $query = "UPDATE fcprofile SET image = '$newImageName' WHERE faculty_id = $id";
      mysqli_query($con, $query);
      move_uploaded_file($tmpName, 'images/' . $newImageName);
      echo
      "
    <script>
    document.location.href = 'http://localhost/faculty/facultyprofile.php';
    </script>
    ";
    }
  }
  ?>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>