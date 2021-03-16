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

$query="select * from has_book where uid='$_SESSION[uid]'";
//var_dump($query);
$run=mysqli_query($con,$query);
//var_dump($run);
$num=mysqli_num_rows($run);
//var_dump($num);
$data=[];
if($num>0){
 while( $row=mysqli_fetch_array($run)){
   $data[]=$row;
 }
 $i=0;
?>
<div class="Container">
  <div class="row">
    <div class="col s5">
            <div class="card">
                <div class="card-content" style="background-color: grey;">
                  <img src="./upload/image/photo.jfif" style="background:center"><br>
                  <?php echo " <h3 style='color:orange;'>$_SESSION[name]</h3>";?>
                </div>
                <div class="card-tabs">
                  <nav>
                      <div class="nav-wrapper">
                        <div class="col s12" style="background-color: orange;">
                          <a href="#reading" class="breadcrumb">Reading</a>
                          <a href="#wishlist" class="breadcrumb">Wishlist</a>
                          <a href="#finished" class="breadcrumb">Finished</a>
                        </div>
                      </div>
                 </nav>
              </div>
          </div>
          <?php  while($i<$num){?>
            <div class="card-content grey lighten-4">
          <div class="card" id="reading">
          <h3><?php if($data[$i]['action']=='reading') {echo 'Reading : '.$data[$i]['bid'];}?></h3>
          </div>
          <div class="card" id="wishlist">
          <h3><?php if($data[$i]['action']=='wishlisted') {echo 'Wishlisted : '.$data[$i]['bid'];}?></h3>
          </div>
          <div class="card" id="finished">
          <h3><?php if($data[$i]['action']=='finished') {echo 'Finished : '.$data[$i]['bid'];}?></h3>
          </div>
          </div>
          <?php $i++;} } ?>
      </div>
  </div>
</div>
</body>
</html>
