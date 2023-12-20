<?php

if (isset($_POST["emp_id"])) {

    $output = '';


    $con = mysqli_connect("localhost", "root", "", "facultys");
    $query = "SELECT * FROM fcprofile WHERE staff_id ='" . $_POST["emp_id"] . "'";
    $result = mysqli_query($con, $query);




    $output .= '  
    ';

    while ($row = mysqli_fetch_array($result)) {
        $output .= '
           <form action="database/delete.php' . $_SERVER['PHP_SELF'] . '" method="post">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <input type="int" hidden="true" name="delete_action" value="delete_staff">
    <input type="int" hidden="true" name="interaction_id" value="' . $row['staff_id'] . '">
    <button type="submit" name="registerbtn" class="btn btn-primary">Yes</button>
</form>
                    
         
    ';
    }
    $output .= "";
    echo $output;
}
