<?php
  include 'data_access_helper.php';
  //lay thong tin khach hang
  $username = $_POST["username"];
  $password =$_POST["password"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];
  $fail = 0;
  //kiem tra thong tin
  if(isset($_POST['submit'])){
    if($username == NULL || $name == NULL || $email == NULL || $phone == NULL || address == NULL ||$password == NULL){
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
        $sql=$mysqli->query("INSERT INTO user(username, password, name, email, phone, address) values ('$username','$password','$name','$email', '$phone', '$address')");
        echo"<script>alert('Chúc mừng bạn đã là thành viên của Free style. Mời bạn đăng nhập theo tài khoản đã đăng ký');</script>";
        header("location: login.php");
        $mysqli->close();
      }
      else{
        $mysqli->close();
      }
?>
