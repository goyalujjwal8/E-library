<?php
    include "conn.php";
    $in=$_SERVER['QUERY_STRING'];

    $query = "DELETE FROM `users` WHERE `uid` = $in";
    $data = mysqli_query($con,$query);
     
        echo "<script>alert('User Deleted Successfully')</script>";
        header('location: userlist.php');
  
     
    $con->close();
    ?>