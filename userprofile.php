<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library</title><link rel="shortcut icon" href="./image/download.png" type="image/x-icon">
</head>
<body>
<?php
include "header.php";
include "conn.php";
if ((isset($_SESSION['email']) && $_SESSION['usertype']==1)||(isset($_SESSION['email']) && $_SESSION['usertype']==0)){
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

 ?>
 <div>
  <div class="row">
    <div class="col s12 m6">
            <div class="card">
                <div class="card-image">
                  <img src="./upload/image/photo.jfif" style="background:center"><br>
                  <?php echo " <h3 style='color:orange;'>$_SESSION[name]</h3>";?>
                </div>
                <div class="card-tabs">
                  <nav style="background-color: orange;">
                      
                 </nav>
              </div> 
          </div>
    </div>
    <div class="col s12 m6">
            <div class="card-content grey lighten-4">
          <div class="card" id="reading">
          <h5 style="color: orange;">Reading : </h5>
          <?php  $i=0;  while($i<$num){
            $in=$data[$i]['bid'];
            $q="SELECT `bookname` FROM `books` WHERE `bid` = $in ";
            $e=mysqli_query($con,$q);
            $j=mysqli_fetch_assoc($e);
            ?>
          <h5><a style="color: black;" href=<?php echo ("./details.php?".$in)?>><?php if($data[$i]['action']=='reading') {echo $j['bookname'] ?></a> 
            
             <button data-target='modal1' class='btn modal-trigger' style='background-color: red;'>Finished</button>
                <div id='modal1' class='modal'>
                  <div class='modal-content'>
                    <h4>Are You Sure?</h4>
                    <p>You Have Finished the Book</p>
                  </div>
                  <div class='modal-footer'>
                    <a href='<?php echo ("./update.php?".$in)?>' class='modal-close waves-effect waves-green btn-flat'>Yes</a>
                    <a href='#' class='modal-close waves-effect waves-green btn-flat'>No</a>
                  </div>
                </div>
            <?php ;}?></h5>


          <?php $i++;} ?>
          </div>
          
          <div class="card" id="wishlist">
          <h5 style="color: orange;">Wishlisted : </h5>
          <?php $i=0;  while($i<$num){
            $in=$data[$i]['bid'];
            $q="SELECT `bookname` FROM `books` WHERE `bid` = $in ";
            $e=mysqli_query($con,$q);
            $j=mysqli_fetch_assoc($e);
            ?>
          <h5><a style="color: black;" href=<?php echo ("./details.php?".$in)?>><?php if($data[$i]['action']=='wishlisted') {echo $j['bookname'];}?></a></h5>
          <?php $i++;} ?>
          </div>
          <div class="card" id="finished">
          <h5 style="color: orange;">Finished : </h5>
          <?php $i=0;  while($i<$num){
            $in=$data[$i]['bid'];
            $q="SELECT `bookname` FROM `books` WHERE `bid` = $in ";
            $e=mysqli_query($con,$q);
            $j=mysqli_fetch_assoc($e);
            ?>
          <h5><a style="color: black;" href=<?php echo ("./details.php?".$in)?>><?php if($data[$i]['action']=='finished') {echo $j['bookname'];}?></a></h5>
          <?php $i++;} ?>
          </div>
          </div>
          </div>
      </div>
  </div>
  <?php } else{header("location: error.php");}?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal1');
    var instances = M.Modal.init(elems, options);
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {});
  });
  </script>
</body>
</html>