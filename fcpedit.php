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
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js">
    rel = "stylesheet" >
  </script>
  <!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
  <link rel="stylesheet" href="includes/footer/footer.css">
  <style>
    .date {
      margin-left: -14px;
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
                  <li><a href="#">Activity</a></li>
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
                    <ul class="dropdown-menu">
                      <li>
                        <div class="navbar-content">
                          <div class="row">
                            <div class="col-md-5">
                              <img src="images/<?php echo $row['image']; ?>" alt="Alternate Text" class="img-responsive" width="120px" height="120px" />
                              <p class="text-center small">
                                <a href="./3X6zm">Change Photo</a>
                              </p>
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
      <form action="database\update.php" enctype="multipart/form-data" method="POST">
        <input type="text" hidden="true" name="id" value="<?php echo $row['staff_id']; ?>">
        <div class="content">
          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="panele">
              <div class="panel-body">
                <h1 class="panel-title pull-left" style="font-size:30px;">Edit profile</h1>
              </div>
            </div>
            <div class="panele">
              <div class="panel-body">
                <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">Personal Details</h3>
                <br><br>

                <label for="name">Name</label>
                <input type="text" class="form-control" id="First_name" placeholder="Fullname with doctorate" value="<?php echo $row['name']; ?>" name="name">
                <br>
                <label for="faculty_id">Faculty ID</label>
                <input type="text" class="form-control" id="posting" placeholder="Eg:**505" value="<?php echo $row['faculty_id']; ?>" readonly name="faculty_id">
                <br>
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="PTU email" value="<?php echo $row['email']; ?>" name="email">
                <br>
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" placeholder="Eg:+91 **.." value="<?php echo $row['phone']; ?>" name="phone">
                <br>
                <label for="aadhar">Aadhar Number</label>
                <input type="text" class="form-control" id="aadhar" placeholder="Eg:0000 0000 0000 0000" value="<?php echo $row['aadhar']; ?>" name="aadhar">
                <br>
                <label for="pan">Pan Number</label>
                <input type="text" class="form-control" id="pan" placeholder="Eg:34FM0AZ" value="<?php echo $row['pan']; ?>" name="pan">
                <br>
                <div class="col-xs-3 pull-left date">
                  <label for="">Date of Birth</label>
                  <input type="date" name="dob" value="<?php echo $row['dob']; ?>" class="form-control" />
                </div>
                <br><br><br><br>
                <label for="specaliation">Specilization</label>
                <input type="text" class="form-control" id="specaliation" placeholder="Eg:specilization" value="<?php echo $row['Specialization']; ?>" name="Specialization"></input>
                <br>
              </div>
            </div>
            <div class="panele">
              <div class="panel-body">
                <h3 class="section-title text-primary mb-5 mb-sm-5 display-6 ">Qualifications</h3>
                <br><br>
                <!-- <form class="form-horizontal"> -->
                <label for="Last_name">UG</label>
                <input type="text" class="form-control" id="Last_name" placeholder="Eg:degree" value="<?php echo $row['ug']; ?>" name="ug">
                <br>
                <label for="Last_name">UG Institution</label>
                <input type="text" class="form-control" id="Last_name" placeholder="Eg:Institution" value="<?php echo $row['Institution1']; ?>" name="Institution1">
                <br>
                <label for="Last_name">Year</label>
                <input type="text" class="form-control" id="Last_name" placeholder="Eg:day/month/year" value="<?php echo $row['Year1']; ?>" name="Year1">
                <br>
                <label for="Last_name">PG</label>
                <br>
                <input type="text" class="form-control" id="Last_name" placeholder="Eg:degree" value="<?php echo $row['pg']; ?>" name="pg">
                <br>
                <label for="Last_name">PG Institution</label>
                <input type="text" class="form-control" id="Last_name" placeholder="Eg:Institution" value="<?php echo $row['Institution2']; ?>" name="Institution2">
                <br>
                <label for="Last_name">Year</label>
                <input type="text" class="form-control" id="Last_name" placeholder="Eg:day/month/year" value="<?php echo $row['Year2']; ?>" name="Year2">
                <br>
                <label for="Last_name">P.hd</label>
                <input type="text" class="form-control" id="Last_name" placeholder="Eg:fill all details about p.hd" value="<?php echo $row['phd']; ?>" name="phd">
                <br><br>
                <label for="Last_name">P.hd Institution</label>
                <input type="text" class="form-control" id="Last_name" placeholder="Eg:Institution" value="<?php echo $row['Institution3']; ?>" name="Institution3">
                <br>
                <label for="Last_name">Year</label>
                <input type="text" class="form-control" id="Last_name" placeholder="Eg:day/month/year" value="<?php echo $row['Year3']; ?>" name="Year3">
                <br>
                <!-- </form> -->
              </div>
            </div>

            <div class="panele">
              <div class="panel-body">
                <h3 class="section-title text-primary mb-5 mb-sm-5 display-6">Designation Details</h3>
                <br><br>
                <!-- <form class="form-horizontal"> -->
                <label for="Your_location">Designation</label>
                <input type="text" class="form-control" id="Your_gender" placeholder="eg: Professor/Associate prof/ HOD " value="<?php echo $row['Designation']; ?>" name="Designation">
                <!-- </form> -->
                <br>
                <!-- <form class="form-horizontal"> -->
                <label for="Associate with instute">Associate with instute</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="Assoc_with_ins" id="flexRadioDefault1" value="yes">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Yes
                  </label>
                  <input class="form-check-input" type="radio" name="Assoc_with_ins" id="flexRadioDefault2" checked value="No">
                  <label class="form-check-label" for="flexRadioDefault2">
                    No
                  </label>
                </div>
                <br>
                <div class="form-group"> <!-- Date input -->
                  <label for="Your_gender">Date on which Designated as Prof/ Asso_Prof</label>
                  <input class="form-control" id="date" name="Date_Prof_Asso_Prof" placeholder="MM/DD/YYY with designation" type="text" value="<?php echo $row['Date_Prof_Asso_Prof']; ?>" />
                </div>
                <br>
                <div class="col-xs-3 date" id="birth-date" name="date_join_instute">
                  <label>Date of joining on instutions</label>
                  <input type="date" name="date_join_instute" value="" class="form-control" />
                </div>
                <br>
                <br>
                <br><br>
                <label>Currently Associate With institute</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="curr_ass_with_inst" id="exampleRadios2" checked value="yes">
                  <label class="form-check-label" for="exampleRadios2">
                    Yes
                  </label>
                  <input class="form-check-input" type="radio" name="curr_ass_with_inst" id="exampleRadios3" value="no">
                  <label class="form-check-label" for="exampleRadios3">
                    No
                  </label>
                  <br>
                  <div class="form-inline" id="no" hidden="true">
                    <label for="Your_gender">If No please enter a date</label>
                    <input type="date" name="leave_date" value="" class="form-control" />
                  </div>
                </div>
                <br>
                <label>Association</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="association" id="associateradio1" checked value="Regular">
                  <label class="form-check-label" for="associateradio2">
                    Regular
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="association" id="associateradio2" value="Contract">
                  <label class="form-check-label" for="associateradio2">
                    Contract
                  </label>
                </div>
                <!-- </form> -->
              </div>
            </div>
            <hr>
            <div class="panele">
              <div class="panel-body">
                <h3 class="section-title text-primary mb-5 mb-sm-5 display-6">Past Experiance</h3>
                <br>
                <label for="Last_name">Detaile Here:</label>
                <input type="text" class="form-control" id="Last_name" placeholder="past experiance" name="past_experience" value="<?php echo $row['past_experience']; ?>"></input>
                <br><br>
                <p class="text-danger"><strong><i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i> Check All details before click Update.</strong></p>

                <button name="update" type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check update"></i> Update Profile</button>
              </div>
            </div>
          </div>
        </div>
      </form>

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

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>