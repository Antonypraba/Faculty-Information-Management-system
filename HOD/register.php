<?php
include('database/connect.php');
?>
<?php
include('include/header.php');
include('include/navbar.php');
?>
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
    <div class="card shadow mb-4">
        <h6 class="m-0 font-weight-bold text-primary">
            <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#addadminprofile">
                Add new Faculty
            </button>
        </h6>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $query = "SELECT * FROM fcprofile";
                $query_run = mysqli_query($con, $query);
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Faculty ID</th>
                            <th>Username </th>
                            <th>Email </th>
                            <th>Password</th>
                            <th>Desigination</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['faculty_id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td><?php echo $row['Designation']; ?></td>
                                    <td><button type="button" class="btn btn-success">Edit</button></td>
                                    <td>
                                        <form action="database/delete.php" method="post">
                                            <input type="hidden" name="delete_action" value="delete_staff">
                                            <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">
                                            <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                        </form>
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




<?php
include('include/scripts.php');
include('include/footer.php');
?>