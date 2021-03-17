<html>
<head>
<title>upload</title>
</head>
<body>
<?php 
include "conn.php";
if(isset($_POST['upload'])){
$target="./images/".basename($_FILES['image']['name']);
$image=$_FILES['image']['name'];
$text=$_POST['text'];
$sql="INSERT INTO upload (image,text) VALUES('$image','$text')";
mysqli_query($dbname, $sql);
if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
    echo "successful";
}else{echo "not successful";}
}
?>
<div id="content">
<form method="POST" action="uploadimg.php" enctype="multipart/form-data">
<input type="file" name="image">
<textarea name="text"></textarea> 
<input type="submit" name="upload" value="Upload_image">
</form>
</div>
</body>
</html>