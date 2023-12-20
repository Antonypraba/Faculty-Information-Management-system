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
        .footer-distributed {
            margin-top: 15rem;
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




            ?>
            <form action="database\insert.php<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
                <input type="int" hidden="true" name="faculty_id" value="<?php echo $row['faculty_id'];?>">
                <div class="content">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="panele">
                            <div class="panel-body">
                                <h1 class="panel-title pull-left" style="font-size:30px;">Edit Book</h1>
                            </div>
                        </div>
                        <div class="panele">
                            <div class="panel-body">
                                <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">Add journal Details</h3>
                                <br><br>
                                <label for="name">Title</label>
                                <input type="text" class="form-control" id="First_name" placeholder="" value="" required name="journal_title">
                                <br>
                                <label for="faculty_id">Author</label>
                                <input type="text" class="form-control" id="posting" value="" name="journal_author">
                                <br>
                                <div class="col-xs-3 pull-left date">
                                    <label for="email">Publication Date</label>
                                    <input type="date" value="" name="journal_publication_date"/>
                                </div>
                                <br><br><br><br>
                                <label for="aadhar">Volume</label>
                                <input type="text" class="form-control" id="aadhar" value="" name="journal_volume">
                                <br>
                                <label for="phone">Pages</label>
                                <input type="text" class="form-control" id="phone" value="" name="journal_pages">

                                <br>
                                <label for="aadhar">Publisher</label>
                                <input type="text" class="form-control" id="aadhar" value="" name="journal_publisher">

                                <br>
                                <label for="aadhar">Issue</label>
                                <input type="text" class="form-control" id="aadhar" value="" name="journal_issue">
                                <br>
                                <label for="aadhar">Paper Title</label>
                                <input type="text" class="form-control" id="aadhar" value="" name="journal_paper_title">
                                <br>
                                <button name="action" value="insertjournal" type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check update"></i>Add journal</button>

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




    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>

</html>