<?php
$con = new mysqli("localhost", "root", "", "facultys");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_POST['action'];

    if ($action === 'insertbook') {

        $faculty_id = $_POST['faculty_id'];
        $book_title = $_POST['book_title'];
        $book_author = $_POST['book_author'];
        $publish_details = $_POST['book_publish_details'];
        $issn_isbn = $_POST['issn_isbn'];
        $book_publication_date = $_POST['book_publication_date'];
        $book_volume = $_POST['book_volume'];
        $book_pages = $_POST['book_pages'];

        $sql = "INSERT INTO books ( faculty_id, book_title,book_publish_details,issn_isbn,book_author,book_publication_date,book_volume,book_pages) VALUES ('$faculty_id', '$book_title','$publish_details','$issn_isbn','$book_author','$book_publication_date','$book_volume','$book_pages')";

        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Record inserted successfully!");';
            echo 'window.location.href ="http://localhost/faculty/research.php";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Data Insert Failed");';
            echo 'window.location.href ="http://localhost/faculty/research.php";';
            echo '</script>';
        }
    } elseif ($action === 'insertconference') {

        $faculty_id = $_POST['faculty_id'];
        $conference_title = $_POST['conference_title'];
        $conference_author = $_POST['conference_author'];
        $conference_publication_date = $_POST['conference_publication_date'];
        $conference_volume = $_POST['conference_volume'];
        $conference_pages = $_POST['conference_pages'];
        $conference_issue = $_POST['conference_issue'];
        $conference_paper_title = $_POST['conference_paper_title'];

        $sql = "INSERT INTO conference ( faculty_id, conference_title,conference_author,conference_publication_date,conference_volume,conference_pages,conference_issue,conference_paper_title) VALUES ('$faculty_id', '$conference_title','$conference_author','$conference_publication_date','$conference_volume','$conference_pages','$conference_issue','$conference_paper_title')";

        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Record inserted successfully!");';
            echo 'window.location.href ="http://localhost/faculty/research.php";';
            echo '</script>';
        } else {


            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    } elseif ($action === 'insertpatent') {

        $faculty_id = $_POST['faculty_id'];
        $patent_application_number = $_POST['patent_application_number'];
        $patent_title = $_POST['patent_title'];
        $patent_status_of_patent = $_POST['patent_status_of_patent'];
        $patent_investor = $_POST['patent_investor'];
        $patent_applicant_name = $_POST['patent_applicant_name'];
        $patent_filed_date = $_POST['patent_filed_date'];
        $patent_published_date = $_POST['patent_published_date'];
        $patent_publication_number = $_POST['patent_publication_number'];
        $patent_assignie_name_instute     = $_POST['patent_assignie_name_instute'];
        $patent_source_of_proof = $_POST['patent_source_of_proof'];

        $sql = "INSERT INTO patent ( faculty_id, patent_application_number,patent_title,patent_status_of_patent,patent_investor,patent_applicant_name,patent_filed_date,patent_published_date,patent_publication_number,patent_assignie_name_instute,patent_source_of_proof) VALUES ('$faculty_id', '$patent_application_number','$patent_title','$patent_status_of_patent','$patent_investor','$patent_applicant_name','$patent_filed_date','$patent_published_date','$patent_publication_number','$patent_assignie_name_instute','$patent_source_of_proof')";

        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Patent inserted successfully!");';
            echo 'window.location.href ="http://localhost/faculty/research.php";';
            echo '</script>';
        }
    } elseif ($action === 'insertjournal') {

        $faculty_id = $_POST['faculty_id'];
        $journal_title = $_POST['journal_title'];
        $journal_author = $_POST['journal_author'];
        $journal_publication_date = date('Y-m-d', strtotime($_POST['journal_publication_date']));
        $journal_volume = $_POST['journal_volume'];
        $journal_pages = $_POST['journal_pages'];
        $journal_publisher = $_POST['journal_publisher'];
        $journal_issue = $_POST['journal_issue'];
        $journal_paper_title = $_POST['journal_paper_title'];

        $sql = "INSERT INTO journal ( faculty_id, journal_title,journal_author,journal_publication_date,journal_volume,journal_pages,journal_publisher,journal_issue,journal_paper_title) VALUES ('$faculty_id','$journal_title','$journal_author','$journal_publication_date','$journal_volume','$journal_pages','$journal_publisher','$journal_issue','$journal_paper_title')";

        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Record inserted successfully!");';
            echo 'window.location.href ="http://localhost/faculty/research.php";';
            echo '</script>';
        } else {
            echo "error" . $sql . "<br>" . mysqli_error($con);
        }
    } elseif ($action === 'insertproject') {

        $faculty_id = $_POST['faculty_id'];
        $project_title = $_POST['project_title'];
        $project_investigator = $_POST['project_investigator'];
        $sanctioned_agency = $_POST['sanctioned_agency'];
        $sanctioned_amount = $_POST['sanctioned_amount'];
        $year_of_sanctioned = $_POST['year_of_sanctioned'];
        $project_status = $_POST['project_status'];
        $duration = $_POST['duration'];

        $sql = "INSERT INTO projects ( faculty_id, project_title,sanctioned_agency,project_investigator,sanctioned_amount,year_of_sanctioned,project_status,duration) VALUES ('$faculty_id', '$project_title','$project_investigator','$sanctioned_agency','$sanctioned_amount','$year_of_sanctioned','$project_status','$duration')";


        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Record inserted successfully!");';
            echo 'window.location.href ="http://localhost/faculty/project.php";';
            echo '</script>';
        } else {
            echo "error" . $sql . "<br>" . mysqli_error($con);
        }
    } elseif ($action === 'insertscholar') {

        $faculty_id = $_POST['faculty_id'];
        $scholar_name = $_POST['scholar_name'];
        $category = $_POST['category'];
        $Joining_Date = $_POST['Joining_Date'];
        $viva_date = $_POST['viva_date'];
        $status = $_POST['status'];
        $area_of_research = $_POST['area_of_research'];
        $title_of_the_thesis = $_POST['title_of_the_thesis'];

        $sql = "INSERT INTO phd_scholars ( faculty_id, scholar_name,category,Joining_Date,viva_date,status,area_of_research,title_of_the_thesis) VALUES ('$faculty_id', '$scholar_name','$category','$Joining_Date','$viva_date','$status','$area_of_research','$title_of_the_thesis')";


        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Scholar Add successfully!");';
            echo 'window.location.href ="http://localhost/faculty/scholers.php";';
            echo '</script>';
        } else {
            echo "error" . $sql . "<br>" . mysqli_error($con);
        }
    } elseif ($action === 'consultancyinsert') {

        $faculty_id = $_POST['faculty_id'];
        $Consultancy_title = $_POST['Consultancy_title'];
        $faculty_name = $_POST['faculty_name'];
        $consultancy_status = $_POST['consultancy_status'];
        $consultancy_roll = $_POST['consultancy_roll'];
        $consultancy_duration = $_POST['consultancy_duration'];
        $finincial_year = $_POST['finincial_year'];
        $client_organization = $_POST['client_organization'];
        $recived_rupee = $_POST['recived_rupee'];
        $recived_amount = $_POST['recived_amount'];

        $sql = "INSERT INTO consultancy ( faculty_id, Consultancy_title,faculty_name,consultancy_status,consultancy_roll,consultancy_duration,finincial_year,client_organization,recived_rupee,recived_amount) VALUES ('$faculty_id', '$Consultancy_title','$faculty_name','$consultancy_status','$consultancy_roll','$consultancy_duration','$finincial_year','$client_organization','$recived_rupee','$recived_amount')";


        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Consultancy Add successfully!");';
            echo 'window.location.href ="http://localhost/faculty/consultancy.php";';
            echo '</script>';
        } else {
            echo "error" . $sql . "<br>" . mysqli_error($con);
        }
    }
    elseif ($action === 'interactioninsert') {

        $faculty_id = $_POST['faculty_id'];
        $interaction_details = $_POST['interaction_details'];
        $inner_outing = $_POST['inner_outing'];
        $interaction_year = $_POST['interaction_year'];

        $sql = "INSERT INTO interactions ( faculty_id, interaction_details,inner_outing,interaction_year) VALUES ('$faculty_id', '$interaction_details','$inner_outing','$interaction_year')";


        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Interactions data Add successfully!");';
            echo 'window.location.href ="http://localhost/faculty/activity.php";';
            echo '</script>';
        } else {
            echo "error" . $sql . "<br>" . mysqli_error($con);
        }
    }
    elseif ($action === 'insertcommittee') {

        $faculty_id = $_POST['faculty_id'];
        $committee_name = $_POST['committee_name'];
        $committee_year = $_POST['committee_year'];
        $committee_role = $_POST['committee_role'];

        $sql = "INSERT INTO committee ( faculty_id, committee_name,committee_year,committee_role) VALUES ('$faculty_id', '$committee_name','$committee_year','$committee_role')";


        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Committee data Add successfully!");';
            echo 'window.location.href ="http://localhost/faculty/activity.php";';
            echo '</script>';
        } else {
            echo "error" . $sql . "<br>" . mysqli_error($con);
        }
    }


    elseif ($action === 'insertcontribution') {

        $faculty_id = $_POST['faculty_id'];
        $faculty_name = $_POST['faculty_name'];
        $interaction_with_outside_world = $_POST['interaction_with_outside_world'];
        $year = $_POST['year'];


        $sql = "INSERT INTO contributions ( faculty_id, faculty_name,interaction_with_outside_world,year) VALUES ('$faculty_id', '$faculty_name','$interaction_with_outside_world','$year')";


        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("contributions data Add successfully!");';
            echo 'window.location.href ="http://localhost/faculty/activity.php";';
            echo '</script>';
        } else {
            echo "error" . $sql . "<br>" . mysqli_error($con);
        }
    }
} else {


    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
