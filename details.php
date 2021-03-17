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
$in=$_SERVER['QUERY_STRING'];

$query = "SELECT * FROM `books` WHERE bid=$in";
$data = mysqli_query($con,$query);
$result = mysqli_fetch_assoc($data);
 ?>
   <div class="row" >
    <div class="col s12 m5">
      <div class="card">
        <div class="card-image" >
          <img src="<?php echo './upload/image/'.$result['bookimage'];?>" style="height: 500px;">
          
        </div>
        <div class="card-content">
        <span class="card-title"><?php echo $result['bookname'];?></span>
          <p>By-<?php echo $result['authorname'];?></p><br>
          <p><?php echo $result['bookdetails'];?></p>
        </div>
        
        <div class="card-action">
      <?php  if (isset($_SESSION['email']) && $_SESSION['usertype'] == 0) {
                        echo "<ul><li><a href='./upload/pdf/$result[pdf]'>Read</a></li></ul>";
      }else if(isset($_SESSION['email']) && $_SESSION['usertype'] == 1){
      
        echo "<ul>
        <li>
        <a class='btn waves-effect waves-light' href='./upload/pdf/$result[pdf]'>Read</a>
        <a class='btn waves-effect waves-light' href='edit.php?$result[bid]' style='background-color: orange;'>Edit</a>
        <button data-target='modal1' class='btn modal-trigger' style='background-color: red;'>Delete</button>
        <div id='modal1' class='modal'>
    <div class='modal-content'>
      <h4>Are You Sure?</h4>
      <p>You Want to Delete the Book</p>
    </div>
    <div class='modal-footer'>
      <a href='delete.php?$result[bid]' class='modal-close waves-effect waves-green btn-flat'>Agree</a>
      <a href='#' class='modal-close waves-effect waves-green btn-flat'>Disagree</a>
    </div>
  </div>
        </li>
          </ul>";
       }
           ?>
      
          </div>
        </div>
      </div>
    </div>
    <script> 
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal1');
    var instances = M.Modal.init(elems, options);
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {});
  });

    </script>
</body>
</html>