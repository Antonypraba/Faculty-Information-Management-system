<?php
include('include/header.php');
include('include/navbar.php');
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>


  <style>
    .table {
      color: #000;
    }
  </style>
  <!-- Content Row -->
  <div class="row">
    <?php
    // Database connection
    $hostname = "localhost"; //local server name default localhost.
    $username = "root";  //mysql username default is root.
    $password = "";       //blank if no password is set for mysql.
    $database = "facultys";  //database name.
    $con = new mysqli($hostname, $username, $password, "facultys");
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }

    // Count total data in a table
    $sql = "SELECT COUNT(*) AS total FROM fcprofile";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $total = $row['total'];

    ?>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="font-weight-bold text-primary text-uppercase mb-1 ">Total  Staffs</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <!-- <h5>Total Staffs</h5> -->
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo " " . $total; ?></div>
                <?php } else {
                echo "No data found in the table.";
              }
              $con->close(); ?>
                </div>

              </div>
              <div class="col-auto">
                <i class="fas fa-chalkboard-teacher fa-2x text-gray-800"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php

      $hostname = "localhost"; //local server name default localhost.
      $username = "root";  //mysql username default is root.
      $password = "";       //blank if no password is set for mysql.
      $database = "facultys";  //database name.
      $con = new mysqli($hostname, $username, $password, "facultys");
      if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }

      // Count total data in a table
      $sql = "SELECT COUNT(*) AS total FROM phd_scholars";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total2 = $row['total'];

      ?>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="font-weight-bold text-success text-uppercase mb-1">Scholar Students</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo " " . $total2; ?></div>
                <?php } else {
                echo "No data found in the table.";
              }
              $con->close(); ?>
                </div>
                <div class="col-auto">
                  <i class="fas fa-user-graduate fa-2x text-gray-800"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class=" font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                    </div>
                    <div class="col">
                      <div class="progress progress-sm mr-2">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class=" font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>

  <!-- Content Row -->

  <?php
  include('database/connect.php');
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
              <label>Name</label>
              <input type="name" name="name" class="form-control" placeholder="Enter Name" required>
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
              <div class="card-body">
                <div class="table-responsive">
                  <?php
                  $query = "SELECT * FROM fcprofile";
                  $query_run = mysqli_query($con, $query);
                  ?>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Faculty ID</th>
                        <th>Username </th>
                        <th>Email </th>
                        <th>Phone</th>

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
                            <td><?php echo $row['phone']; ?></td>

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

        </div>

      </div>

    </div>


  </div>
  <!-- /.container-fluid -->

</div>



<?php

include('include/footer.php');
include('include/scripts.php');
?>