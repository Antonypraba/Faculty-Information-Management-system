<?php
include('include/header.php');
include('include/navbar.php');
?>
<style>
    .table {
        color: #000;
    }

    a {
        text-decoration: none;
    }
</style>
<script src="table2excel.js"></script>




<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">VIEW STAFF PROFILE </h6>
            <div>
                <?php
                if (isset($_POST['view'])) {
                    $staff_id = $_POST['staff_id'];
                    $query  = "SELECT * FROM fcprofile where staff_id = '$staff_id'";
                    $query_run = mysqli_query($con, $query);
                    foreach ($query_run as $row) { ?>


                      <form method="post" action="database/export.php">
                        <input type="hidden" name="faculty_id" value="<?php echo $row['faculty_id']; ?>">
                        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                            <input type="submit" name="export" class="btn btn-success ml-3 float-right" value="Export To Excel" />
                        </form> 

                        <!-- <form action="facultyedit.php" method="post">
                            <input type="hidden" name="edit_id" value="<?php echo $row['staff_id']; ?>">
                            <button type="submit" name="edit_btn" class="btn btn-warning float-lg-right"> Edit </button>
                        </form> -->

            </div>
    <?php
                    }
                }
    ?>
        </div>
        <div class="card-body">
            <?php

            if (isset($_POST['view'])) {
                $staff_id = $_POST['staff_id'];

                $query  = "SELECT * FROM fcprofile where staff_id = '$staff_id'";
                $query_run = mysqli_query($con, $query);

                foreach ($query_run as $row) {
            ?>

                    <input type="text" hidden="true" name="id" value="<?php echo $row['staff_id']; ?>">
                    <div class="content">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="panele">
                                <div class="panel-body">
                                    <div class="col-lg-19 mb-3 mb-sm-5">

                                        <!-- <div class="card card-style1 border-0"> -->
                                        <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                                            <div class="row align-items-center">
                                                <div class="proftext">
                                                    <table class="table">
                                                        <tr>
                                                            <td>
                                                                <div class="col-md-5">
                                                                    <img src="http://localhost/faculty/images/<?php echo $row['image']; ?>" alt="Alternate Text" class="img-responsive" width="150px" height="120px" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th><strong class="strong">Name:</strong></th>
                                                            <td><i class="idata"><?php echo $row['name']; ?></i></td>
                                                        </tr>
                                                        <tr>
                                                            <th><strong class="strong">Email:</strong></th>
                                                            <td><i class="idata"><?php echo $row['email']; ?></i></td>
                                                        </tr>
                                                        <tr>
                                                            <th><strong class="strong">Phone:</strong></th>
                                                            <td><i class="idata"><?php echo $row['phone']; ?></i></td>
                                                        </tr>
                                                        <tr>
                                                            <th><strong class="strong">Aadhar:</strong></th>
                                                            <td><i class="idata"><?php echo $row['aadhar']; ?></i></td>
                                                        </tr>
                                                        <tr>
                                                            <th><strong class="strong">Pan:</strong></th>
                                                            <td><i class="idata"><?php echo $row['pan']; ?></i></td>
                                                        </tr>
                                                        <tr>
                                                            <th><strong class="strong">Date of birth:</strong></th>
                                                            <td><i class="idata"><?php echo $row['dob']; ?></i></td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panele ">
                            <table class="table">
                                <div class="panel-body">
                                    <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">QUALIFICATION</h3>
                                    <tr>
                                        <th>
                                            <label class="name">UG: </label>
                                        </th>
                                        <td><i class="ii"><?php echo $row['ug']; ?></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label class="name">Institute </label>
                                        </th>
                                        <td><i class="ii"><?php echo $row['Institution1']; ?></i>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label class="name">Year: </label>
                                        </th>
                                        <td><i class="ii"><?php echo $row['Year1']; ?></i>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label class="name">PG: </label>
                                        </th>
                                        <td><i class="ii"><?php echo $row['pg']; ?></i>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label class="name">Institute: </label>
                                        </th>
                                        <td><i class="ii"><?php echo $row['Institution2']; ?></i>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label class="name">Year: </label>
                                        </th>
                                        <td><i class="ii"><?php echo $row['Year2']; ?></i>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label class="name">P.hd: </label>
                                        </th>
                                        <td><i class="ii"><?php echo $row['phd']; ?></i>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label class="name">Institute: </label>
                                        </th>
                                        <td><i class="ii"><?php echo $row['Institution3']; ?></i>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label class="name">Year: </label>
                                        </th>
                                        <td><i class="ii"><?php echo $row['Year3']; ?></i>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label class="name">Specialization: </label>
                                        </th>
                                        <td><i class="ii"><?php echo $row['Specialization']; ?></i>

                                        </td>
                                    </tr>
                                </div>
                            </table>
                        </div>
                        <div class="panele">
                            <table class="table">
                                <div class="panel-body">
                                    <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">DESIGNATION </h3>

                                    <tr>
                                        <th><label class="name">Designation: </label>
                                        </th>
                                        <td><i class="ii"><?php echo $row['Designation']; ?></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label class="name">Associate with instute: </label>
                                        </th>
                                        <td><i class="ii"><?php echo $row['associate_Institute']; ?></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label class="name">Date on which Designated: </label></th>
                                        <td><i class="ii"><?php echo $row['Date_Prof_Asso_Prof']; ?></i></td>
                                    </tr>

                                    <tr>
                                        <th> <label class="name">Date of joining on instution: </label></th>
                                        <td> <i class="ii"><?php echo $row['date_join_instute']; ?></i></td>
                                    </tr>

                                    <tr>
                                        <th> <label class="name">Currently associated: </label></th>
                                        <td> <i class="ii"><?php echo $row['currently_asso_date_if_no']; ?></i></td>
                                    </tr>

                                    <tr>
                                        <th> <label class="name">Nature of Association:</label></th>
                                        <td><i class="ii"><?php echo $row['association']; ?></i></td>
                                    </tr>


                                </div>
                            </table>
                        </div>


                        <hr>
                        <div class="panele">
                            <table class="table">
                                <div class="panel-body">
                                    <h3 class="section-title text-primary mb-5 mb-sm-5 display-6">PAST EXPERIANCE</h3>

                                    <tr>
                                        <th><label class="name">About Detaile: </label></th>
                                        <td><i class="ii"><?php echo $row['past_experience']; ?></i></td>
                                    </tr>
                                    <br>
                                </div>
                            </table>
                        </div>
                    </div>
        </div>
<?php
                }
            }
?>
    </div>
</div>


<?php
include('include/footer.php');
?>
</div>


</div>









<?php
include('include/scripts.php');
?>