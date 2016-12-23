<?php 
 include "path.php";
session_start();
?>
<?php 
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

  $username = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
    // Connect to the MySQL database  
    include "data_access_helper.php"; 
    $sql = $mysqli->query("SELECT username FROM user WHERE username='$username' AND password='$password' LIMIT 1"); // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = $sql->num_rows; // count the row nums
    if ($existCount == 1) { // evaluate the count
       while($row = $sql->fetch_array()){ 
             $id = $row["user_id"];
     }
     $_SESSION["username"] = $username;
     $_SESSION["password"] = $password;
     echo "<script> alert('Đăng nhập thành công!')</script>";
     header("location: index.php");
         exit();
    } else {
    echo 'Đăng nhập không thành công, vui lòng thử lại <a href="login.php">Click Here</a>';
    exit();
  }
}
?>
<?php
include 'template/header.php';
?>
<br>
<br>
<br>
<br>
<br>
<br>
  <body class="login-page">
<div class="container">

      <form id="form1" name="form1" method="post" action="login.php" class="form-signin">
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
        <br>
        <p>Nếu chưa có tài khoản, vui lòng đăng ký <a href="signup.php">tại đây</a></p>
      </form>

    </div>
  </body>
<?php include 'template/footer.php';?>
<script src="<?php echo $rooturl; ?>js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $rooturl; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $rooturl; ?>js/main.js"></script>