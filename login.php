
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library</title>
</head>
<body>
<?php 
   include "header.php";
   
   include "conn.php";
   if(isset($_POST['submit'])){
       
       $email = $_POST['email'];
       $password = $_POST['password'];

        //$pass= password_hash($password,PASSWORD_BCRYPT);
      //  var_dump($pass);
   
       $s="SELECT * FROM users WHERE email='$email' && password='$password'";
       $result=mysqli_query($con,$s);
      
      
       if(mysqli_num_rows($result)>0){
      
            $q = "SELECT * FROM users WHERE email = '$email'";
            $e=mysqli_query($con,$q);
            $r= mysqli_fetch_assoc($e);
            header("location:index.php?$r[usertype]");
            $_SESSION['usertype']=$r['usertype'];
            $_SESSION['email']=$email;
            $_SESSION['name']=$r['name'];
            $_SESSION['uid']=$r['uid'];
      }else{ 
            echo "<div class='alert hide'>
                    <span class='fas fa-exclamation-circle'></span>
                    <span class='msg'>Enter Valid Email/Password</span>
                      <span class='fas fa-times'></span>
                    </div>";
      }
    }
 ?>
 
        <div class="user">
        <div class="login-page">
          <div class="form">
          <form action="./login.php" method="post" class="login-form">
             <input type="email" placeholder="Email *" name="email">
             <input type="password" placeholder="Password *" name="password">
             <button name="submit">Login</button>
             <p class="message">Not Registered? <a href="register.php">Register</a></p>
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