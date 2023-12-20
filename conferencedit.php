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
    <link rel="stylesheet" href="css/fcpedit.css">
    <style>
        .date {
            margin-left: -14px;
        }

        .panele {
            margin-top: 8rem;
        }
        .content{
            margin-top: 10rem ;
            
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
    include "includes/header3.php";
    ?>
    
    <?php
    $id = $_GET["id"];
    $user = $_SESSION['UNSER_NAME'];
    $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
    $row = mysqli_fetch_array($query);
    $email = $row['email'];

    $query1 = mysqli_query($con, "SELECT * FROM conference WHERE conference_id = '$id'");
    $result = mysqli_num_rows($query1);
  
  
    if ($query1->num_rows > 0) {
  
      while ($row = $query1->fetch_assoc()) {
  
  
  
    ?>
  <div class="mainbody container-fluid">
            <form action="database\update.php" method="POST">
                <input type="int" hidden="true" name="id" value="<?php echo $row['conference_id']; ?>">
                <div class="content">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="panele">
                            <div class="panel-body">
                                <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">Edit Conference </h3>
                                <br><br>
                                <label for="name">Conference Title</label>
                                <input type="text" class="form-control" placeholder="" value="<?php echo $row['conference_title']; ?>" name="conference_title">
                                <br>
                                <label for="faculty_id">Author</label>
                                <input type="text" class="form-control" value="<?php echo $row['conference_author']; ?>" name="conference_author">
                                <br>
                                <div class="col-xs-3 pull-left date">
                                    <label for="email">Publication Date</label>
                                    <input type="date" name="conference_publication_date" value="<?php echo $row['conference_publication_date']; ?>" />
                                </div>
                                <br><br><br><br>
                                <label for="phone">Volume</label>
                                <input type="text" class="form-control" value="<?php echo $row['conference_volume']; ?>" name="conference_volume">
                                <br>
                                <label for="aadhar">Pages</label>
                                <input type="text" class="form-control" value="<?php echo $row['conference_pages']; ?>" name="conference_pages">
                                <br>
                                <label for="aadhar">Issue</label>
                                <input type="text" class="form-control" value="<?php echo $row['conference_issue']; ?>" name="conference_issue">
                                <br>
                                <label for="aadhar">Paper Title</label>
                                <input type="text" class="form-control" value="<?php echo $row['conference_paper_title']; ?>" name="conference_paper_title">
                                <br>
                                <button name="updateconference" type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check update"></i>Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
    include "includes/footer/footer.php";
    ?>
   
    </div><?php  }
  } else {
  }
  ?>
   


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