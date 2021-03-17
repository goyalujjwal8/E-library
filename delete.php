<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "conn.php";
    $in=$_SERVER['QUERY_STRING'];

    $query = "DELETE FROM `books` WHERE `bid` = $in";
    $data = mysqli_query($con,$query);
     
        echo "<script>alert('Book Deleted Successfully')</script>";
        header('location: index.php');
  
     
    $con->close();
    ?>
</body>
</html>