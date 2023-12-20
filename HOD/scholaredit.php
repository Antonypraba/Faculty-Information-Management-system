<?php
include('include/header.php');
include('include/navbar.php');
?>

<style>
    .table {
        color: #000;
    }
</style>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT SCHOLAR DETAILS </h6>
        </div>
        <div class="card-body">
            <?php

            $user = $_SESSION['EMAIL'];
            $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
            $row = mysqli_fetch_array($query);
            $email = $row['email'];
            $id = $_GET["id"];
            $query1 = mysqli_query($con, "SELECT * FROM phd_scholars WHERE scholar_id = '$id'");
            $result = mysqli_num_rows($query1);
            if ($query1->num_rows > 0) {

                while ($row = $query1->fetch_assoc()) {



            ?>
                    <form action="database/updateadmin.php" method="POST" value="">
                        <input type="int" hidden="true" name="id" value="<?php echo $row['scholar_id']; ?>">

                        <div class="panele">
                            <div class="panel-body">
                                <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 "> <span class="span"> <?php echo $row['scholar_name']; ?></span></h3>
                                <label for="name">Scholar Name</label>
                                <input type="text" class="form-control" placeholder="" value="<?php echo $row['scholar_name']; ?>" required name="scholar_name">
                                <br>
                                <label for="text">Category</label>
                                <select class="form-control" value="<?php echo $row['category']; ?>" name="category">
                                    <option selected><?php echo $row['category']; ?></option>
                                    <option value="PT Internal">Part Time Internal</option>
                                    <option value="PT External">Part Time External</option>
                                    <option value="Full Time">Full Time</option>
                                    <option value="NDF">NDF</option>
                                    <option value="ADF">ADF</option>
                                    <option value="QIP">QIP</option>
                                </select>
                                <br>
                                <div class="col-xs-3 pull-left date">
                                    <label for="aadhar">Joining Date : &nbsp;&nbsp;<?php echo $row['Joining_Date']; ?></label><br>
                                    <input type="date" value="<?php echo $row['Joining_Date']; ?>" name="Joining_Date" />
                                </div>
                                <br>
                                <div class="col-xs-3 pull-left date">
                                    <label for="aadhar">Viva Date :</label><br>
                                    <input type="text" class="form-control" value="<?php echo $row['viva_date']; ?>" name="viva_date">
                                </div>
                                <br>
                                <label for="phone">Area of research</label>
                                <input type="text" class="form-control" value="<?php echo $row['area_of_research']; ?>" name="area_of_research">
                                <br>
                                <label for="aadhar">Title</label>
                                <input type="text" class="form-control" value="<?php echo $row['title_of_the_thesis']; ?>" name="title_of_the_thesis">
                                <br>
                                <button name="updatescholar" id="myButton" onclick="passValue(<?php echo $row['faculty_id']; ?>)" type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check update"></i>Update</button>

                            </div>
                        </div>
        </div>
    </div>
</div>
</div>
</form>
<?php
                    include('include/footer.php');

?>

</div>

<?php  }
            } else {

                echo '
    
    Error Occur
              ';
            } ?>

<script>
    function passValue(buttonId) {
        var nextPageUrl = '.php?id=' + encodeURIComponent(buttonId);
        window.location.href = nextPageUrl;
    }
</script>

</script>


<?php
include('include/scripts.php');
?>