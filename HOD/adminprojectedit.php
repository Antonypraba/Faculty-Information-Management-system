<?php
include('include/header.php');
include('include/navbar.php');
?>

<style>

    .mainbody{
        color: #000;
    }
</style>


<?php
  

if (isset($_POST['edit_btn'])) {
    $project_id = $_POST['edit_id'];

    $query  = "SELECT * FROM projects where project_id = '$project_id'";
    $query_run = mysqli_query($con, $query);

    foreach ($query_run as $row) {
?>


        <div class="mainbody container-fluid">
            <form action="database\updateadmin.php<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="int" hidden="true" name="id" value="<?php echo $row['project_id']; ?>">
                <div class="content">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="panele">
                            <div class="panel-body">
                                <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">Edit Project's </h3>
                            
                                <label for="name">Project Title</label>
                                <input type="text" class="form-control" placeholder="" value="<?php echo $row['project_title']; ?>" name="project_title">
                                <br>
                                <label for="faculty_id">Investigator</label>
                                <input type="text" class="form-control" value="<?php echo $row['project_investigator']; ?>" name="project_investigator">
                                <br>
                                <label for="faculty_id">Sanctioned Agency</label>
                                <input type="text" class="form-control" value="<?php echo $row['sanctioned_agency']; ?>" name="sanctioned_agency">
                                <br>
                                <label for="phone">Sanctioned Amount</label>
                                <input type="text" class="form-control" value="<?php echo $row['sanctioned_amount']; ?>" name="sanctioned_amount">
                                <br>
                                <div class="col-xs-3 pull-left date">
                                    <label for="email">Year Of Sanctioned</label>
                                    <input type="year" value="<?php echo $row['year_of_sanctioned']; ?>" class="form-control" name="year_of_sanctioned">
                                </div>
                                <br>
                                <label for="aadhar">Status</label>
                                <input type="text" class="form-control" value="<?php echo $row['project_status']; ?>" name="project_status">
                                <br>
                                <label for="aadhar">Duration</label>
                                <input type="text" class="form-control" value="<?php echo $row['duration']; ?>" name="duration">
                                <br>
                                <button name="updateproject" type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check update"></i>Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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