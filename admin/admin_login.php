<?php 
 include "../config.php";

session_start();
if (isset($_SESSION["manager"])) {
    header("location: index.php"); 
    exit();
}
?>
<?php 
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
    // Connect to the MySQL database  
    include "../storescripts/connect_to_mysql.php"; 
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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>RUNNING MAN|DON'T WALK BUT RUN</title>

    <!-- Bootstrap -->
    <link href="<?php echo $rooturl; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $rooturl; ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $rooturl; ?>css/custom.css" rel="stylesheet">

  </head>
  <body class="login-page">
<div class="container">

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


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo $rooturl; ?>js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $rooturl; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $rooturl; ?>js/main.js"></script>
  </body>
</html>