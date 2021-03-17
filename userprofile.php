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
 }}
 $i=0;
 ?>
  <div class="row">
    <div class="col s12 m5">
            <div class="card">
                <div class="card-image">
                  <img src="./upload/image/photo.jfif" style="background:center"><br>
                  <?php echo " <h3 style='color:orange;'>$_SESSION[name]</h3>";?>
                </div>
               <?php if (isset($_SESSION['email']) && $_SESSION['usertype'] == 0) { ?>
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
              </div> <?php }?>
          </div>
          <?php  while($i<$num){
            $in=$data[$i]['bid'];
            $q="SELECT `bookname` FROM `books` WHERE `bid` = $in ";
            $e=mysqli_query($con,$q);
            $j=mysqli_fetch_assoc($e);
            ?>
            <div class="card-content grey lighten-4">
          <div class="card" id="reading">
          <h5><a style="color: black;" href=<?php echo ("./details.php?".$in)?>><?php if($data[$i]['action']=='reading') {echo 'Reading : '.$j['bookname'];}?></a></h5>
          </div>
          <div class="card" id="wishlist">
          <h5><a style="color: black;" href=<?php echo ("./details.php?".$in)?>><?php if($data[$i]['action']=='wishlisted') {echo 'Wishlisted : '.$j['bookname'];}?></a></h5>
          </div>
          <div class="card" id="finished">
          <h5><a style="color: black;" href=<?php echo ("./details.php?".$in)?>><?php if($data[$i]['action']=='finished') {echo 'Finished : '.$j['bookname'];}?></a></h5>
          </div>
          </div>
          <?php $i++;} ?>
      </div>
  </div>
</body>
</html>