<?php 
	include "../path.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Free style | Hàng có sẵn</title>

    <!-- Bootstrap -->
    <link href="<?php echo $rooturl; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $rooturl; ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $rooturl; ?>css/custom.css" rel="stylesheet">

  </head>
  <body>
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
      	<img alt="Brand" src="<?php echo $rooturl; ?>images/logo-4.png" width="160">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="inventory_list.php#inventoryForm">Thêm sản phẩm</a></li>
         <li class="active"><a href="order_list.php#orderForm">Đơn hàng</a></li>
      </ul>
      <div class="navbar-form navbar-right">
        <a href="logout.php" class="btn btn-warning text-uppercase">
        <i class="fa fa-sign-out fa-2x mr-md"></i>Thoát
        </a>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


