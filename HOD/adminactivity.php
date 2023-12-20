<?php
include('include/header.php');
include('include/navbar.php');
?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Activity</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .bg-gradient-primary {
            background-color: #d11aa0;
            background-image: linear-gradient(180deg, #d400b782 10%, #3422be96 100%);
            background-size: cover
        }

        .btn-primary {
            background-color: #d11aa0;
            border-color: transparent;
        }

        .table {
            color: #000;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"> Activity Details</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <?php

                            if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                                echo '<h4 class="m-2 font-weight-bold text-primary">' . $_SESSION['success'] . '</h4>';
                                unset($_SESSION['success']);
                            }

                            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                                echo '<h4 class="m-2 font-weight-bold text-Danger">' . $_SESSION['status'] . '</h4>';
                                unset($_SESSION['status']);
                            }
                            ?>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                $query = "SELECT * FROM fcprofile";
                                $query_run = mysqli_query($con, $query);
                                ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Faculty ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Consulyancy Details </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $num = 0;
                                        if (mysqli_num_rows($query_run) > 0) {

                                            while ($row = mysqli_fetch_assoc($query_run)) {
                                                $num = $num + 1;
                                        ?>

                                                <tr>

                                                    <td><?php echo $num ?></td>
                                                    <td><?php echo $row['faculty_id']; ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>

                                                    <td>
                                                        <div class="dropdown">

                                                            <a class="btn btn-secondary  dropdown-toggle btn-sm" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                                Select Activity
                                                            </a>

                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                                <li>
                                                                    <form action="viewinteraction.php" method="GET">
                                                                        <input type="hidden" name="faculty_id" value="<?php echo $row['faculty_id']; ?>">
                                                                        <button <?php echo 'href="viewbook.php?id=' . $row['faculty_id'] . '"'; ?> type="submit" name="view" class="dropdown-item">Interactions</button>
                                                                    </form>
                                                                </li>
                                                                <li>
                                                                    <form action="viewcommittee.php" method="GET">
                                                                        <input type="hidden" name="faculty_id" value="<?php echo $row['faculty_id']; ?>">
                                                                        <button <?php echo 'href="viewconference.php?id=' . $row['faculty_id'] . '"'; ?> type="submit" name="view" class="dropdown-item">Committee</button>
                                                                    </form>
                                                                </li>
                                                                <li>
                                                                    <form action="viewcontributions.php" method="GET">
                                                                        <input type="hidden" name="faculty_id" value="<?php echo $row['faculty_id']; ?>">
                                                                        <button <?php echo 'href="viewpatent.php?id=' . $row['faculty_id'] . '"'; ?> type="submit" name="view" class="dropdown-item">Contributions</button>
                                                                    </form>
                                                                </li>
                                                               
                                                            </ul>
                                                        </div>
                                                    </td>

                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "No Record Found";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>






    </div>
    <!-- confirm selete pop up -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Modal -->




    <script>
        function passValue(value) {
            var input = document.getElementById('inputField');
            input.value = value;
        }
    </script>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



</body>

</html>