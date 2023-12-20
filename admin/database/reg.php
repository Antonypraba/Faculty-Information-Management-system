<?php

session_start();

$hostname="localhost"; //local server name default localhost.
$username="root";  //mysql username default is root.
$password="";       //blank if no password is set for mysql.
$database="facultys";  //database name.
$con = new mysqli($hostname,$username,$password,"facultys");

if(isset($_POST['registerbtn']))
{
    $faculty_id = $_POST['faculty_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $Designation = $_POST['Designation'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = "SELECT * FROM fcprofile WHERE email='$email' ";
    $email_query_run = mysqli_query($con, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location:http://localhost/faculty/admin/tables.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO fcprofile (faculty_id,name,email,Designation,password) VALUES ('$faculty_id','$name','$email','$Designation','$password')";
            $query1 = mysqli_query($con, $query);
        

            if($query1)
            {
                // echo "Saved";
                $_SESSION['status'] = "New Faculty Added"; 
                header('Location:http://localhost/faculty/admin/tables.php');
            }
            else 
            {
                $_SESSION['status'] = "Faculty Profile Not Added"; 
                
                // header('Location:http://localhost/faculty/admin/tables.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
           
            header('Location:http://localhost/faculty/admin/tables.php');  
        }
    }

}

// staff profile update
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
    $past_experience = $_POST['past_experience'];




    $qry = "UPDATE fcprofile set  faculty_id='$faculty_id', name='$name', phone='$phone',email='$email', dob='$dob', aadhar='$aadhar',pan='$pan',associate_Institute='$Assoc_with_ins',Designation='$Designation',Date_Prof_Asso_Prof='$Date_Prof_Asso_Prof',date_join_instute='$date_join_instute', Specialization='$Specialization',currently_asso_date_if_no='$curr_ass_with_inst',association='$association',ug='$ug',Institution1='$Institution1',Year1='$Year1',pg='$pg',Institution2='$Institution2',Year2='$Year2',phd='$phd',past_experience='$past_experience' where staff_id='$id'";

    $query = mysqli_query($con, $qry);

    if ($query) {

        
        echo '<script>';
        echo 'alert("Profile Update successfully");';
        echo 'window.location.href = "http://localhost/faculty/admin/tables.php";';
        echo '</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}
?>