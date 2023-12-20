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

    <title>SB Admin 2 - Tables</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Facultys Login Details</h1>


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
                            <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#addadminprofile">
                                Add new Faculty
                            </button>

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
                                            <th>Phone</th>
                                            <th>EDIT</th>
                                            <th>VIEW</th>
                                            <th>DELETE</th>
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
                                                    <td><?php echo $row['phone']; ?></td>
                                                    <td>
                                                        <form action="facultyedit.php" method="post">
                                                            <input type="hidden" name="edit_id" value="<?php echo $row['staff_id']; ?>">
                                                            <button type="submit" name="edit_btn" class="btn btn-success"> Edit </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action="viewfaculty.php" method="post">
                                                            <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">
                                                            <button type="submit" name="view" class="btn btn-info"> View </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <button onclick="passValue('<?php echo $row['staff_id']; ?>')" type="button" value="" name="delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            Delete
                                                        </button>

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


    <!-- Add faculty model -->
    <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new faculty</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="database/reg.php" method="POST">

                    <div class="modal-body">

                        <div class="form-group">
                            <label> Faculty ID </label>
                            <input type="int" name="faculty_id" class="form-control" placeholder="Enter faculty id" required>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="name" name="name" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="Designation" class="form-control" placeholder="Designation" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email" required>
                            <small class="error_email" style="color: red;"></small>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>




    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
            </div>
            <div class="card-body">
                <?php

                if (isset($_POST['edit_btn'])) {
                    $id = $_POST['edit_id'];

                    $query = "SELECT * FROM fcprofile WHERE id='$id' ";
                    $query_run = mysqli_query($connection, $query);

                    foreach ($query_run as $row) {
                ?>

                        <form action="code.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                            <div class="form-group">
                                <label> Username </label>
                                <input type="text" name="edit_username" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password">
                            </div>

                            <a href="register.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

                        </form>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    </div>
    <!-- confirm selete pop up -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Staff ?</h5>
                    <h3 type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </h3>

                </div>
                <div class="modal-body">
                    Are You Sure Want to delete this Staff Data ?
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="database/delete.php" method="post">
                        <input type="text" hidden value="" id="inputField" name="delete_id">
                        <button type="submit" name="delete_btn" class="btn btn-primary">Yes delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


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






</body>

</html>