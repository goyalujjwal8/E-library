
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library</title><link rel="shortcut icon" href="./image/download.png" type="image/x-icon">
</head>
<body>
    <?php
    include "./header.php";
    include "conn.php";
    if ((isset($_SESSION['email']) && $_SESSION['usertype']==1)){

            if(isset($_POST['bid'])){
                $bid=$_POST['bid'];

                $bookname='';
                $authorname='';
                $bookdetails='';

                if(empty(trim($_POST['bookname']))){
                    $bookname_err = "Bookname cannot be blank";
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

                if(empty(trim($_POST['count']))){
                  $count_err = "Book Count Cannot be Blank";
                  echo "<div class='alert hide'>
      <span class='fas fa-exclamation-circle'></span>
      <span class='msg'>$count_err</span>
        <span class='fas fa-times'></span>
      </div>";
              }
              else{
                  $count = trim($_POST['count']);
              }
                $target="./upload/image".basename($_FILES['file']['name']);
                $bookimage=$_FILES['file']['name'];

                        move_uploaded_file($_FILES['file']['tmp_name'],$target);

                        if(empty($bookname_err) && empty($authorname_err) && empty($bookdetails_err) && empty($count_err)){
            
                $sql="UPDATE `books` SET `bookname` = '$bookname',`authorname` = '$authorname', `bookdetails` = '$bookdetails', `bookimage`='$bookimage', `count`='$count' WHERE `bid`='$bid'" ;
                
                if($con->query($sql)==true){
                    echo "<div class='alert hide'>
                    <span class='fas fa-exclamation-circle'></span>
                    <span class='msg'>Book Editted Successfully</span>
                      <span class='fas fa-times'></span>
                    </div>";
                }}
                else{
                    echo "<div class='alert hide'>
                    <span class='fas fa-exclamation-circle'></span>
                    <span class='msg'>Fill All the Required Fields</span>
                      <span class='fas fa-times'></span>
                    </div>";
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
    <p class="msg" style="color: black;">Enter New Book Details</p>
        <div class="login-page">
            <div class="form">
                <form action="#" method="post" class="login-form"  enctype="multipart/form-data">
                    <input name = 'bid' type="text" hidden value="<?php  echo $_SERVER['QUERY_STRING'];?>" >
                    <input type='text' name='bookname' id='bookname' value="<?php echo $result['bookname'];?>">
                    <input type='text' name='authorname' id='authorname' value="<?php echo $result['authorname'];?>">
                    <textarea name='bookdetails' id='bookdetails'><?php echo $result['bookdetails'];?></textarea>
                    <input type="number" name="count" id="count" value="<?php echo $result['count'];?>">
                    <label style="color: black;">Book Cover</label>
                    <input type='file' name='file' id='bookimage' value="<?php echo $result['bookimage']?>">
                    
                <button>SAVE</button><br>
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