<?php
    include "conn.php";
    $in=$_SERVER['QUERY_STRING'];

    $query = "DELETE FROM `users` WHERE `uid` = $in";
    $data = mysqli_query($con,$query);
     
        header('location: adminlist.php');   
    $con->close();
?>
