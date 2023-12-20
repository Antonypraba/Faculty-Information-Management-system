<?php
include("database/connect.php");
session_start();
if (!isset($_SESSION['UNSER_NAME'])) {
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
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Profile</title>
    <style>
        
        * {
            margin: 0px;
            padding: 0px;
        }


        i {
            font-style: normal;
            font-size: 17px;
        }

        span {
            color: black;
        }
    </style>
</head>

<body>
    <?php
    include "includes/header.php";
    ?>
    <?php


    $user = $_SESSION['UNSER_NAME'];
    $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
    $row = mysqli_fetch_array($query);
    $email = $row['email'];



    $query1 = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$email'");
    $result = mysqli_num_rows($query1);


    $row =  mysqli_fetch_array($query1) ?>

    <section class="container bg-gray">
        <div class="container">
        <a   <?php echo' href="fcpedit.php?id='.$row['staff_id'].'"'?> width="80px"   class="btn btn-warning btnnn" type="submit">Edit</a>
            <div class="row">
                <div class="col-lg-19 mb-3 mb-sm-5">
                    <!-- <div class="card card-style1 border-0"> -->
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <div class="photo col-lg-6 mb-4 mb-lg-3">
                                <img width="50%" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                            </div>
                            <div class="proftop col-lg-6 px-xl-10 mt-3">
                                <div class="bg-secondary2 d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="text-white mb-10"><?php echo $row['name']; ?></h3>
                                    <span class="text-white"><?php echo $row['posting']; ?></span>
                                </div>
                                <ul class="list-unstyled mb-1-9 justify-content-center">
                                    <li class="mb-2 mb-xl-3 "><span class="display-26 text-secondary me-2 font-weight-600">Email:</span><i><?php echo $row['email']; ?></i> </li>
                                    <li class=" mb-2"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span><i><?php echo $row['phone']; ?></i> </li>
                                    <li class=" mb-2"><span class="display-26 text-secondary me-2 font-weight-600">Aadhar:</span><i></i> </li>
                                    <li class=" mb-2"><span class="display-26 text-secondary me-2 font-weight-600">PAN:</span><i></i></li>
                                    <li class=" mb-2"><span class="display-26 text-secondary me-2 font-weight-600">Specilization:</span><i></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body  col-lg-12 mb-4 mb-sm-5">
                <div>
                    <span style="text-decoration: underline;" class="section-title text-primary mb-3 mb-sm-4 display-6">Qualification</span>
                    <ul class="list-unstyled mb-1-8">

                        <li class="mb-2 "><span class="display-26 text-secondary me-2 font-weight-600">UG:</span><i></i> </li>
                        <li class=" mb-2"><span class="display-26 text-secondary me-2 font-weight-600">Institution:</span><i></i> </li>
                        <li class=" mb-5"><span class="display-26 text-secondary me-2 font-weight-600">Year:</span><i></i> </li>
                        <li class=" mb-2"><span class="display-26 text-secondary me-2 font-weight-600">PG:</span><i></i>
                        <li class=" mb-2"><span class="display-26 text-secondary me-2 font-weight-600">Institution:</span><i></i> </li>
                        <li class=" mb-5"><span class="display-26 text-secondary me-2 font-weight-600">Year:</span><i></i> </li>
                        <li class=" mb-2"><span class="display-26 text-primary text-uppercase me-2 font-weight-400" style="text-decoration: underline;">Others</span> </li>
                        <li class=" mb-2"><span class="display-26 text-secondary me-2 font-weight-400">phd</span> </li>
                        </li><br>
                    </ul>
                </div>
            </div>
            <div class="card-body col-lg-12 mb-4 mb-sm-5">
                <div class="row">
                    <div class="col-lg-12 mb-8 mb-sm-5">

                        <div>
                            <span style="text-decoration:underline;" class="section-title text-primary mb-5 mb-sm-5 display-6">Other INFO</span>
                            <ul class="list-unstyled mb-1-8">
                                <li class="mb-4 "><span class="text-secondary display-26 me-2 font-weight-600">Designation </span><i>ASS prof </i> </li>
                                <li class="mb-4 "><span class="display-26 text-secondary me-2 font-weight-600">Associate with instute:</span><i>yes / no</i> </li>
                                <li class="mb-4 "><span class="display-26 text-secondary me-2 font-weight-600">Date on which Designated: </span><i>Date proff / assprof</i> </li>
                                <li class="mb-4 "><span class="display-26 text-secondary me-2 font-weight-600">Date of joining on instution: </span><i>Date </i> </li>
                                <li class="mb-4 "><span class="display-26 text-secondary me-2 font-weight-600">Currently associated: </span><i>Yes if no date? </i> </li>
                                <li class="mb-4 "><span class="display-26 text-secondary me-2 font-weight-600">Nature of Association </span><i>Regular / Contract </i> </li>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body col-lg-12 mb-4 mb-sm-5 ">
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <span style="text-decoration:underline;" class="section-title text-primary mb-5 mb-sm-5 display-6">Past experiance</span>
                            <ul class="list-unstyled mb-1-8">
                                <li class="mb-4 "><span class="display-26 text-secondary me-2 font-weight-600">Designation </span><i>ASS prof </i> </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>

</html>