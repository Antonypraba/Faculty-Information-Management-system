<?php

if (isset($_POST["emp_id"])) {
    $output = '';


    $con = mysqli_connect("localhost", "root", "", "facultys");
    $query = "SELECT * FROM phd_scholars WHERE scholar_id ='" . $_POST["emp_id"] . "'";
    $result = mysqli_query($con, $query);




    $output .= '  
    ';

    while ($row = mysqli_fetch_array($result)) {
        $output .= '
        <form action="database/delete.php" method="post">
                        <input type="int" hidden="true" name="delete_action" value="deletescholar">
                        <input type="int" hidden="true" name="scholar_id" value="' . $row["scholar_id"] . '">
                        <button width="50px" style="border-radius: 5px;" name="deletescholar" class="btn btn-danger" type="submit">Delete</button>
                        <a  href="editscholars.php?id=' . $row['scholar_id'] . ' width="50px" style="border-radius: 5px;" name="deletescholar" class="btn btn-success" type="submit">Edit</a>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                  
                        </form>
                    
         
    ';
    }
    $output .= "";
    echo $output;
}
