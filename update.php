<?php session_start();
    include "conn.php";
   // include "header.php";
    $in=$_SERVER['QUERY_STRING'];
    $q="select * from has_book where `action`='finished'";
    $s=mysqli_query($con,$q);
    $total = mysqli_num_rows($s);
    $daa = [];
    $i = 0; $b=0;
    if($s->num_rows>=0){
      while ($row = mysqli_fetch_array($s)) {
          $daa[] = $row;
      }
    
    while($i < count($daa)){
    if(($daa[$i]['bid']==$in)&&($daa[$i]['action']=='finished')){
        $b=$b+1;
      }
      $i++;
    }

    if($b>=1){
        $query = "DELETE FROM `has_book` WHERE `uid`='$_SESSION[uid]' && `bid`='$in' && `action`='reading'";
        $data = mysqli_query($con,$query);
        if($data==true){
            $que="select `count` from `books` where `bid`='$in'";
            $ex=mysqli_query($con,$que);
            $dat=mysqli_fetch_assoc($ex);
            $n=$dat['count']+1;
            $u="UPDATE `books` SET `count`='$n' WHERE `bid`='$in'";
            $e=mysqli_query($con,$u);
          }
        header('location: userprofile.php');
    }
    else{
    $query = "UPDATE `has_book` SET `action`='finished' WHERE `uid`='$_SESSION[uid]' && `bid`='$in'";
    $data = mysqli_query($con,$query);
    if($data==true){
        $que="select `count` from `books` where `bid`='$in'";
        $ex=mysqli_query($con,$que);
        $dat=mysqli_fetch_assoc($ex);
        $n=$dat['count']+1;
        $u="UPDATE `books` SET `count`='$n' WHERE `bid`='$in'";
        $e=mysqli_query($con,$u);
      }
    header('location: userprofile.php');
    }
}
$con->close();
 ?>
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
  