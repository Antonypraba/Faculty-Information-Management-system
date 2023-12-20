<?php
$con = new mysqli("localhost", "root", "", "facultys");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $deleteAction = $_POST['delete_action'];


    if ($deleteAction === 'deletebook') {

        $book_id = $_POST['book_id'];

        $sql = "DELETE FROM books WHERE book_id = '$book_id'";

        // Execute the SQL statement
        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Record deleted successfully!");';
            echo 'window.location.href ="http://localhost/faculty/research.php";';
            echo '</script>';
        }
    } elseif ($deleteAction === 'deleteconference') {

        $conference_id = $_POST['conference_id'];

        $sql = "DELETE FROM conference WHERE conference_id = '$conference_id'";

        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Record deleted successfully!");';
            echo 'window.location.href ="http://localhost/faculty/research.php";';
            echo '
</script>';
        }
    } 
    elseif ($deleteAction === 'deletepatent') {
        $patent_id = $_POST['patent_id'];

        $sql = "DELETE FROM patent WHERE patent_id = '$patent_id'";

        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Record deleted successfully!");';
            echo 'window.location.href ="http://localhost/faculty/research.php";';
            echo '
</script>';
        }
    }
    elseif ($deleteAction === 'deletejournal') {
        $journal_id = $_POST['journal_id'];

        $sql = "DELETE FROM journal WHERE journal_id = '$journal_id'";

        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Record deleted successfully!");';
            echo 'window.location.href ="http://localhost/faculty/research.php";';
            echo '
</script>';
        }
    } elseif ($deleteAction === 'deleteproject') {
        $project_id = $_POST['project_id'];

        $sql = "DELETE FROM projects WHERE project_id = '$project_id'";

        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Project deleted successfully!");';
            echo 'window.location.href ="http://localhost/faculty/project.php";';
            echo '
</script>';
        }
    }
    elseif ($deleteAction === 'deletescholar') {

        $scholar_id = $_POST['scholar_id'];
      

        $sql = "DELETE FROM phd_scholars WHERE scholar_id = '$scholar_id'";

        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Scholar deleted successfully!");';
            echo 'window.location.href ="http://localhost/faculty/scholers.php";';
            echo '
</script>';

        }else{
    echo "error";
        }
    }

    elseif ($deleteAction === 'deleteconsultancy') {

        $consultancy_id = $_POST['consultancy_id'];
      

        $sql = "DELETE FROM consultancy WHERE consultancy_id = '$consultancy_id'";

        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("consultancy data deleted successfully!");';
            echo 'window.location.href ="http://localhost/faculty/consultancy.php";';
            echo '
</script>';

        }else{
    echo "error";
        }
    }
    elseif ($deleteAction === 'deleteinteraction') {

        $interaction_id = $_POST['interaction_id'];
      

        $sql = "DELETE FROM interactions WHERE interaction_id = '$interaction_id'";

        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("interaction data deleted successfully!");';
            echo 'window.location.href ="http://localhost/faculty/activity.php";';
            echo '
</script>';

        }else{
    echo "error";
        }
    }

    elseif ($deleteAction === 'deletecommittee') {

        $committee_id = $_POST['committee_id'];
      

        $sql = "DELETE FROM committee WHERE committee_id = '$committee_id'";

        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("committee data deleted successfully!");';
            echo 'window.location.href ="http://localhost/faculty/activity.php";';
            echo '
</script>';

        }else{
    echo "error";
        }
    }
    elseif ($deleteAction === 'deletecontribution') {

        $contribution_id = $_POST['contribution_id'];
      

        $sql = "DELETE FROM contributions WHERE contribution_id = '$contribution_id'";

        if (mysqli_query($con, $sql)) {

            echo '<script>';
            echo 'alert("Contribution data deleted successfully!");';
            echo 'window.location.href ="http://localhost/faculty/activity.php";';
            echo '
</script>';

        }else{
    echo "error";
        }
    }
}else {

    echo "Invalid delete action!";
}
?>
























