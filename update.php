<?php session_start();
    include "conn.php";
   // include "header.php";
    $in=$_SERVER['QUERY_STRING'];

    $query = "UPDATE `has_book` SET `action`='finished' WHERE `uid`='$_SESSION[uid]' && `bid`='$in'";
    $data = mysqli_query($con,$query);
     
    $con->close();
    header('location: userprofile.php');
 ?>
  