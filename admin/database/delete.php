<?php
    $hostname="localhost"; //local server name default localhost.
    $username="root";  //mysql username default is root.
    $password="";       //blank if no password is set for mysql.
    $database="facultys";  //database name.
    $con=new mysqli($hostname,$username,$password,"facultys");

session_start();


if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM fcprofile WHERE staff_id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Selected data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: http://localhost/faculty/admin/tables.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location:http://localhost/faculty/admin/tables.php'); 
    }    
}