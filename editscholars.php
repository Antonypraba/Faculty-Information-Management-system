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

    </script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="includes/footer/footer.css">
    <link rel="stylesheet" href="css/fcprofile.css">
    <style>
        .date {
            margin-left: -14px;
        }

        .panele {
            margin-top: rem;
        }

        .content {
            margin-top: 8rem;

        }

        .span {
            color: blue;
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
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-responsive img-circle" title="John Doe" alt="John Doe" width="30px" height="30px">
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
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Alternate Text" class="img-responsive" width="120px" height="120px" />
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

            <?php
            $id = $_GET["id"];
            $user = $_SESSION['UNSER_NAME'];
            $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
            $row = mysqli_fetch_array($query);
            $email = $row['email'];

            $query1 = mysqli_query($con, "SELECT * FROM phd_scholars WHERE scholar_id = '$id'");
            $result = mysqli_num_rows($query1);
            if ($query1->num_rows > 0) {

                while ($row = $query1->fetch_assoc()) {



            ?>
                    <form action="database\update.php" method="POST" value="">
                        <input type="int" hidden="true" name="id" value="<?php echo $row['scholar_id']; ?>">
                        <div class="content">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="panele">
                                    <div class="panel-body">
                                        <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 "> <span class="span"> <?php echo $row['scholar_name']; ?></span></h3>
                                        <br>
                                        <label for="name">Scholar Name</label>
                                        <input type="text" class="form-control" placeholder="" value="<?php echo $row['scholar_name']; ?>" required name="scholar_name">
                                        <br>
                                        <label for="text">Category</label>
                                        <select class="form-control" value="<?php echo $row['category']; ?>" name="category">
                                            <option selected><?php echo $row['category']; ?></option>
                                            <option value="PT Internal">Part Time Internal</option>
                                            <option value="PT External">Part Time External</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="NDF">NDF</option>
                                            <option value="ADF">ADF</option>
                                            <option value="QIP">QIP</option>
                                        </select>

                                        <br>
                                        <div class="col-xs-3 pull-left date">
                                            <label for="aadhar">Joining Date : &nbsp;&nbsp;<?php echo $row['Joining_Date']; ?></label><br><br>
                                            <input type="date" value="<?php echo $row['Joining_Date']; ?>" name="Joining_Date" />
                                        </div>
                                        <br><br><br><br><br><br>
                                        <div class="col-xs-3 pull-left date">
                                            <label for="aadhar">Viva Date :</label><br>
                                            <input type="text" class="form-control" value="<?php echo $row['viva_date']; ?>" name="viva_date">
                                        </div>
                                        <br><br><br><br>
                                        <label for="text">Status</label>
                                        <select class="form-control" value="<?php echo $row['status']; ?>" name="status">
                                            <option selected><?php echo $row['status']; ?></option>
                                            <option value="Purusing">Purusing</option>
                                            <option value="Completed">Completed</option>
                                        </select><br>
                                        <label for="phone">Area of research</label>
                                        <input type="text" class="form-control" value="<?php echo $row['area_of_research']; ?>" name="area_of_research">
                                        <br>
                                        <label for="aadhar">Title</label>
                                        <input type="text" class="form-control" value="<?php echo $row['title_of_the_thesis']; ?>" name="title_of_the_thesis">
                                        <br>
                                        <button name="updatescholar" type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check update"></i>Update</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


        </div>
<?php  }
            } else {

                echo '
    
    Error Occur
              ';
            } ?>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>