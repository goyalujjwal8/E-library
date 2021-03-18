
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
if ((isset($_SESSION['email']) && $_SESSION['usertype']==1)||(isset($_SESSION['email']) && $_SESSION['usertype']==0)){
if(isset($_POST['upload'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usertype=1;
    
   // $pass= password_hash($password,PASSWORD_BCRYPT);

    $s="SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($con,$s);
    
   
    if(mysqli_num_rows($result)>0){

        echo "<script>alert('Already registered')</script>";
    }else{
    $sql="INSERT INTO  `users` (`uid`, `name`, `password`, `email`, `usertype`) VALUES (NULL,'$name', '$password', '$email', '$usertype')";
               $in= mysqli_query($con,$sql);

                   echo "<script>alert('Successfully registered')</script>";
                   //header("location: adminlist.php");
            }       
        }
       

?>
<div class="user">
<h4 class="msg">Create an Admin</h4>
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
</body>
</html>