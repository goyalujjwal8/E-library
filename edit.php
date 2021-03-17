<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-library</title>
</head>
<body>
    <?php
    include "./header.php";
    include "conn.php";
    if(isset($_POST['bid'])){
    $bid=$_POST['bid'];

    $bookname='';
    $authorname='';
    $bookdetails='';

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

    $target="./upload/".basename($_FILES['file']['name']);
    $bookimage=$_FILES['file']['name'];

    $target1="./upload/pdf/".basename($_FILES['pdf']['name']);
    $pdf=$_FILES['pdf']['name'];

               move_uploaded_file($_FILES['file']['tmp_name'],$target);

               move_uploaded_file($_FILES['pdf']['tmp_name'],$target1);
  
     $sql="UPDATE `books` SET `bookname` = '$bookname',`authorname` = '$authorname', `bookdetails` = '$bookdetails', `bookimage`='$bookimage' WHERE `bid`='$bid'" ;
    
     if($con->query($sql)==true){
        echo "<script>alert('Book Editted Successfully')</script>";
    }
    else{
        echo "Error: $sql<br> $con->error";
    }
   }
   $con->close();
    ?>
    <?php
    include "conn.php";
    $in=$_SERVER['QUERY_STRING'];
    $query = "SELECT * FROM `books` WHERE bid=$in";
    $data = mysqli_query($con,$query);
    $result = mysqli_fetch_assoc($data);
    ?>
    <div class="user">
    <p class="msg">Enter New Book Details</p>
        <div class="login-page">
            <div class="form">
                <form action="#" method="post" class="login-form"  enctype="multipart/form-data">
                    <input name = 'bid' type="text" hidden value="<?php  echo $_SERVER['QUERY_STRING'];?>" >
                    <input type='text' name='bookname' id='bookname' value="<?php echo $result['bookname'];?>">
                    <input type='text' name='authorname' id='authorname' value="<?php echo $result['authorname'];?>">
                    <textarea name='bookdetails' id='bookdetails'><?php echo $result['bookdetails'];?></textarea>
                    <label style="color: black;">Book Cover</label>
                    <input type='file' name='file' id='bookimage' value="<?php echo $result['bookimage']?>">
                    <label style="color: black;">Book pdf</label>
                    <input type='file' name='pdf' id='pdf' value="<?php echo $result['pdf']?>">
                <button>SAVE</button><br>
                </form>
            </div>
      </div>
</div>

</body>
</html>