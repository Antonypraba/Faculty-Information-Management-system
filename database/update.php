<?php


$con = new mysqli("localhost", "root", "", "facultys");
if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $faculty_id = $_POST['faculty_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = date('Y-m-d', strtotime($_POST['dob']));
    $aadhar = $_POST['aadhar'];
    $pan = $_POST['pan'];
    $Assoc_with_ins = $_POST['Assoc_with_ins'];
    $Designation = $_POST['Designation'];
    $Date_Prof_Asso_Prof = $_POST['Date_Prof_Asso_Prof'];
    $date_join_instute = date('Y-m-d', strtotime($_POST['date_join_instute']));
    $Specialization = $_POST['Specialization'];
    $curr_ass_with_inst = $_POST['curr_ass_with_inst'];
    $association = $_POST['association'];
    $ug = $_POST['ug'];
    $Institution1 = $_POST['Institution1'];
    $Year1 = $_POST['Year1'];
    $pg = $_POST['pg'];
    $Institution2 = $_POST['Institution2'];
    $Year2 = $_POST['Year2'];
    $phd = $_POST['phd'];
    $Institution3 = $_POST['Institution3'];
    $Year3 = $_POST['Year3'];
    $past_experience = $_POST['past_experience'];




    $qry = "UPDATE fcprofile set  faculty_id='$faculty_id', name='$name', phone='$phone',email='$email', dob='$dob', aadhar='$aadhar',pan='$pan',associate_Institute='$Assoc_with_ins',Designation='$Designation',Date_Prof_Asso_Prof='$Date_Prof_Asso_Prof',date_join_instute='$date_join_instute', Specialization='$Specialization',currently_asso_date_if_no='$curr_ass_with_inst',association='$association',ug='$ug',Institution1='$Institution1',Year1='$Year1',pg='$pg',Institution2='$Institution2',Year2='$Year2',phd='$phd',Institution3='$Institution3',Year3='$Year3',past_experience='$past_experience' where staff_id='$id'";

    $query = mysqli_query($con, $qry);

    if ($query) {

        
        echo '<script>';
        echo 'alert("Profile Update successfully");';
        echo 'window.location.href = "http://localhost/faculty/facultyprofile.php";';
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}


// update for book

if (isset($_POST['updatebook'])) {

    $id = $_POST['id'];
    $book_title = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $book_publish_details = $_POST['book_publish_details'];
    $issn_isbn = $_POST['issn_isbn'];
    $book_publication_date = $_POST['book_publication_date'];
    $book_volume = $_POST['book_volume'];
    $book_pages = $_POST['book_pages'];





    $qry = "UPDATE books set  book_title='$book_title', book_author='$book_author',book_publish_details='$book_publish_details',issn_isbn='$issn_isbn', book_publication_date='$book_publication_date', book_volume='$book_volume', book_pages='$book_pages' where book_id='$id'";

    $query = mysqli_query($con, $qry);

    if ($query) {



        echo '<script>';
        echo 'alert("Book Update successfully");';
        echo 'window.location.href = "http://localhost/faculty/research.php";';
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}


// update conference


if (isset($_POST['updateconference'])) {

    $id = $_POST['id'];
    $conference_title = $_POST['conference_title'];
    $conference_author = $_POST['conference_author'];
    $conference_publication_date = $_POST['conference_publication_date'];
    $conference_volume = $_POST['conference_volume'];
    $conference_pages = $_POST['conference_pages'];
    $conference_issue = $_POST['conference_issue'];
    $conference_paper_title = $_POST['conference_paper_title'];





    $qry = "UPDATE conference set  conference_title='$conference_title', conference_author='$conference_author', conference_publication_date='$conference_publication_date', conference_volume='$conference_volume', conference_pages='$conference_pages',conference_issue='$conference_issue',conference_paper_title='$conference_paper_title' where conference_id='$id'";

    $query = mysqli_query($con, $qry);

    if ($query) {



        echo '<script>';
        echo 'alert("Conference details Update successfully");';
        echo 'window.location.href = "http://localhost/faculty/research.php";';
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}


// update Patent


if (isset($_POST['updatepatent'])) {

    $id = $_POST['id'];
    $patent_application_number = $_POST['patent_application_number'];
    $patent_title = $_POST['patent_title'];
    $patent_status_of_patent = $_POST['patent_status_of_patent'];
    $patent_investor = $_POST['patent_investor'];
    $patent_applicant_name = $_POST['patent_applicant_name'];
    $patent_filed_date = $_POST['patent_filed_date'];
    $patent_published_date = $_POST['patent_published_date'];
    $patent_publication_number = $_POST['patent_publication_number'];
    $patent_assignie_name_instute = $_POST['patent_assignie_name_instute'];
    $patent_source_of_proof = $_POST['patent_source_of_proof'];





    $qry = "UPDATE patent set  patent_application_number='$patent_application_number', patent_title='$patent_title', patent_status_of_patent='$patent_status_of_patent', patent_investor='$patent_investor', patent_applicant_name='$patent_applicant_name',patent_filed_date='$patent_filed_date',patent_published_date='$patent_published_date',patent_publication_number='$patent_publication_number',patent_assignie_name_instute='$patent_assignie_name_instute',patent_source_of_proof='$patent_source_of_proof' where patent_id='$id'";

    $query = mysqli_query($con, $qry);

    if ($query) {



        echo '<script>';
        echo 'alert("Patent details Update successfully");';
        echo 'window.location.href = "http://localhost/faculty/research.php";';
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}



// journal

if (isset($_POST['updatejournal'])) {

    $id = $_POST['id'];
    $journal_title = $_POST['journal_title'];
    $journal_author = $_POST['journal_author'];
    $journal_publication_date = $_POST['journal_publication_date'];
    $journal_volume = $_POST['journal_volume'];
    $journal_pages = $_POST['journal_pages'];
    $journal_publisher = $_POST['journal_publisher'];
    $journal_issue = $_POST['journal_issue'];
    $journal_paper_title = $_POST['journal_paper_title'];





    $qry = "UPDATE journal set   journal_title='$journal_title',journal_author='$journal_author',journal_publication_date='$journal_publication_date',journal_volume='$journal_volume',journal_pages='$journal_pages',journal_publisher='$journal_publisher',journal_issue='$journal_issue',journal_paper_title='$journal_paper_title' where journal_id='$id'";

    $query = mysqli_query($con, $qry);

    if ($query) {



        echo '<script>';
        echo 'alert("journal details Update successfully");';
        echo 'window.location.href = "http://localhost/faculty/research.php";';
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
        echo 'window.location.href = "http://localhost/faculty/project.php";';
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}


// scholar

if (isset($_POST['updatescholar'])) {

    $id = $_POST['id'];
    $scholar_name = $_POST['scholar_name'];
    $category = $_POST['category'];
    $Joining_Date =  date('Y-m-d', strtotime($_POST['Joining_Date']));
    $viva_date = $_POST['viva_date'];
    $status = $_POST['status'];
    $area_of_research = $_POST['area_of_research'];
    $title_of_the_thesis = $_POST['title_of_the_thesis'];


    $qry = "UPDATE phd_scholars set   scholar_name='$scholar_name',category='$category',Joining_Date='$Joining_Date',viva_date='$viva_date',status='$status',area_of_research='$area_of_research',title_of_the_thesis='$title_of_the_thesis' where scholar_id ='$id'";

    $query = mysqli_query($con, $qry);
 

    if ($query) {



        echo '<script>';
        echo 'alert("Scholars details Update successfully");';
        echo 'window.location.href = "http://localhost/faculty/scholers.php";';
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
        echo 'window.location.href = "http://localhost/faculty/consultancy.php";';
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}



// interaction

if (isset($_POST['updateinteraction'])) {

    $id = $_POST['id'];
    $interaction_details = $_POST['interaction_details'];
    $inner_outing = $_POST['inner_outing'];
    $interaction_year = $_POST['interaction_year'];
   


    $qry = "UPDATE interactions set   interaction_details='$interaction_details',inner_outing='$inner_outing',interaction_year='$interaction_year' where interaction_id ='$id'";

    $query = mysqli_query($con, $qry);
 

    if ($query) {



        echo '<script>';
        echo 'alert("Interaction details Update successfully");';
        echo 'window.location.href = "http://localhost/faculty/activity.php";';
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}





// committee

if (isset($_POST['updatecommittee'])) {

    $id = $_POST['id'];
    $committee_name = $_POST['committee_name'];
    $committee_year = $_POST['committee_year'];
    $committee_role = $_POST['committee_role'];
   


    $qry = "UPDATE committee set   committee_name='$committee_name',committee_year='$committee_year',committee_role='$committee_role' where committee_id ='$id'";

    $query = mysqli_query($con, $qry);
 

    if ($query) {



        echo '<script>';
        echo 'alert("Committee details Update successfully");';
        echo 'window.location.href = "http://localhost/faculty/activity.php";';
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}




// contributions

if (isset($_POST['updatecontribution'])) {

    $id = $_POST['id'];
    $faculty_name = $_POST['faculty_name'];
    $interaction_with_outside_world = $_POST['interaction_with_outside_world'];
    $year = $_POST['year'];

   

    $qry = "UPDATE contributions set   faculty_name='$faculty_name',interaction_with_outside_world='$interaction_with_outside_world',year='$year' where contribution_id ='$id'";

    $query = mysqli_query($con, $qry);
 

    if ($query) {



        echo '<script>';
        echo 'alert("contributions  details Update successfully");';
        echo 'window.location.href = "http://localhost/faculty/activity.php";';
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}
