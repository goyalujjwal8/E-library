
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
    if ((isset($_SESSION['email']) && $_SESSION['usertype']==1)||(isset($_SESSION['email']) && $_SESSION['usertype']==0)){ 
    if(isset($_POST['upload'])){

    $bookname = '';
    $authorname = '';
    $bookdetails = '';

    if(empty(trim($_POST['bookname']))){
        $bookname_err = "Bookname cannot be blank";
        echo "<script>alert('$bookname_err')</script>";
    }
    else{
        $bookname = trim($_POST['bookname']);
    }

    if(empty(trim($_POST['authorname']))){
        $authorname_err = "Authorname cannot be blank";
        echo "<script>alert('$authorname_err')</script>";
    }
    else{
        $authorname = trim($_POST['authorname']);
    }
    if(empty(trim($_POST['bookdetails']))){
        $bookdetails_err = "Bookdetails cannot be blank";
        echo "<script>alert('$bookdetails_err')</script>";
    }
    else{
        $bookdetails = trim($_POST['bookdetails']);
    }
    $target="./upload/image/".basename($_FILES['file']['name']);
    $bookimage=$_FILES['file']['name'];

    $target1="./upload/pdf/".basename($_FILES['pdf']['name']);
    $pdf=$_FILES['pdf']['name'];

               move_uploaded_file($_FILES['file']['tmp_name'],$target);

               move_uploaded_file($_FILES['pdf']['tmp_name'],$target1);
                
               if(empty($bookname_err) && empty($authorname_err) && empty($bookdetails_err)){

                $query="INSERT INTO  `books` (`bid`, `bookname`, `authorname`, `bookdetails`, `bookimage`, `pdf`) VALUES (NULL, '$bookname','$authorname', '$bookdetails', '$bookimage', '$pdf')";
                $insert=mysqli_query($con,$query);
                    if($insert==true){
                    echo "<script>alert('The Book has been uploaded successfully.')</script>";}  
                 }      
    }
    $con->close();

    ?>
    <div class="user">
      <p class="msg">Enter Book Details</p>
        <div class="login-page"> 
            <div class="form">
                <form action="./books.php" method="POST" class="login-form"  enctype="multipart/form-data">
                 <input type="text" name="bookname" id="bookname" placeholder="Enter Book Name *">
                <input type="text" name="authorname" id="authorname" placeholder="Enter Author Name *">
                <textarea name="bookdetails" id="bookdetails" placeholder="Enter Book Details *"></textarea>
                <label style="color: black;">Book Cover</label>
                <input type="file" id="file" name="file" accept="image/x-png,image/gif,image/jpeg">
                <label style="color: black;">Book pdf</label>
                <input type="file" id="pdf" name="pdf" accept="pdf">  
                <button type ="submit" name="upload" value="1">SAVE</button>
                </form>
            </div>
         </div>
    </div>
    <?php } else{header("location: error.php");}?>
</body>
</html>
