<?php
include("database/connect.php");

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


  <style>
    .date {
      margin-left: -14px;
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
                              <p class="text-center small">
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