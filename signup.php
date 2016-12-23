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