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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usertype=0;

    if(empty(trim($_POST['name']))){
        $name_err = "Name cannot be blank";
        echo "<div class='alert hide'>
                    <span class='fas fa-exclamation-circle'></span>
                    <span class='msg'>$name_err</span>
                      <span class='fas fa-times'></span>
                    </div>";
    }
    else{
        $name = trim($_POST['name']);
    }

    if(empty(trim($_POST['email']))){
        $email_err = "Email cannot be blank";
        echo "<div class='alert hide'>
        <span class='fas fa-exclamation-circle'></span>
        <span class='msg'>$email_err</span>
          <span class='fas fa-times'></span>
        </div>";
    }
    else{
        $email = trim($_POST['email']);
    }
    if(empty(trim($_POST['password']))){
        $password_err = "Password cannot be blank";
        echo "<div class='alert hide'>
        <span class='fas fa-exclamation-circle'></span>
        <span class='msg'>$password_err</span>
          <span class='fas fa-times'></span>
        </div>";
    }
    else{
        $password = trim($_POST['password']);
    }
    //$pass= password_hash($password,PASSWORD_BCRYPT)

    $s="SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($con,$s);

    if(empty($name_err) && empty($email_err) && empty($password_err)){
        if(mysqli_num_rows($result)>0){
              echo "<div class='alert hide'>
              <span class='fas fa-exclamation-circle'></span>
              <span class='msg'>Already Registered</span>
                <span class='fas fa-times'></span>
              </div>";
        }else{
                $sql="INSERT INTO  `users` (`uid`, `name`, `password`, `email`, `usertype`) VALUES (NULL,'$name', '$password', '$email', '$usertype')";
                $in= mysqli_query($con,$sql);
                
                if($in==true){
                    echo "<div class='alert hide'>
                    <span class='fas fa-exclamation-circle'></span>
                    <span class='msg'>Successfully Registered</span>
                      <span class='fas fa-times'></span>
                    </div>";
                    header('location: login.php');
                }
        }
    }
       
 }

?>
<div class="user">
<div class="login-page">
   <div class="form">
       <form action="#" method="post" class="login-form">
       <input type="text" name="name" id="name" placeholder="Enter Your Name *"><br>
       <input type="email" name="email" id="email" placeholder="Enter your Email *"></input><br>
       <input type="password" name="password" id="password" placeholder="Enter your password *"><br>
       <button type ="submit" name="upload" value="1">Register</button>
       <p class="message">Already Registered?<a href="login.php"> Login </a></p>
       </form>
   </div>
</div>
</div>
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