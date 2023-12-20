<?php
include('include/header.php');
include('include/navbar.php');
?>

<style>
    .name {
        font-weight: bolder;
    }

    .table {
        color: #000;
    }

    .top {
        margin-left: 20px;
        margin-bottom: 20px;
        color: #000;
    }

    /* no scholar */
    .blockquote-custom {
        color: #000;
        margin-top: -200px;
        position: relative;
        font-size: 1.3rem;
        width: 650px;
        height: 100px;
        margin-left: -70px;
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

    .modal {
        border-radius: 15px;
    }
</style>




<script src="table2excel.js"></script>
<script>
    function clearFilters() {
        document.getElementById('from_date').value = '';
        document.getElementById('to_date').value = '';
        document.getElementById('faculty_id').value = '';
    }
</script>


<?php


$user = $_GET['faculty_id'];
$query = mysqli_query($con, "SELECT * FROM fcprofile WHERE faculty_id = '$user'");
$row = mysqli_fetch_array($query);
$faculty_id = $row['faculty_id'];

?>

<div class="top">
    <h3><?php echo $row['name']; ?></h3>
    <span>Committee</span>
</div>

        <section class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Filter Year</h5>

                            </div>
                            <div class="card-body">
   
                        <form id="filter_form" action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="hidden" name="faculty_id" value="<?php echo $row['faculty_id']; ?>">
                                        <label for="">From date</label>
                                        <input type="year" id="from_date" name="from_date" value="<?php if (isset($_GET['from_date'])) {
                                                                                                        echo $_GET['from_date'];
                                                                                                    }  ?>" class="form-control" placeholder="From Year">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">To date</label>
                                        <input type="year" id="to_date" name="to_date" value="<?php if (isset($_GET['to_date'])) {
                                                                                                    echo $_GET['to_date'];
                                                                                                }  ?>" class="form-control" placeholder="To Year">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Check</label><br>
                                        <button type="submit" name="sort" onclick="toggleContent()" class="btn btn-primary">Sort Data </button>
                                        <button type="submit" name="sort" id="sortdata2" onclick="clearFilters()" class="btn btn-danger">Clear</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                            </div>
                        </div>
                        <div id="content">
                    <div class="card mt-4 ">
                        <div class="card-body">
                            <button id="downloadexcel" class="btn btn-success float-right"> Export to excel</button>
                            <br><br>
                            <table class="table table-bordered table-striped" id="example-table">
                                <thead>
                                    <tr>
                                        <th>Committee Name</th>
                                        <th>Year</th> 
                                        <th>Role</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $con = mysqli_connect("localhost", "root", "", "facultys");



                                    if (isset($_GET['from_date']) && isset($_GET['to_date'])) {

                                        $faculty_id = $_GET['faculty_id'];
                                        $from_date = $_GET['from_date'];
                                        $to_date = $_GET['to_date'];
                                        $query = "SELECT * FROM  committee WHERE committee_year  BETWEEN '$from_date' AND '$to_date' AND faculty_id = '$faculty_id'  ";

                                        $result = mysqli_query($con, $query);


                                        if ($result) {

                                            while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                                <tr>
                                                    <td><?php echo $row['committee_name']; ?></td>  
                                                    <td ><?php echo $row['committee_year']; ?> </td>
                                                    <td ><?php echo $row['committee_role']; ?> </td>
                                                
                                                </tr>
                                    <?php

                                            }
                                            mysqli_free_result($result);
                                        } else {
                                            echo "no data";
                                        }
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
        </section>


<?php
$query1 = mysqli_query($con, "SELECT * FROM committee WHERE faculty_id = '$faculty_id'");
$result = mysqli_num_rows($query1);
// $row =  mysqli_fetch_all($query1);
// // echo "<script>console.log('$result')</script> ";
// // for ($i = 0; $i <= 10; $i++) {

if ($query1->num_rows > 0) {

    while ($row = $query1->fetch_assoc()) {



?>

        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class=" font-weight-bold text-primary display-6 "> COMMITTEE DETAILS </h6>
                    <!-- <form action="adminprojectedit.php" method="post">
                        <input type="hidden" name="edit_id" value="<?php echo $row['conference_id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success float-lg-right"> Edit </button>
                    </form> -->
                    <div class="card-body">
                        <div class="panele">
                            <div class="panel-body">

                                <div class="row align-items-center">
                                    <div class="proftext">
                                        <table class="table">
                                            <br>
                                            <tr>
                                                <td><label class="name">Committee Name: </label></td>
                                                <td><i class="ii"><?php echo $row['committee_name']; ?></i></td>
                                            </tr>
                                            <tr>
                                                <td><label class="name">Year: </label></td>
                                                <td> <i class="ii"><?php echo $row['committee_year']; ?></i></td>
                                            </tr>
                                            <tr>
                                                <td><label class="name">Role: </label></td>
                                                <td> <i class="ii"><?php echo $row['committee_role']; ?></i></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
                  "There is  "NO"  Committee details are available
                  <a href="index.php" class="text-info">  Home</a>."
                </p> 
              </blockquote>
           </div>
        </div>
      </div>
    </div>
  </section>
  ';
}
?><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('button[type="button"]').addEventListener('click', function() {
            clearFilters();
        });
    });
</script>
<script>
    function clearFilters() {
        document.getElementById('from_date').value = '';
        document.getElementById('to_date').value = '';
    }
</script>

<!-- for print Excel -->

<script>
    document.getElementById('downloadexcel').addEventListener('click', function() {
        var table = document.getElementById("example-table");
        var rows = table.getElementsByTagName("td");

        if (rows.length === 0) {
            alert("No data available for export.");
        } else {
            var table2excel = new Table2Excel();
            table2excel.export(document.querySelectorAll("#example-table"));
        }
    });
</script>





<?php
include('include/scripts.php');
include('include/footer.php');
?>