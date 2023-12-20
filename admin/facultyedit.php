<?php
include('include/header.php');
include('include/navbar.php');
?>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT STAFF PROFILE </h6>
        </div>
        <div class="card-body">
            <?php

            if (isset($_POST['edit_btn'])) {
                $staff_id = $_POST['edit_id'];

                $query  = "SELECT * FROM fcprofile where staff_id = '$staff_id'";
                $query_run = mysqli_query($con, $query);

                foreach ($query_run as $row) {
            ?>

                    <form action="database\reg.php" method="POST">
                        <input type="text" hidden="true" name="id" value="<?php echo $row['staff_id']; ?>">
                        <div class="panele">
                            <div class="panel-body">
                                <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">Personal Details</h3>

                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="First_name" placeholder="Fullname with doctorate" value="<?php echo $row['name']; ?>" name="name">
                                <br>
                                <label for="faculty_id">Faculty ID</label>
                                <input type="text" class="form-control" id="posting" placeholder="Eg:**505" value="<?php echo $row['faculty_id']; ?>" readonly name="faculty_id">
                                <br>
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="PTU email" value="<?php echo $row['email']; ?>" name="email">
                                <br>
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" placeholder="Eg:+91 **.." value="<?php echo $row['phone']; ?>" name="phone">
                                <br>
                                <label for="aadhar">Aadhar Number</label>
                                <input type="text" class="form-control" id="aadhar" placeholder="Eg:0000 0000 0000 0000" value="<?php echo $row['aadhar']; ?>" name="aadhar">
                                <br>
                                <label for="pan">Pan Number</label>
                                <input type="text" class="form-control" id="pan" placeholder="Eg:34FM0AZ" value="<?php echo $row['pan']; ?>" name="pan">
                                <br>
                                <div class="col-xs-3 pull-left date">
                                    <label for="">Date of Birth</label>
                                    <input type="date" name="dob" value="<?php echo $row['dob']; ?>" class="form-control" />
                                </div>
                                <br>
                                <label for="specaliation">Specilization</label>
                                <input type="text" class="form-control" id="specaliation" placeholder="Eg:specilization" value="<?php echo $row['Specialization']; ?>" name="Specialization"></input>
                                <br>
                            </div>
                        </div>
                        <div class="panele">
                            <div class="panel-body">
                                <h3 class="section-title text-primary mb-5 mb-sm-5 display-6 ">Qualifications</h3>
                                <br><br>
                                <!-- <form class="form-horizontal"> -->
                                <label for="Last_name">UG</label>
                                <input type="text" class="form-control" id="Last_name" placeholder="Eg:degree" value="<?php echo $row['ug']; ?>" name="ug">
                                <br>
                                <label for="Last_name">UG Institution</label>
                                <input type="text" class="form-control" id="Last_name" placeholder="Eg:Institution" value="<?php echo $row['Institution1']; ?>" name="Institution1">
                                <br>
                                <label for="Last_name">Year</label>
                                <input type="text" class="form-control" id="Last_name" placeholder="Eg:day/month/year" value="<?php echo $row['Year1']; ?>" name="Year1">
                                <br>
                                <label for="Last_name">PG</label>
                                <br>
                                <input type="text" class="form-control" id="Last_name" placeholder="Eg:degree" value="<?php echo $row['pg']; ?>" name="pg">
                                <br>
                                <label for="Last_name">PG Institution</label>
                                <input type="text" class="form-control" id="Last_name" placeholder="Eg:Institution" value="<?php echo $row['Institution2']; ?>" name="Institution2">
                                <br>
                                <label for="Last_name">Year</label>
                                <input type="text" class="form-control" id="Last_name" placeholder="Eg:day/month/year" value="<?php echo $row['Year2']; ?>" name="Year2">
                                <br>
                                <label for="Last_name">P.hd</label>
                                <input type="text" class="form-control" id="Last_name" placeholder="Eg:fill all details about p.hd" value="<?php echo $row['phd']; ?>" name="phd">
                                <br><br>
                                <!-- </form> -->
                            </div>
                        </div>

                        <div class="panele">
                            <div class="panel-body">
                                <h3 class="section-title text-primary mb-5 mb-sm-5 display-6">Designation Details</h3>
                                <!-- <form class="form-horizontal"> -->
                                <label for="Your_location">Designation</label>
                                <input type="text" class="form-control" id="Your_gender" placeholder="eg: Professor/Associate prof/ HOD " value="<?php echo $row['Designation']; ?>" name="Designation">
                                <!-- </form> -->
                                <br>
                                <!-- <form class="form-horizontal"> -->
                                <label for="Associate with instute">Associate with instute</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Assoc_with_ins" id="flexRadioDefault1" value="yes">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Yes
                                    </label><br>
                                    <input class="form-check-input" type="radio" name="Assoc_with_ins" id="flexRadioDefault2" checked value="No">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        No
                                    </label>
                                </div>
                                <br>
                                <div class="form-group"> <!-- Date input -->
                                    <label for="Your_gender">Date on which Designated as Prof/ Asso_Prof</label>
                                    <input class="form-control" id="date" name="Date_Prof_Asso_Prof" placeholder="MM/DD/YYY with designation" type="text" value="<?php echo $row['Date_Prof_Asso_Prof']; ?>" />
                                </div>
                                <br>
                                <div class="col-xs-3 date" id="birth-date" name="date_join_instute">
                                    <label>Date of joining on instutions</label>
                                    <input type="date" name="date_join_instute" value="" class="form-control" />
                                </div>
                                <br>
                                
                                <label>Currently Associate With institute</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="curr_ass_with_inst" id="exampleRadios2" checked value="yes">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Yes
                                    </label><br>
                                    <input class="form-check-input" type="radio" name="curr_ass_with_inst" id="exampleRadios3" value="no">
                                    <label class="form-check-label" for="exampleRadios3">
                                        No
                                    </label>
                                    <br>
                                    <div class="form-inline" id="no" hidden="true">
                                        <label for="Your_gender">If No please enter a date</label>
                                        <input type="date" name="leave_date" value="" class="form-control" />
                                    </div>
                                </div>
                                <br>
                                <label>Association</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="association" id="associateradio1" checked value="Regular">
                                    <label class="form-check-label" for="associateradio2">
                                        Regular
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="association" id="associateradio2" value="Contract">
                                    <label class="form-check-label" for="associateradio2">
                                        Contract
                                    </label>
                                </div>
                                <!-- </form> -->
                            </div>
                        </div>
                        <hr>
                        <div class="panele">
                            <div class="panel-body">
                                <h3 class="section-title text-primary mb-5 mb-sm-5 display-6">Past Experiance</h3>

                                <label for="Last_name">Detaile Here:</label>
                                <input type="text" class="form-control" id="Last_name" placeholder="past experiance" name="past_experience" value="<?php echo $row['past_experience']; ?>"></input>
                                <br><br>
                            </div>
                        </div>


                        <button name="update" type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check update"></i> Update Profile</button>
                        <a href="tables.php" class="btn btn-danger"> CANCEL </a>
        </div>
    </div>



    </form>
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