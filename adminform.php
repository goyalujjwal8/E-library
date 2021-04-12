
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
        if(isset($_POST['upload'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $usertype=1;
            
           //$pass= password_hash($password,PASSWORD_BCRYPT);

            $s="SELECT * FROM users WHERE email='$email'";
            $result=mysqli_query($con,$s);
            
        
            if(mysqli_num_rows($result)>0){
               
                echo " <div class='alert hide'>
                <span class='fas fa-exclamation-circle'></span>
                <span class='msg'>Already Registerd</span>
                  <span class='fas fa-times'></span>
                </div>";

            }else{
            $sql="INSERT INTO  `users` (`uid`, `name`, `password`, `email`, `usertype`) VALUES (NULL,'$name', '$password', '$email', '$usertype')";
                    $in= mysqli_query($con,$sql);
                        
                    echo " <div class='alert hide'>
                    <span class='fas fa-exclamation-circle'></span>
                    <span class='msg'>Successfully Registerd</span>
                      <span class='fas fa-times'></span>
                    </div>";
                        //header("location: adminlist.php");
                        
                }       
            }
  ?>
<div class="user">
  <h4 class="msg" style="color: black;">Create an Admin</h4>
  <div class="login-page">
        <div class="form">
            <form action="#" method="post" class="login-form">
            <input type="text" name="name" id="name" placeholder="Enter Admin Name *" required><br>
            <input type="email" name="email" id="email" placeholder="Enter Admin email *" required></input><br>
            <input type="password" name="password" id="password" placeholder="Enter password *" required><br>
            <button type ="submit" name="upload" value="1">Register</button>
           
            </form>
        </div>
  </div>
</div>
<?php } else{header("location: error.php");}?>
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
<!-- <button>Show Alert</button>
                <div class='alert hide'>
                    <span class='fas fa-exclamation-circle'></span>
                    <span class='msg'>Warning: This is a warning alert!</span>
                    <div class='close-btn'>
                      <span class='fas fa-times'></span>
                    </div>

                    $('button').click(function(){
        $('.alert').addClass("show");
        $('.alert').removeClass("hide");
        $('.alert').addClass("showAlert");
        setTimeout(function(){
          $('.alert').removeClass("show");
          $('.alert').addClass("hide");
        },5000);
      });
      $('.close-btn').click(function(){
        $('.alert').removeClass("show");
        $('.alert').addClass("hide");
      }); -->