<?php include 'template/header.php';?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <div class="container">
    <form action="register.php" method='POST' class="form-horizontal" role="form">
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Tên đăng nhập</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" placeholder="Tên đăng nhập" style="width: 400px;height: 30px">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Mật khẩu</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" placeholder="Mật khẩu" style="width: 400px;height: 30px">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Họ tên</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Nguyễn Văn A.." style="width: 400px;height: 30px">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" placeholder="Email" style="width: 400px;height: 30px">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name ="register" class="btn btn-default" style="background-color: #8c2830; color: white">Đăng ký</button>
      <br>
    </div>
  </div>
</form>
       
    </div>
</div>
<?php include 'template/footer.php';?>