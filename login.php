<?php
//Khai báo sử dụng session
session_start();
 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 
//Xử lý đăng nhập
if (isset($_POST['login'])) 
{
    //Kết nối tới database
    include 'data_access_helper.php';
    $db = new DataAccessHelper;
    $db->connect();
     
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['txtUsername']);
    $password = addslashes($_POST['txtPassword']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    // mã hóa pasword
    $password = md5($password);
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = $db->executeNonQuery("SELECT username, password FROM user WHERE username='$username'");
    if (mysql_num_rows($query) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Lấy mật khẩu trong database ra
    $row = mysql_fetch_array($query);
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
    echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='/'>Về trang chủ</a>";
    die();
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
<br>
<br>
<br>
<br>

    <div class="container">
    <form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="txtUsername" class="col-sm-2 control-label">Tên đăng nhập</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="txtUsername" placeholder="Tên đăng nhập" style="width: 400px;height: 30px">
    </div>
  </div>
  <div class="form-group">
    <label for="txtPassword" class="col-sm-2 control-label">Mật khẩu</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="txtPassword" placeholder="Mật khẩu" style="width: 400px;height: 30px">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Ghi nhớ
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" style="background-color: #8c2830; color: white">Đăng nhập</button>
      <button type="submit" class="btn btn-default" style="background-color: #8c2830; color: white">Đăng ký</button>
      <a href='register.php' title='Đăng ký'>Đăng ký</a>
    </div>
  </div>
</form>
       
    </div>
</div>
<?php
include 'template/footer.php';
?>
<script src="<?php echo $rooturl; ?>js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $rooturl; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $rooturl; ?>js/main.js"></script>