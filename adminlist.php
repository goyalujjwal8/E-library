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

$query = "select * from users where usertype=1";

$data = mysqli_query($con,$query);
$total = mysqli_num_rows($data);
$daa = [];
if($data->num_rows>0){
while ($row = mysqli_fetch_array($data)) {
    $daa[] = $row;
}
echo "  <div class='Container'>";
$i = 0;

?>
<table class="responsive-table">
       <thead>
          <tr>
              <th>Admin ID</th>
              <th>Name</th>
              <th>Email</th>
              <th></th>
          </tr>
       </thead>
       
      
       
        <tbody>
        <?php while($i < count($daa)){ ?>
          <tr>
            <td><?php echo $daa[$i]['uid'];?></td>
            <td><?php echo $daa[$i]['name'];?></td>
            <td><?php echo $daa[$i]['email'];?></td>
            <?php if($_SESSION['email']!=$daa[$i]['email']){?>
            <td><a href='deleteadmin.php?<?php echo $daa[$i]['uid']?>' class='modal-close waves-effect waves-green btn-flat' style="background-color: red;">Delete Admin</a></td>
              <?php }?>
          </tr>
          <?php $i++;}?>
        </tbody>
      </table>
 <?php 
 echo "<ul><li><a href='adminform.php' style='background-color:orange;' class='btn waves-effect waves-light'>Add New Admin<i class='material-icons right'>send</i></a></li></ul>
 </div>";
  }   ?>
  
</body>
</html>