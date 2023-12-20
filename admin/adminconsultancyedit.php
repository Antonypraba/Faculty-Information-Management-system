<?php
include('include/header.php');
include('include/navbar.php');
?>

<style>
    .mainbody {
        color: #000;
    }
</style>


<?php


if (isset($_POST['edit_btn'])) {
    $project_id = $_POST['edit_id'];

    $query  = "SELECT * FROM Consultancy where consultancy_id = '$project_id'";
    $query_run = mysqli_query($con, $query);

    foreach ($query_run as $row) {
?>



        <div class="mainbody container-fluid">
            <form action="database\updateadmin.php" method="POST" value="">
                <input type="int" hidden="true" name="id" value="<?php echo $row['consultancy_id']; ?>">
                <div class="content">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="panele">
                            <div class="panel-body">
                                <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">Add Consultancy</h3>
                                
                                <label for="name">Title of Consultancy project</label>
                                <input type="text" class="form-control" id="First_name" placeholder="" value="<?php echo $row['Consultancy_title']; ?>" required name="Consultancy_title">
                                <br>
                                <label for="faculty_id">Name of faculty (Chief Consultant)</label>
                                <input type="text" class="form-control" id="posting" value="<?php echo $row['faculty_name']; ?>" name="faculty_name">
                                <br>
                                <label for="faculty_id">Status</label>
                                <input type="text" class="form-control" id="posting" value="<?php echo $row['consultancy_status']; ?>" name="consultancy_status">
                                <br>
                                <label for="faculty_id">Roll</label>
                                <input type="text" class="form-control" id="posting" value="<?php echo $row['consultancy_roll']; ?>" name="consultancy_roll">
                                <br>
                                <label for="faculty_id">Duration</label>
                                <input type="text" class="form-control" id="posting" value="<?php echo $row['consultancy_duration']; ?>" name="consultancy_duration">
                                <br>
                                <label for="email">Financial Year</label>
                                <input type="text" class="form-control" name="finincial_year" value="<?php echo $row['finincial_year']; ?>" placeholder="eg: 1998" />

                                <br>
                                <label for="phone">Client Organization </label>
                                <input type="text" class="form-control" id="phone" value="<?php echo $row['client_organization']; ?>" name="client_organization">
                                <br>
                                <label for="aadhar">Amount received rupee (₹)</label>
                                <input type="text" class="form-control" id="aadhar" value="<?php echo $row['recived_rupee']; ?>" name="recived_rupee">
                                <br>
                                <label for="aadhar">Amount received word</label>
                                <input type="text" class="form-control" id="aadhar" value="<?php echo $row['recived_amount']; ?>" name="recived_amount">
                                <br>
                                <button name="consultancyupdate" type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check update"></i>Update</button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
<?php  }
} else {

    echo '
    <div style="margin-left: 130px;">
    <div class="image-wrapper">
      <div class="panele">
        <div class="panel-body">
          <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">Theres NO Data available</h3>
          <br><br>
        </div>
      </div>
    </div>
  </div>  
              ';
}
?>




<?php
include('include/scripts.php');
include('include/footer.php');
?>