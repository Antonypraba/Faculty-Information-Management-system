
    <?php
    $hostname="localhost"; //local server name default localhost.
    $username="root";  //mysql username default is root.
    $password="";       //blank if no password is set for mysql.
    $database="facultys";  //database name.
    $con=new mysqli($hostname,$username,$password,"facultys");
    if(!$con)
    {
    die('Connection Failed');
    }else {
      echo "";
    }


    ?>
