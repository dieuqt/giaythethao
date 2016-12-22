<!DOCTYPE html>
	<html>
	<head>
	<title>Free style</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-1.11.0.min.js"></script>
	<!--theme-style-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
	<link href="css/custom.css" rel="stylesheet">
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--fonts-->
	<!-- FontAwsome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<!--//fonts-->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
						jQuery(document).ready(function($) {
							$(".scroll").click(function(event){		
								event.preventDefault();
								$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
							});
						});
					</script>	
	<!-- start menu -->
	<script src="js/simpleCart.min.js"> </script>
	<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="js/memenu.js"></script>
	<script>$(document).ready(function(){$(".memenu").memenu();});</script>				
	</head>
	<body> 
		<!--top-header-->
	<div class="top-header" style="position:fixed;z-index:10000; background-color:#FFF; width:100%" >
	<div class="container" >
		<div class="top-header-main" >
			<div class="col-md-4 top-header-left">
				<form class="navbar-form" role="search" action="search.php" method="get">
                    <div class="form-group">
                        <input type="text" placeholder="Tìm kiếm sản phẩm ở đây.." class="form-control" name="keyword">
                    </div>
                    &nbsp; 
                    <button type="submit" name="search" class="btn btn-success">Search</button>
                </form>
			</div>
			<div class="col-md-4 top-header-middle">
				<a href="index.php"><img src="images/logo-4.png" alt="" /></a>
			</div>
			<div class="col-md-4 top-header-right">
				<ul class="nav navbar-nav navbar-right">
      			<li><a href="cart.php"><i class="glyphicon glyphicon-shopping-cart"></i> Giỏ Hàng </a></li>
      			<li><a href="login.php"><i class="glyphicon glyphicon glyphicon-user"></i> Đăng Nhập</a></li>
    			</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<!--top-header-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="top-nav">
				<ul class="memenu skyblue"><li class="active"><a href="index.php">Trang chủ</a></li>
					<li class="grid"><a href="products.php">Sản phẩm</a>
					<div class="mepanel">
						<div class="row">
							<div class="col1 me-one">
								<ul>
									<li><a href="products_nike.php">NIKE</a></li>
									<li><a href="products_adidas.php">ADIDAS</a></li>
									<li><a href="products_converse.php">CONVERSE</a></li>
								</ul>	
							</div>
						</div>
					</div>
					</li>
					<li class="grid"><a href="about.php">Giới thiệu</a></li>
					<li class="grid"><a href="contact.php">Liên hệ</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
    </div>
	<!--bottom-header-->
	</h3>
	</a>
	</div>
	</div>
	</div>
	</div>
	</div>