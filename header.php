<?php session_start(); ?>
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css?<?php echo time() ?>">
<body>
<nav>
    <a href="#" data-target="slide-out" class="sidenav-trigger" style="float: right;"><i class="material-icons" >menu</i></a>
        <div class="nav-wrapper" style="background-color: orange;">
                    <a href="index.php" class="brand-logo">E-Library</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                      <li><a href='index.php'>Book Listing</a></li>
                    </ul>
 
               <ul class="right hide-on-med-and-down">
     
                    <?php 
                    if(!isset($_SESSION['email'])){
                    echo "<li><a href='login.php'>Login</a></li>";
                    }
                    if (isset($_SESSION['email']) && $_SESSION['usertype'] == 1) {
                        echo "
                        <li><a href='userprofile.php' style='color:white;'> $_SESSION[name]<i class='material-icons right'>person</i></a></li>
                        <li><a href='logout.php'>Logout</a></li>
                        <li><a class='dropdown-trigger bt' href='#!' data-target='dropdown12' style='background-color:orange;'>Control Panel<i class='material-icons right'>expand_more</i></a></li>
                        </ul>";
                        echo " <ul id='dropdown12' class='dropdown-content' style='background-color:orange;'>
                                <li><div class='divider'></div></li>
                                <li><a href='books.php' style='color:white;'>Add New Book</a></li>
                                <li><a href='adminlist.php' style='color:white;'>List Admin</a></li>
                                <li><a href='userlist.php' style='color:white;'>User List</a></li>";
                    } else if (isset($_SESSION['email']) && $_SESSION['usertype'] == 0) {
                       
                        echo "<li><a href='userprofile.php' style='color:white;'> $_SESSION[name]<i class='material-icons right'>person</i></a></li>
                        <li><a href='logout.php'>Logout</a></li>";
                    }
                    
                    ?>
               </ul>
         </div>
          <ul id="slide-out" class="sidenav" style='background-color:orange;'>
                <li>
                    <!--<div class="user-view">
                        <div class="background">
                        <img src="images/office.jpg">
                        </div>
                        <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
                        <a href="#name"><span class="white-text name">John Doe</span></a>
                        <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                    </div>  -->
                    <ul>
                            <?php 
                            if(!isset($_SESSION['email'])){
                            echo "
                            <li><a href='login.php'>Login</a></li>";
                            }
                            
                            if (isset($_SESSION['email']) && $_SESSION['usertype'] == 1) {
                                echo "
                                <li><a href='userprofile.php' style='color:white;'> $_SESSION[name]<i class='material-icons right'>person</i></a></li>
                                <li><a class='dropdown-trigger bt' href='#!' data-target='dropdown1' style='background-color:orange;'>Control Panel<i class='material-icons right'>expand_more</i></a></li>
                                <li><a href='logout.php'>Logout</a></li>";
                                echo " <ul id='dropdown1' class='dropdown-content' style='background-color:orange'>
                                <li><div class='divider'></div></li>
                                <li><a href='books.php' style='color:white;'>Add New Book</a></li>
                                <li><a href='adminlist.php' style='color:white;'>List Admin</a></li>
                                <li><a href='userlist.php' style='color:white;'>User List</a></li></ul>";
                            } else if (isset($_SESSION['email']) && $_SESSION['usertype'] == 0) {
                                echo "<li><div class='divider'></div></li><li><i class='material-icons right'>person</i><a href='userprofile.php' style='color:white;'> $_SESSION[name]</a></li>
                                
                                <li><div class='divider'></div></li><li><a href='logout.php' style='color:white;'>Logout</a></li>";
                            }?>
                    </ul>
                </li>          
            </ul>
    </nav>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const elems = document.querySelectorAll('.sidenav');
            const instances = M.Sidenav.init(elems, {
            edge:'right',
            preventScrolling: true
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems, {});
        });
        </script>
 </body>
 </html>