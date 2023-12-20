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
    <script src="//code.jquery.com/jquery-1.11.1.min.js" rel="stylesheet">
    </script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="includes/footer/footer.css">
    <link rel="stylesheet" href="css/fcpedit.css">
    <style>
        .date {
            margin-left: -14px;
        }

        .panele {
            margin-top: 8rem;
        }

        .content {
            margin-top: 8rem;

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
    include "includes/header4.php";
    ?>

    <?php
    $id = $_GET["id"];
    $user = $_SESSION['UNSER_NAME'];
    $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
    $row = mysqli_fetch_array($query);
    $email = $row['email'];

    $query1 = mysqli_query($con, "SELECT * FROM projects WHERE project_id = '$id'");
    $result = mysqli_num_rows($query1);
    if ($query1->num_rows > 0) {

        while ($row = $query1->fetch_assoc()) {



    ?>
            <div class="mainbody container-fluid">
                <form action="database\update.php<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input type="int" hidden="true" name="id" value="<?php echo $row['project_id']; ?>">
                    <div class="content">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="panele">
                                <div class="panel-body">
                                    <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">Edit Project's </h3>
                                    <br><br>
                                    <label for="name">Project Title</label>
                                    <input type="text" class="form-control" placeholder="" value="<?php echo $row['project_title']; ?>" name="project_title">
                                    <br>
                                    <label for="faculty_id">Investigator</label>
                                    <input type="text" class="form-control" value="<?php echo $row['project_investigator']; ?>" name="project_investigator">
                                    <br>
                                    <label for="faculty_id">Sanctioned Agency</label>
                                    <input type="text" class="form-control" value="<?php echo $row['sanctioned_agency']; ?>" name="sanctioned_agency">
                                    <br>
                                    <label for="phone">Sanctioned Amount</label>
                                    <input type="text" class="form-control" value="<?php echo $row['sanctioned_amount']; ?>" name="sanctioned_amount">
                                    <br>
                                    <div class="col-xs-3 pull-left date">
                                        <label for="email">Year Of Sanctioned</label>
                                        <input type="year" value="<?php echo $row['year_of_sanctioned']; ?>" class="form-control" name="year_of_sanctioned">
                                    </div>
                                    <br><br><br><br>
                                    <label for="aadhar">Status</label>
                                    <input type="text" class="form-control" value="<?php echo $row['project_status']; ?>" name="project_status">
                                    <br>
                                    <label for="aadhar">Duration</label>
                                    <input type="text" class="form-control" value="<?php echo $row['duration']; ?>" name="duration">
                                    <br>
                                    <button name="updateproject" type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check update"></i>Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        <?php  }
    } else {

        echo '
    <div style="margin-left: 130px;" hidden="true" class="det_conf">
    <div class="image-wrapper">
      <div class="panele">
        <div class="panel-body">
          <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">Theres NO Data available</h3>
          <br><br>
        </div>
      </div>
    </div>
  </div>  
              ';
    }
        ?>
        <?php
        include "includes/footer/footer.php";
        ?>

            </div>


            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>

</html>