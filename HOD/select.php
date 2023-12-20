<?php

if (isset($_POST["emp_id"])) {
    $output = '';


    $con = mysqli_connect("localhost", "root", "", "facultys");
    $query = "SELECT * FROM phd_scholars WHERE scholar_id ='". $_POST["emp_id"]."'";
    $result = mysqli_query($con, $query);

    $output .= '  
    <div class="table-responsive">  
         <table class="table table-bordered">';

    while ($row = mysqli_fetch_array($result)) {
        $output .= '
         <tr>
         <td width="30%" ><b><lable>Name</lable><b/></td>
         <td width="70%" >' . $row["scholar_name"] . '</td>
         </tr>
         <tr>
         <td width="30%" ><b><lable>Category<b/></lable></td>
         <td width="70%" >' . $row["category"] . '</td>
         </tr>
         <tr>
         <td width="30%" ><b><lable>Joining Date<b/></lable></td>
         <td width="70%" >' . $row["Joining_Date"] . '</td>
         </tr>
         <tr>
         <td width="30%" ><b><lable>Viva Date<b/></lable></td>
         <td width="70%" >' . $row["viva_date"] . '</td>
         </tr>
         <tr>
         <td width="10%" ><b><lable>Area of Research<b/></lable></td>
         <td width="30%" >' . $row["area_of_research"] . '</td>
         </tr>

         <tr>
         <td width="10%" ><b><lable>Title of Thesis</b></lable></td>
         <td width="30%" >' . $row["title_of_the_thesis"] . '</td>
         </tr>
    ';
    }
    $output .= "</table></div>";
    echo $output;
}
