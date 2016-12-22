<?php

/* @var $this yii\web\View */
use app\web\images;
use app\web\css;
use app\web\fonts;
use app\web\js;

$this->title = 'Free style';
?>
    <!--top-header-->
<div class="top-header">
    <div class="container">
        <div class="top-header-main">

            <div class=" top-header-middle">
                <a href="index.html"><img src="images/logo-4.png" alt="" /></a>
            </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<!--top-header-->

<?php 
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

    $manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
    // Connect to the MySQL database  
    include "data_access_helper.php"; 
    $sql = $mysqli->query("SELECT id FROM admin WHERE username='$manager' AND password='$password' LIMIT 1"); // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = $sql->num_rows; // count the row nums
    if ($existCount == 1) { // evaluate the count
         while($row = $sql->fetch_array()){ 
             $id = $row["id"];
         }
         $_SESSION["id"] = $id;
         $_SESSION["manager"] = $manager;
         $_SESSION["password"] = $password;
         header("location: inventory_list.php");
         exit();
    } else {
        echo 'That information is incorrect, try again <a href="index.php">Click Here</a>';
        exit();
    }
}
?>
<link href="http://localhost:8080/giaythethao/css/bootstrap.min.css" rel="stylesheet">
<link href="<http://localhost:8080/giaythethao/css/font-awesome.min.css" rel="stylesheet">
<link href="http://localhost:8080/giaythethao/custom.css" rel="stylesheet">

  <body class="login-page">
<div class="container">
<br>
<br>

      <form id="form1" name="form1" method="post" action="admin_login.php" class="form-signin">
        <h1 class="page-heading">Đăng Nhập</h1>
        <div class="form-group">
          <label for="username" class="sr-only">Tên đăng nhập</label>
          <input name="username" type="text" id="username" class="form-control" placeholder="Tên đăng nhập" required="" autofocus="">
        </div>
        <div class="form-group">
          <label for="password" class="sr-only">Mật khẩu</label>
          <input name="password" type="password" id="password" class="form-control" placeholder="Mật khẩu" required="">
        </div>
       
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="button" id="button">Đăng nhập</button>
      </form>

    </div>
     <script src="http://localhost:8080/giaythethao/>js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://localhost:8080/giaythethao/js/bootstrap.min.js"></script>
    <script src="http://localhost:8080/giaythethao/js/main.js"></script>

  </body>
</html>
   