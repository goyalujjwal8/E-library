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

    if(isset($_POST['upload'])){
        $action=$_POST['action'];
        $r="select * from has_book";
        $s=mysqli_query($con,$r);
        $total = mysqli_num_rows($s);
        $daa = [];
        $i = 0; $k=0; $b=0;
        if($s->num_rows>=0){
          while ($row = mysqli_fetch_array($s)) {
              $daa[] = $row;
          }
        
        while($i < count($daa)){
          if($daa[$i]['action']=='reading'){
            $k=$k+1;
          }
          else if(($daa[$i]['bid']==$_POST['bid'])&&($daa[$i]['action']=='wishlisted')){
            $b=$b+1;
          }
          $i++;
        }
        //  var_dump($k);
        //  var_dump($b);
        // var_dump(mysqli_num_rows($s));
         //die();
    if($k>=1 && $action=='reading'){

        echo "<div class='alert hide'>
        <span class='fas fa-exclamation-circle'></span>
        <span class='msg'>First Mark the Currently Issued Book Finished</span>
          <span class='fas fa-times'></span>
        </div>";
    }
    else if($b>=1 && $action == 'wishlisted'){
      echo "<div class='alert hide'>
      <span class='fas fa-exclamation-circle'></span>
      <span class='msg'>Book is Already in the Wishlist</span>
        <span class='fas fa-times'></span>
      </div>";
    }
    else{
        $que="select `count` from `books` where `bid`='$_POST[bid]'";
        $ex=mysqli_query($con,$que);
        $dat=mysqli_fetch_assoc($ex);
      if($dat['count']>0){
        $u= "SELECT uid FROM users WHERE email = '$_SESSION[email]'";
        $e=mysqli_query($con,$u);
        $result=mysqli_fetch_assoc($e);
        
        $q="INSERT INTO `has_book` (`uid`,`bid`,`action`) VALUES ('$result[uid]', '$_POST[bid]', '$action') ON DUPLICATE KEY UPDATE    
              `action`='$action'"; 
        $d = mysqli_query($con,$q);
        if($d==true && $action=='reading'){
          $n=$dat['count']-1;
          $u="UPDATE `books` SET `count`='$n' WHERE `bid`='$_POST[bid]'";
          $e=mysqli_query($con,$u);
        }

        echo "<div class='alert hide'>
        <span class='fas fa-exclamation-circle'></span>
        <span class='msg'>Response Saved</span>
          <span class='fas fa-times'></span>
        </div>";
    }else{
      echo "<div class='alert hide'>
      <span class='fas fa-exclamation-circle'></span>
      <span class='msg'>No Book Available For Now </span>
        <span class='fas fa-times'></span>
      </div>";
    }
 }
    }
  }

        $query = "select * from books";
        $data = mysqli_query($con,$query);
        $total = mysqli_num_rows($data);
        $daa = [];
        if($data->num_rows>0){
        while ($row = mysqli_fetch_array($data)) {
            $daa[] = $row;
        }
        echo "  <div class='Container'>";
        $i = 0;

        while($i < count($daa)){
          $count = 0;
        echo " <div class='row'>";
          while ($count < 3 && $i<count($daa)) {

   ?>
      
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image" > 
              <img src="<?php echo './upload/image/'.$daa[$i]['bookimage'];?>" style="height:500px; width: 100%">
              
             </div>
            <div class="card-content">
            <span class="card-title"><?php echo $daa[$i]['bookname'];?></span>
              <p><?php echo ("By-".$daa[$i]['authorname'])?></p>
            </div>
            
            <?php if (isset($_SESSION['email']) && isset ($_SESSION['usertype'])){ ?>
              <div class="card-action">
              <a href= <?php echo ("./details.php?".$daa[$i]["bid"])?> style="size: 20px;">Details</a>
              <span style="color: orange;float:right;"><?php echo ("Book Count : ".$daa[$i]['count'])?></span>
            </div>
            <div class='card-action'>
              <form action='#' method="POST" name="form1">
              <p><span style='color: orange';>MARK AS :</span> 
                <label>
              <input name="bid" value='<?php echo $daa[$i]["bid"]?>' hidden></label>
              <label style='margin-right:1rem;' >
                  <input id = 'input2' name='action' value='wishlisted' type='radio'/>
                  <span>Add to Wishlist</span>
              </label>
              <label style='margin-right:1rem;'>
                  <input id='input3' name='action' value='reading'  type='radio'/>
                  <span>Issue a Book</span>
              </label>
                <button class="btn modal-trigger" type ="submit" name="upload" value="1" style="background-color: orange;">SAVE RESPONSE</button>
              </p>
              </form>
            </div>
         <?php } ?>
        </div>
       </div>
    
   <?php
       $count++;
       $i++;
       }
      }
   ?>
   </div>
      </div>
<?php }else{echo "$results";}?>
<script>
     $(function(){
        $('.alert').addClass("show");
        $('.alert').removeClass("hide");
        $('.alert').addClass("showAlert");
        setTimeout(function(){
          $('.alert').removeClass("show");
          $('.alert').addClass("hide");
        },5000);
      });

  </script>
</body>
</html>