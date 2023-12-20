
<?php  
//export.php  
$con = mysqli_connect("localhost", "root", "", "facultys");

if(isset($_POST['export']))
{

     $faculty_id=$_POST['faculty_id'];
     $name=$_POST['name'];
     $filename = $_POST['name']."'s_Scholars.xlsx"; //file name  
     header("Content-Disposition: attachment; filename=\"$filename\"");
     header("Content-Type: application/vnd.ms-excel");    

 $query = "SELECT prof_name,scholar_name,category,Joining_Date,viva_date,area_of_research,title_of_the_thesis FROM phd_scholars where faculty_id ='$faculty_id'";
 $result = mysqli_query($con, $query);

 if (mysqli_num_rows($result) > 0 ) {
    
     $heading = false;
     while ($row = mysqli_fetch_assoc($result)) 
     {
         if (!$heading) {
          
          echo implode("\t", array_keys($row))."\r\n";
          $heading = true;
         }
         echo implode("\t",array_values($row))."\r\n";
     }

}

}
?>