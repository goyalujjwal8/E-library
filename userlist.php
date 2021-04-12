
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
    if ((isset($_SESSION['email']) && $_SESSION['usertype']==1)){
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
              <th>User Response</th>
          </tr>
          </thead>
        <tbody>
        <?php while($i < count($daa)){ ?>
          <tr>
            <td><?php echo $daa[$i]['uid'];?></td>
            <td><?php echo $daa[$i]['name'];?></td>
            <td><?php echo $daa[$i]['email'];?></td>
            <td>
            <?php
              $int=$daa[$i]['uid'];
              $quer="select * from has_book where uid='$int'";
              $run=mysqli_query($con,$quer);
              $num=mysqli_num_rows($run);
              $dat=[];
              if($num>0){
                while( $rows=mysqli_fetch_array($run)){
                  $dat[]=$rows;
                }}
              $k=0;
                while($k<$num){
                $in=$dat[$k]['bid'];
                $q="SELECT `bookname` FROM `books` WHERE `bid` = $in ";
                $e=mysqli_query($con,$q);
                $j=mysqli_fetch_assoc($e);
            ?>
              <a style="color: black;" href=<?php echo ("./details.php?".$in)?>><?php if($dat[$k]['action']=='reading') {echo 'Reading : '.$j['bookname'].',';}?></a>
              <a style="color: black;" href=<?php echo ("./details.php?".$in)?>><?php if($dat[$k]['action']=='wishlisted') {echo 'Wishlisted : '.$j['bookname'].',';}?></a>
              <a style="color: black;" href=<?php echo ("./details.php?".$in)?>><?php if($dat[$k]['action']=='finished') {echo 'Finished : '.$j['bookname'].',';}?></a>
              <?php $k++;} ?> 
              </td>
            <td>
                <button data-target='modal1' class='btn modal-trigger' style='background-color: red;'>Delete</button>
                <div id='modal1' class='modal'>
                  <div class='modal-content'>
                    <h4>Are You Sure?</h4>
                    <p>You Want to Delete the User</p>
                  </div>
                  <div class='modal-footer'>
                    <a href='deleteuser.php?<?php echo $daa[$i]['uid']?>' class='modal-close waves-effect waves-green btn-flat'>Agree</a>
                    <a href='#' class='modal-close waves-effect waves-green btn-flat'>Disagree</a>
                  </div>
                </div>
          </td>
          </tr>
          <?php  $i++; }?>
        </tbody>
      </table>
 <?php

   } 
  } else{header("location: error.php");}
?>
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