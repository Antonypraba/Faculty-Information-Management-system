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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

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

    <?php
    $id = $_GET["id"];
    $user = $_SESSION['UNSER_NAME'];
    $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
    $row = mysqli_fetch_array($query);
    $email = $row['email'];





    ?>



            <div class="mainbody container-fluid">
                <form action="database\insert.php<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" value="">
                    <input type="int" hidden="true" name="faculty_id" value="<?php echo $row['faculty_id']; ?>">
                    <div class="content">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="panele">
                                <div class="panel-body">
                                    <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">Add Committee</h3>
                                    <br><br>
                                    <label for="name">Committee Name</label>
                                    <input type="text" class="form-control" id="First_name" placeholder="" value="" required name="committee_name">
                                    <br>
                                    <div class="col-xs-3 pull-left date">
                                        <label for="faculty_id">Year</label>
                                        <input type="int" class="form-control" name="committee_year" value="" placeholder="Eg : 2013" />
                                    </div>
                                    <br><br><br><br>
                                    <label for="email">Role</label>
                                    <select class="form-control" type="text" name="committee_role" value="">
                                        <option selected value="">select</option>
                                        <option  value="Member">Member</option>
                                        <option value="Convener">Convener</option>
                                        <option value="Co-ordinator">Co-ordinator</option>
                                    </select>
                                    <br>
                                    <br>
                                    <button name="action" value="insertcommittee" type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check update"></i>Add</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>

       
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


            <script>
                // j Query for View scho data 

                $(document).ready(function() {
                    $('input[type="radio"]').click(function() {
                        var inputValue = $(this).attr("value");
                        $("#" + inputValue).show();
                    });
                });
            </script>


            <script src="js/research.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>