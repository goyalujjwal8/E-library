<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$con
 = mysqli_connect($server,$username,$password,$dbname);

if(!$con){
    die("connection die".mysqli_connect_error());
}


?>