<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "facultys");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM fcprofile where faculty_id ='101'";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Name</th>  
                         <th>Address</th>  
                         <th>City</th>  
       <th>Postal Code</th>
       <th>Country</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
    <td>'.$row["name"].'</td>  
    <td>'.$row["email"].'</td>  
    <td>'.$row["phone"].'</td>  
    <td>'.$row["aadhar"].'</td>  
    <td>'.$row["pan"].'</td>    
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>