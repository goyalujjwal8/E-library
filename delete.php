
    <?php
    include "conn.php";
    $in=$_SERVER['QUERY_STRING'];

    $query = "DELETE FROM `books` WHERE `bid` = $in";
    $data = mysqli_query($con,$query);
     var_dump($data);
        echo "<script>alert('Book Deleted Successfully')</script>";
        
    ?>
    <?php
    header('location: index.php');
    ?>