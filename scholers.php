<?php
include("database/connect.php");
session_start();
if (!isset($_SESSION['USER_ID'])) {
    header("location:login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Scholar details</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/ptu.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<link rel="stylesheet" href="css\header.css">
<link rel="stylesheet" href="css\scholers.css">
<link rel="stylesheet" href="includes/footer/footer.css">


<style>
    h3{
        color: black;
    }
    .top {
        margin-left: 40px;
        margin-top: 20px;
    }

    .btn {
        margin-right: 15px;
    }

    .navv {

        margin-top: -20px;
    }

    @media screen and (min-width: 992px) {
        .py-5 {
            padding: 4rem;
            margin-left: 10px;
        }
    }

    @media screen and (min-width: 720px) {
        .py-5 {
            padding: 4rem;
            margin-left: 10px;
        }
    }

    @media screen and (min-width: 320px) {
        .py-5 {
            padding: 4rem;
            margin-left: 10px;
        }
    }

    /* no scholar */
    .blockquote-custom {
        margin-top: -200px;
        position: relative;
        font-size: 1.3rem;
        width: 600px;
        height: 100px;
        margin-left: 150px;
        border-radius: 1.25rem;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.775);
    }

    .blockquote-custom-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: -40px;
        left: 19px;
    }

    .infobtn {
        font-weight: bold;
        text-decoration: none;
    }
    .modal{
        border-radius: 15px;
    }
        .footer-distributed {
      margin-top: 1rem;
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
<div class="mainbody container-fluid">

    <!-- Image and text -->
    <div class="navv">
        <nav class=" navbar navbar-expand-lg navbar-light bg-secondary text-white">
            <a class="navbar-brand" href="#">
                <img src="images/ptu.jpg" width="50" height="50" class="d-inline-block align-top" alt="">
            </a>
            <h4 class="two" href="#">Scholar Students</h4>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="position-absolute top-10 end-0 " id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active ">
                        <a class="nav-link text-white" href="facultyprofile.php">Home</a>
                    </li>
                    <li class="nav-item active ">
                        <a class="nav-link text-white" href="insertscholar.php">Add Scholars</a>
                    </li>
                    <a href="database/logout.php" class="btn btn-light" type="submit">Logout</a>
                </ul>
            </div>
        </nav>
    </div>

    <?php
    $user = $_SESSION['UNSER_NAME'];

    $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
    $row = mysqli_fetch_array($query);
    $faculty_id = $row['faculty_id']; ?>

    <div class="top">
        <h3><?php echo $row['name']; ?></h3>
        <span>Scholars</span>
    </div>



    <div class="container">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">

            <?php
            $query1 = mysqli_query($con, "SELECT * FROM phd_scholars WHERE faculty_id = '$faculty_id'");
            $result = mysqli_num_rows($query1);
            // $row =  mysqli_fetch_all($query1);
            // // echo "<script>console.log('$result')</script> ";
            // // for ($i = 0; $i <= 10; $i++) {

            if ($query1->num_rows > 0) {

                while ($row = $query1->fetch_assoc()) {



            ?>
                    <div hidden="true ">
                        <tbody>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['scholar_name']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['Joining Date']; ?></td>
                                <td><?php echo $row['viva_date']; ?></td>
                                <td><?php echo $row['area_of_research']; ?></td>
                                <td><?php echo $row['title_of_the_thesis']; ?></td>
                            </tr>
                        </tbody>
                    </div>

                    <div class="col">
                        <div class="card radius-15 ">
                            <div class="card-body text-center">
                                <div class="p-4 border radius-15">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" width="100" height="100" class="rounded-circle shadow" alt="">
                                    <h5 class="mb-0 mt-3"><?php echo $row['scholar_name']; ?></h5>
                                    <p class="mb-3"><?php echo $row['category']; ?></p>
                                    <div class="list-inline contacts-social mt-3 mb-3">
                                        <!--<a href="javascript:;" class="list-inline-item bg-facebook text-white border-0"><i class="bx bxl-facebook"></i></a>
                                        <a href="javascript:;" class="list-inline-item bg-twitter text-white border-0"><i class="bx bxl-twitter"></i></a>
                                        <a href="javascript:;" class="list-inline-item bg-linkedin text-white border-0"><i class="bx bxl-linkedin"></i></a> -->
                                    </div>

                                    <!-- data-toggle="modal" data-target="#exampleModalCenter" href="scholers.php?id=>'"-->
                                    <div class="d-grid">

                                        <a id='<?php echo $row['scholar_id'] ?>' class="btn btn-info shwbtn radius-15  ">More Info</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php  }
            } else {

                echo '
                <section class="vh-100" style="background-color: #f5f7fa;">
                <div class="container py-5 h-100">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-md-9 col-lg-7 col-xl-5">
              
                      
                        <div class="card-body">
                          <blockquote class="blockquote blockquote-custom bg-white px-5 pt-4">
                            <div class="blockquote-custom-icon bg-info shadow-1-strong">
                              <i class="fa fa-quote-left text-white"></i>
                            </div>
                            <p class="mb-0 mt-2 font-italic">
                              "There is  "NO"  Scholars are available
                              <a href="facultyprofile.php" class="text-info">  Home</a>."
                            </p> 
                          </blockquote>
                       </div>
                    </div>
                  </div>
                </div>
              </section>
              ';
            }
            ?>
        </div>
    </div>

    <?php
            $query1 = mysqli_query($con, "SELECT * FROM phd_scholars WHERE faculty_id = '$faculty_id'");
            $result = mysqli_num_rows($query1);
            // $row =  mysqli_fetch_all($query1);
            // // echo "<script>console.log('$result')</script> ";
            // // for ($i = 0; $i <= 10; $i++) {

            if ($query1->num_rows > 0) {

                while ($row = $query1->fetch_assoc()) {



            ?>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Scholar Details </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


                <!-- Modal body -->
                <div class="modal-body">
                    Modal body..
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                </div>

            </div>
        </div>
    </div>
<?php 

                }}else{}    ?>

    <!-- ########################################### edit form ########################################### -->

    
    
  <?php

include "includes/footer/footer.php";

?>

</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script>
        // j Query for View scho data 

        $(document).ready(function() {
            $('.shwbtn').click(function() {
                id_emp = $(this).attr('id')
                $.ajax({
                    url: "select.php",
                    method: 'post',
                    data: {
                        emp_id: id_emp
                    },
                    success: function(result) {
                        $(".modal-body").html(result);

                    }
                });
                $('#myModal').modal("show");
            })
        })
    </script>

<script>
        // j Query for View scho data 

        $(document).ready(function() {
            $('.shwbtn').click(function() {
                id_emp = $(this).attr('id')
                $.ajax({
                    url: "select2.php",
                    method: 'post',
                    data: {
                        emp_id: id_emp
                    },
                    success: function(result) {
                        $(".modal-footer").html(result);

                    }
                });
                $('#myModal').modal("show");
            })
        })
    </script>



</body>

</html>