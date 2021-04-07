
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-library</title>
</head>
<body>
    
<?php
    include "header.php";
    include "conn.php";
    if ((isset($_SESSION['email']) && $_SESSION['usertype']==1)){ 
            if(isset($_POST['upload'])){

                $bookname = '';
                $authorname = '';
                $bookdetails = '';

                if(empty(trim($_POST['bookname']))){
                    $bookname_err = "Bookname Cannot be Blank";
                    echo "<div class='alert hide'>
        <span class='fas fa-exclamation-circle'></span>
        <span class='msg'>$bookname_err</span>
          <span class='fas fa-times'></span>
        </div>";
                }
                else{
                    $bookname = trim($_POST['bookname']);
                }

                if(empty(trim($_POST['authorname']))){
                    $authorname_err = "Authorname cannot be blank";
                    echo "<div class='alert hide'>
        <span class='fas fa-exclamation-circle'></span>
        <span class='msg'>$authorname_err</span>
          <span class='fas fa-times'></span>
        </div>";
                }
                else{
                    $authorname = trim($_POST['authorname']);
                }
                if(empty(trim($_POST['bookdetails']))){
                    $bookdetails_err = "Bookdetails cannot be blank";
                    echo "<div class='alert hide'>
        <span class='fas fa-exclamation-circle'></span>
        <span class='msg'>$bookdetails_err</span>
          <span class='fas fa-times'></span>
        </div>";
                }
                else{
                    $bookdetails = trim($_POST['bookdetails']);
                }
                $target="./upload/image/".basename($_FILES['file']['name']);
                $bookimage=$_FILES['file']['name'];

                move_uploaded_file($_FILES['file']['tmp_name'],$target);
                    
                if(empty($bookname_err) && empty($authorname_err) && empty($bookdetails_err)){

                $query="INSERT INTO  `books` (`bid`, `bookname`, `authorname`, `bookdetails`, `bookimage`) VALUES (NULL, '$bookname','$authorname', '$bookdetails', '$bookimage')";
                $insert=mysqli_query($con,$query);
                if($insert==true){  
                echo "<div class='alert hide'>
        <span class='fas fa-exclamation-circle'></span>
        <span class='msg'>The Book has been uploaded successfully.</span>
          <span class='fas fa-times'></span>
        </div>";
            }      
        }
    }
$con->close();
?>
    <div class="user">
      <p class="msg" style="color: black;">Enter Book Details</p>
        <div class="login-page"> 
            <div class="form">
                <form action="./books.php" method="POST" class="login-form"  enctype="multipart/form-data">
                 <input type="text" name="bookname" id="bookname" placeholder="Enter Book Name *">
                <input type="text" name="authorname" id="authorname" placeholder="Enter Author Name *">
                <textarea name="bookdetails" id="bookdetails" placeholder="Enter Book Details *"></textarea>
                <label style="color: black;">Book Cover</label>
                <input type="file" id="file" name="file" accept="image/x-png,image/gif,image/jpeg">
    
                <button type ="submit" name="upload" value="1">SAVE</button>
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
