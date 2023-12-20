<?php
include("database/connect.php");
session_start();
if (!isset($_SESSION['USER_ID'])) {
  header("location:login.php");
  die();
}

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Research</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>



  <!------ Include the above in your HEAD tag ---------->


  <link rel="stylesheet" href="includes/footer/footer.css">
  <link rel="stylesheet" href="css/fcpedit.css">


  <style>
    .panel-body {
      margin-left: 30px;
      font-size: large;
    }

    .det_bok {
      display: grid;
      height: 100vh;
      width: 80%;
      place-items: center;


    }

    .det_conf {
      display: grid;
      height: 100vh;
      width: 80%;
      place-items: center;

    }

    .det_pat {
      display: grid;
      height: 100vh;
      width: 80%;
      place-items: center;
      margin-top: 50px;
      margin-bottom: 20rem;

    }

    .det_jour {
      display: grid;
      height: 100vh;
      width: 80%;
      place-items: center;
      margin-top: 50px;


    }

    .section-title {
      font-size: 30px;
      text-decoration: underline;
    }

    .image-wrapper {
      text-align: left;
    }

    .top {
      margin-left: 40px;
      margin-top: 40px;
    }




    .book {
      margin: 5px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      width: 23%;
      height: 26%;
      display: flex;
      margin-top: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.775);
      border-radius: 15px;

    }

    .book:hover {
      box-shadow: 0px 0px 30px 0px rgba(255, 75, 75, 0.775);
    }

    .book .container {
      padding: 2px 16px;
      text-align: center;
      min-width: 110px;
      line-height: 110px;
      height: 110px;
      display: flex;


    }

    .researchcards {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 3rem;

    }

    .researchcards .book {
      transition: .2s ease;
    }

    .researchcards .book:hover {
      -webkit-transform: rotateZ(-10deg);
      -ms-transform: rotateZ(-10deg);
      transform: rotateZ(-10deg);
      transition: .2s ease;
    }

    .footer-distributed {
      margin-top: 25rem;
      background: #585a5c !important;
      box-shadow: 10px 10px 10px 10px rgba(13, 0, 0, 0.12);
      box-sizing: border-box;
      width: 100%;
      height: 39%;
      border-top-right-radius: 20px;
      border-top-left-radius: 20px;
      text-align: left;
      font: bold 16px sans-serif;
      padding: 55px 50px;
      position: relative;
      left: 0;
      bottom: 0;

    }

    .top {
      margin-left: 40px;
      margin-top: 65px;
    }


    .ii {
      font-size: 15px;
      font-style: normal;
      margin-right: 180px;
    }
  </style>
</head>

<body>
  <?php
  include "includes/header3.php";
  ?>

  <?php
  $user = $_SESSION['UNSER_NAME'];
  $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
  $row = mysqli_fetch_array($query);
  $id = $row['email'];

  $query1 = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$id'");
  $result = mysqli_num_rows($query1);

  $row =  mysqli_fetch_array($query1)
  ?>
  <div class="top">
    <h3><?php echo $row['name']; ?></h3>
    <span>Research</span>
  </div>

  <div class="researchcards">
    <div id="book" class="book js-tilt">
      <img src="images/books.png" alt="Avatar" style="width:50% ; height:50%">
      <div class="container">
        <h4><b>Book's </b></h4>
      </div>
    </div>

    <div id="conference" style="margin-left: 40px;" class="book js-tilt">
      <img src="images/conference.png" alt="Avatar" style="width:50% ; height:50%">
      <div class="container">
        <h4><b>Conference</b></h4>
      </div>
    </div>
  </div>
  <div class="researchcards">
    <div id="Patent" class="book js-tilt">
      <img src="images/patent.png" alt="Avatar" style="width:50% ; height:70%">
      <div class="container">
        <h4><b>Patent</b></h4>
      </div>
    </div>


    <div id="Journal" style="margin-left: 40px;" class="book js-tilt">
      <img src="images/journal.png" alt="Avatar" style="width:50% ; height:50%">
      <div class="container">
        <h4><b>Journal</b></h4>
      </div>
    </div>
  </div>



  <!-- Books -->
  <?php
  $user = $_SESSION['UNSER_NAME'];
  $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
  $row = mysqli_fetch_array($query);
  $faculty_id = $row['faculty_id'];

  $query1 = mysqli_query($con, "SELECT * FROM books WHERE faculty_id = '$faculty_id'");
  $result = mysqli_num_rows($query1);


  if ($query1->num_rows > 0) {

    while ($row = $query1->fetch_assoc()) {



  ?>


      <div style="margin-left: 130px;" hidden="true" class="det_bok">
        <div class="image-wrapper">
          <div class="panele">
            <div class="panel-body">

              <a <?php echo 'href="bookinsert.php?id=' . $row['book_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-success editbutton" type="submit">New</a>
              <a <?php echo 'href="bookedit.php?id=' . $row['book_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-warning editbutton" type="submit">Edit</a>
              <button onclick="passValue('<?php echo $row['book_id']; ?>','deletebook','book_id')" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" width="50px" style="border-radius: 30px; border: transprant" name="deletebook" class="btn btn-danger editbutton" type="submit">
                Delete
              </button>
              <br>
              <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">BOOK'S</h3>
              <table class="table">
                <tr>
                  <td><label class="name">Title: </label></td>
                  <td> <i class="ii"><?php echo $row['book_title']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Author: </label></td>
                  <td> <i class="ii"><?php echo $row['book_author']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Published Details: </label></td>
                  <td> <i class="ii"><?php echo $row['book_publish_details']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">ISSN / ISBN: </label></td>
                  <td> <i class="ii"><?php echo $row['issn_isbn']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Publication Date: </label></td>

                  <td><i class="ii"><?php echo $row['book_publication_date']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Voulme: </label></td>
                  <td><i class="ii"><?php echo $row['book_volume']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Pages: </label></td>
                  <td><i class="ii"><?php echo $row['book_pages']; ?></i></td>
                </tr>
                <br><br>
              </table>
            </div>
          </div>
        </div>
      </div>
  <?php  }
  } else {
  }
  ?>

  <!-- Confrence -->

  <?php
  $user = $_SESSION['UNSER_NAME'];
  $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
  $row = mysqli_fetch_array($query);
  $faculty_id = $row['faculty_id'];

  $query1 = mysqli_query($con, "SELECT * FROM conference WHERE faculty_id = '$faculty_id'");
  $result = mysqli_num_rows($query1);


  if ($query1->num_rows > 0) {

    while ($row = $query1->fetch_assoc()) {



  ?>
      <div style="margin-left: 130px;" hidden="true" class="det_conf">
        <div class="image-wrapper">
          <div class="panele">
            <div class="panel-body">
              <!-- <form action="database/delete.php<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> -->
              <a <?php echo 'href="conferenceinsert.php?id=' . $row['conference_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-success editbutton" type="submit">New</a>
              <a <?php echo 'href="conferencedit.php?id=' . $row['conference_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-warning editbutton" type="submit">Edit</a>

              <!-- <input type="int" hidden="true" name="delete_action" value="deleteconference"> -->
              <!-- <input type="int" hidden="true" name="conference_id" value="<?php echo $row['conference_id']; ?>"> -->
              <button onclick="passValue('<?php echo $row['conference_id']; ?>','deleteconference','conference_id')" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" width="50px" style="border-radius: 30px; border: transprant" name="deletebook" class="btn btn-danger editbutton" type="submit">
                Delete
              </button> </form>

              <table class="table">
                <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">CONFERENCE</h3>
                <br>
                <tr>
                  <td><label class="name">Title: </label></td>
                  <td><i class="ii"><?php echo $row['conference_title']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Author: </label></td>
                  <td> <i class="ii"><?php echo $row['conference_author']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Publication Date: </label></td>
                  <td> <i class="ii"><?php echo $row['conference_publication_date']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Voulme: </label></td>
                  <td><i class="ii"><?php echo $row['conference_volume']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Pages: </label></td>
                  <td><i class="ii"><?php echo $row['conference_pages']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Issue: </label></td>
                  <td><i class="ii"><?php echo $row['conference_issue']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Paper Title: </label></td>
                  <td><i class="ii"><?php echo $row['conference_paper_title']; ?></i></td>
                </tr>
              </table>

            </div>
          </div>
        </div>
      </div>

  <?php  }
  } else {
  }
  ?>
  <!-- patent -->

  <?php
  $user = $_SESSION['UNSER_NAME'];
  $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
  $row = mysqli_fetch_array($query);
  $faculty_id = $row['faculty_id'];

  $query1 = mysqli_query($con, "SELECT * FROM patent WHERE faculty_id = '$faculty_id'");
  $result = mysqli_num_rows($query1);



  if ($query1->num_rows > 0) {

    while ($row = $query1->fetch_assoc()) {



  ?>
      <div style="margin-left: 130px;" hidden="true" class="det_pat">
        <div class="image-wrapper">
          <div class="panele">
            <div class="panel-body">
              <!-- <form action="database/delete.php<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> -->
              <a <?php echo 'href="patentinsert.php?id=' . $row['patent_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-success editbutton" type="submit">New</a>
              <a <?php echo 'href="patentedit.php?id=' . $row['patent_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-warning editbutton" type="submit">Edit</a>
              <!-- <input type="int" hidden="true" name="delete_action" value="deletepatent"> -->
              <!-- <input type="int" hidden="true" name="patent_id" value="<?php echo $row['patent_id']; ?>"> -->
              <button onclick="passValue('<?php echo $row['patent_id']; ?>','deletepatent','patent_id')" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" width="50px" style="border-radius: 30px; border: transprant" name="deletebook" class="btn btn-danger editbutton" type="submit">
                Delete
              </button> <!-- </form> -->
              <table class="table">
                <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">PATENT</h3>

                <tr>
                  <td> <label class="name">Title: </label></td>
                  <td> <i class="ii"><?php echo $row['patent_title']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Application number: </label></td>
                  <td> <i class="ii"><?php echo $row['patent_application_number']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Patent status: </label></td>
                  <td><i class="ii"><?php echo $row['patent_status_of_patent']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Investor: </label></td>
                  <td> <i class="ii"><?php echo $row['patent_investor']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Applicant Name: </label></td>
                  <td> <i class="ii"><?php echo $row['patent_applicant_name']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Patent Field Date: </label></td>
                  <td> <i class="ii"><?php echo $row['patent_filed_date']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Published Date: </label></td>
                  <td> <i class="ii"><?php echo $row['patent_published_date']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Publication Number: </label></td>
                  <td> <i class="ii"><?php echo $row['patent_publication_number']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Assignee name / Institute: </label></td>
                  <td><i class="ii"><?php echo $row['patent_assignie_name_instute']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Source of Proof: </label></td>
                  <td> <i class="ii"><?php echo $row['patent_source_of_proof']; ?></i></td>
                </tr>
                <br><br>
              </table>
            </div>
          </div>
        </div>
      </div>
  <?php  }
  } else {
  }
  ?>

  <!-- journal -->
  <?php
  $user = $_SESSION['UNSER_NAME'];
  $query = mysqli_query($con, "SELECT * FROM fcprofile WHERE email = '$user'");
  $row = mysqli_fetch_array($query);
  $faculty_id = $row['faculty_id'];

  $query1 = mysqli_query($con, "SELECT * FROM journal WHERE faculty_id = '$faculty_id'");
  $result = mysqli_num_rows($query1);


  if ($query1->num_rows > 0) {

    while ($row = $query1->fetch_assoc()) {



  ?>

      <div style="margin-left: 130px;" hidden="true" class="det_jour">
        <div class="image-wrapper">
          <div class="panele">
            <div class="panel-body">
              <!-- <form action="database/delete.php<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> -->
              <a <?php echo 'href="journalinsert.php?id=' . $row['journal_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-success editbutton" type="submit">New</a>
              <a <?php echo 'href="journaledit.php?id=' . $row['journal_id'] . '"'; ?> width="50px" style="border-radius: 30px;" class="btn btn-warning editbutton" type="submit">Edit</a>
              <!-- <input type="int" hidden="true" name="delete_action" value="deletejournal"> -->
              <!-- <input type="int" hidden="true" name="journal_id" value="<?php echo $row['journal_id']; ?>"> -->
              <button onclick="passValue('<?php echo $row['journal_id']; ?>','deletejournal','journal_id')" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" width="50px" style="border-radius: 30px; border: transprant" name="deletebook" class="btn btn-danger editbutton" type="submit">
                Delete
              </button> </form>

              <h3 class="section-title text-primary mb-5 mb-sm-6 display-6 ">JOURNAL</h3>
              <table class="table">
                <tr>
                  <td> <label class="name">Journal Title: </label></td>
                  <td> <i class="ii"><?php echo $row['journal_title']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Author: </label></td>
                  <td> <i class="ii"><?php echo $row['journal_author']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Publication Date: </label></td>
                  <td> <i class="ii"><?php echo $row['journal_publication_date']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Publisher: </label></td>
                  <td> <i class="ii"><?php echo $row['journal_publisher']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Volume: </label></td>
                  <td> <i class="ii"><?php echo $row['journal_volume']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Issue: </label></td>
                  <td> <i class="ii"><?php echo $row['journal_issue']; ?></i></td>
                </tr>
                <tr>
                  <td> <label class="name">Pages: </label></td>
                  <td> <i class="ii"><?php echo $row['journal_pages']; ?></i></td>
                </tr>
                <tr>
                  <td><label class="name">Paper Title: </label></td>
                  <td> <i class="ii"><?php echo $row['journal_paper_title']; ?></i></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
  <?php  }
  } else {
  }
  ?>


  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Scholar Details </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>


        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">

        </div>

      </div>
    </div>
  </div>

  <?php

  include "includes/footer/footer.php";

  ?>



  <!--delete Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Data ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are You sure you want to delete this ?
        </div>
        <div class="modal-footer">
          <form action="database/delete.php<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" hidden id="inputField2" name="delete_action" value="">
            <input type="text" hidden name="" value="" id="inputField">
            <button name="deletebook" class="btn btn-danger" type="submit"> Yes Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    function passValue(value, value2, value3) {
      var input = document.getElementById('inputField');
      var input2 = document.getElementById('inputField2');
      var input3 = document.getElementById('inputField');
      input.value = value;
      input2.value = value2;
      input3.name = value3;
    }
  </script>




  <script>
    $(document).ready(function() {
      $('#book').click(function() {

        $('.det_bok').toggle();
      });
      $('#book').click(function() {

        $('#conference').toggle();
        $('#Journal').toggle();
        $('#Patent').toggle();

      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#conference').click(function() {

        $('.det_conf').toggle();
      });
      $('#conference').click(function() {

        $('#book').toggle();
        $('#Journal').toggle();
        $('#Patent').toggle();

      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#Journal').click(function() {

        $('.det_jour').toggle();
      });
      $('#Journal').click(function() {

        $('#book').toggle();
        $('#conference').toggle();
        $('#Patent').toggle();

      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#Patent').click(function() {

        $('.det_pat').toggle();
      });
      $('#Patent').click(function() {

        $('#book').toggle();
        $('#conference').toggle();
        $('#Journal').toggle();

      });
    });
  </script>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</body>

</html>