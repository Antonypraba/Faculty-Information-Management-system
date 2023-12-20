
<?php  
//export.php  
$con = mysqli_connect("localhost", "root", "", "facultys");

if(isset($_POST['export']))
{

     $faculty_id=$_POST['faculty_id'];
     $name=$_POST['name'];
     $filename = $_POST['name']."'s_profile.xlsx"; //file name  
     header("Content-Disposition: attachment; filename=\"$filename\"");
     header("Content-Type: application/vnd.ms-excel");    

 $query = "SELECT faculty_id,name,email,phone,aadhar,pan,dob,ug,Institution1,Year1,pg,Institution2,Year2,phd,Institution3,Year3,Specialization,Designation,associate_Institute,Date_Prof_Asso_Prof,date_join_instute,currently_asso_date_if_no,association,past_experience  FROM fcprofile where faculty_id ='$faculty_id'";
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