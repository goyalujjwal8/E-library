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
include "header.php";
include "conn.php";

$query = "select * from users where usertype=0";

$data = mysqli_query($con,$query);
$total = mysqli_num_rows($data);
$daa = [];
if($data->num_rows>0){
while ($row = mysqli_fetch_array($data)) {
    $daa[] = $row;
}

$i = 0;

?>
<table class="responsive-table">
       <thead>
          <tr>
              <th>User ID</th>
              <th>Name</th>
              <th>Email</th>
          </tr>
          </thead>
</table>
<?php while($i < count($daa)){ ?>
        <table class="responsive-table">
        <tbody>
          <tr>
            <td><?php echo $daa[$i]['uid'];?></td>
            <td><?php echo $daa[$i]['name'];?></td>
            <td><?php echo $daa[$i]['email'];?></td>
          </tr>
        </tbody>
      </table>
 <?php $i++; }

  }   ?>
  
</body>
</html>