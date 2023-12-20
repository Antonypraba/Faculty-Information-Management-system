
<?php


$con = new mysqli("localhost", "root", "", "facultys");
// scholar

if (isset($_POST['updatescholar'])) {

    $id = $_POST['id'];
    $scholar_name = $_POST['scholar_name'];
    $category = $_POST['category'];
    $Joining_Date =  date('Y-m-d', strtotime($_POST['Joining_Date']));
    $viva_date = $_POST['viva_date'];
    $area_of_research = $_POST['area_of_research'];
    $title_of_the_thesis = $_POST['title_of_the_thesis'];


    $qry = "UPDATE phd_scholars set   scholar_name='$scholar_name',category='$category',Joining_Date='$Joining_Date',viva_date='$viva_date',area_of_research='$area_of_research',title_of_the_thesis='$title_of_the_thesis' where scholar_id ='$id'";

    $query = mysqli_query($con, $qry);
 

    if ($query) {



        echo '<script>';
        echo 'alert("Scholars details Update successfully");';
        echo 'window.location.href = "http://localhost/faculty/admin/fcscholars.php";';
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}




// project

if (isset($_POST['updateproject'])) {

    $id = $_POST['id'];
    $project_title = $_POST['project_title'];
    $project_investigator = $_POST['project_investigator'];
    $sanctioned_agency = $_POST['sanctioned_agency'];
    $sanctioned_amount = $_POST['sanctioned_amount'];
    $year_of_sanctioned = $_POST['year_of_sanctioned'];
    $project_status = $_POST['project_status'];
    $duration = $_POST['duration'];






    $qry = "UPDATE projects set   project_title='$project_title',project_investigator='$project_investigator', sanctioned_agency='$sanctioned_agency',sanctioned_amount='$sanctioned_amount',year_of_sanctioned='$year_of_sanctioned',project_status='$project_status',duration='$duration' where project_id='$id'";

    $query = mysqli_query($con, $qry);

    if ($query) {



        echo '<script>';
        echo 'alert("project details Update successfully");';
        echo 'window.location.href = "http://localhost/faculty/admin/projectadmin.php";';
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}



// consultancy

if (isset($_POST['consultancyupdate'])) {

    $id = $_POST['id'];
    $Consultancy_title = $_POST['Consultancy_title'];
    $faculty_name = $_POST['faculty_name'];
    $consultancy_status = $_POST['consultancy_status'];
    $consultancy_roll = $_POST['consultancy_roll'];
    $consultancy_duration = $_POST['consultancy_duration'];
    $finincial_year = $_POST['finincial_year'];
    $client_organization =  $_POST['client_organization'];
    $recived_rupee = $_POST['recived_rupee'];
    $recived_amount = $_POST['recived_amount'];


    $qry = "UPDATE consultancy set   Consultancy_title='$Consultancy_title',faculty_name='$faculty_name',consultancy_status='$consultancy_status',consultancy_roll='$consultancy_roll',consultancy_duration='$consultancy_duration',finincial_year='$finincial_year',client_organization='$client_organization',recived_rupee='$recived_rupee',recived_amount='$recived_amount' where consultancy_id ='$id'";

    $query = mysqli_query($con, $qry);
 

    if ($query) {



        echo '<script>';
        echo 'alert("Consultancy details Update successfully");';
        echo 'window.location.href = "http://localhost/faculty/admin/consultancyview.php";';
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}


?>


