<?php include 'template/header.php';?>
<br>
<br>
<br>
<br>
<br>
<br>
<body class="login-page">
    <div class="container">
    <form id="form2" name="form2" method="post" action="register.php" class="form-signin">
    <h1 class="page-heading">Đăng ký</h1>
  <div class="form-group">
          <label for="username" class="sr-only">Tên đăng nhập</label>
          <input name="username" type="text" id="username" class="form-control" placeholder="Tên đăng nhập" required="" autofocus="">
        </div>
  <div class="form-group">
          <label for="password" class="sr-only">Mật khẩu</label>
          <input name="password" type="password" id="password" class="form-control" placeholder="Mật khẩu" required="">
        </div>
  <div class="form-group">
          <label for="name" class="sr-only">Họ tên</label>
          <input name="name" type="text" id="name" class="form-control" placeholder="Họ tên" required="" autofocus="">
        </div>
  <div class="form-group">
          <label for="email" class="sr-only">Email</label>
          <input name="email" type="text" id="email" class="form-control" placeholder="Email" required="" autofocus="">
        </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="button" id="button">Đăng ký</button>

</form>
       
    </div>
</div>
</body>
<?php include 'template/footer.php';?>
<script src="<?php echo $rooturl; ?>js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $rooturl; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $rooturl; ?>js/main.js"></script>
<?php
  include 'data_access_helper.php';
  //lay thong tin khach hang
  $username = $_POST["username"];
  $password =$_POST["password"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $fail = 0;
  //kiem tra thong tin
  if(isset($_POST['submit'])){
    if($username == NULL || $name == NULL || $email == NULL ||$password == NULL){
      echo "<script> alert('Data is null!');</script>";
      $fail = 1;
    }
  }
  //Kiem tra trung lap du lieu
  $sql = $mysqli->query("SELECT user_id FROM user WHERE username='$username'"); 
  $existCount = $sql->num_rows; // count the row nums
    if ($existCount == 1) {
      echo "<script> alert('Tên đăng nhập này đã có người sử dụng!');</script>";
      $fail = 1;
  }
  
  //kiem tra email
  if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)){
        echo "<script> alert('Email không đúng. Vui lòng nhập email khác');</script>";
    $fail = 1;
    }
  
  //Kiểm tra email đã có người dùng chưa
  $sql = $mysqli->query("SELECT email FROM user WHERE email='$email'");
  $existCount = $sql->num_rows; // count the row nums
    if ($existCount == 1) {
      echo "<script> alert('Email này đã có người dùng. Vui lòng nhập email khác!');</script>";
      $fail = 1;
  }
      if($fail == 0){
        $sql=$mysqli->query("INSERT INTO user(username, password, name, email) values ('$username','$password','$name','$email')");
        echo"<script>alert('Chúc mừng bạn đã là thành viên của Free style. Mời bạn đăng nhập theo tài khoản đã đăng ký');</script>";
        header("location: login.php");
        $mysqli->close();
      }
      else{
        $mysqli->close();
      }
?>
