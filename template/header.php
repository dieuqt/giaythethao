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
			<div class="col-md-3 top-header-left">
				<div class="search-bar">
					<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
					<input type="submit" value="">
				</div>
			</div>
			<div class="col-md-3 top-header-middle">
				<a href="index.html"><img src="images/logo-4.png" alt="" /></a>
			</div>
			<div class="col-md-3 top-header-right">
				<div class="cart box_1">
						<a href="checkout.html">
						<h3> <div class="total">
							<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
							<img src="images/cart-1.png" alt="" />
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
						<div class="clearfix"> </div>
					</div>
			</div>
			<div class="col-md-3 top-header-right2">
				<a href="login.php">
				<p><span class="glyphicon glyphicon-user"></span> Đăng nhập</p>
				</a>
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
					<li class="grid"><a href="#">Adidas</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<ul>
										<li><a href="products.php>Yezzy</a></li>
										<li><a href="products.php">Ultra Boost</a></li>
										<li><a href="products.php">Tubular</a></li>
										<li><a href="products.php">Super Star</a></li>
										<li><a href="products.php">Stan Mith</a></li>
										<li><a href="products.php">NMD Runner</a></li>
									</ul>	
								</div>
							</div>
						</div>
					</li>
					
					<li class="grid"><a href="#">Nike</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<ul>
										<li><a href="products.html">Air Max</a></li>
										<li><a href="products.html">Air Force</a></li>
										<li><a href="products.html">Zoom</a></li>
										<li><a href="products.html">Huarache</a></li>
									</ul>	
								</div>
							</div>
						</div>
					</li>
					<li class="grid"><a href="#">Converse</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<ul>
										<li><a href="products.html">Basic</a></li>
										<li><a href="products.html">Chuck II</a></li>
									</ul>	
								</div>
							</div>
						</div>
					</li>
					<li class="grid"><a href="#">Vans</a>
					</li>
					<li class="grid"><a href="contact.php">Liên hệ</a>
					</li>
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