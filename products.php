<?php
if(!session_id())
	session_start();
	include 'header.php';
?>
<body> 
	<!--top-header-->
	<div class="top-header">
	<div class="container">
		<div class="top-header-main">
			<div class="col-md-4 top-header-left">
				<div class="search-bar">
					<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
					<input type="submit" value="">
				</div>
			</div>
			<div class="col-md-4 top-header-middle">
				<a href="index.html"><img src="images/logo-4.png" alt="" /></a>
			</div>
			<div class="col-md-4 top-header-right">
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
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--top-header-->
<!--bottom-header-->
	
	<!--bottom-header-->
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active">New Products</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-product--> 
	<div class="product">
		<div class="container">
			<div class="product-main">
				<div class="col-md-9 p-left">
				<div class="product-one">
				<div class="col-md-4 product-left single-left"> 
					<div class="p-one simpleCart_shelfItem">
						<a href="product.php">
								<img src="images/shoes-1.png" alt="" />
								<div class="mask mask1">
									<span>Quick View</span>
								</div>
							</a>
						<h4>Aenean placerat</h4>
						<p><a class="item_add" href="#"><i></i> <span class=" item_price">$329</span></a></p>
					</div>
				</div>
				<div class="col-md-4 product-left single-left"> 
					<div class="p-one simpleCart_shelfItem">
						<a href="product.php">
								<img src="images/shoes-2.png" alt="" />
								<div class="mask mask1">
									<span>Quick View</span>
								</div>
							</a>
						<h4>Aenean placerat</h4>
						<p><a class="item_add" href="#"><i></i> <span class=" item_price">$329</span></a></p>
					</div>
				</div>
				<div class="col-md-4 product-left single-left"> 
					<div class="p-one simpleCart_shelfItem">
						<a href="product.php">
								<img src="images/shoes-3.png" alt="" />
								<div class="mask mask1">
									<span>Quick View</span>
								</div>
							</a>
						<h4>Aenean placerat</h4>
						<p><a class="item_add" href="#"><i></i> <span class=" item_price">$329</span></a></p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="product-one">
				<div class="col-md-4 product-left single-left"> 
					<div class="p-one simpleCart_shelfItem">
						<a href="product.php">
								<img src="images/shoes-5.png" alt="" />
								<div class="mask mask1">
									<span>Quick View</span>
								</div>
							</a>
						<h4>Aenean placerat</h4>
						<p><a class="item_add" href="#"><i></i> <span class=" item_price">$329</span></a></p>
					</div>
				</div>
				<div class="col-md-4 product-left single-left"> 
					<div class="p-one simpleCart_shelfItem">
						<a href="product.php">
								<img src="images/shoes-6.png" alt="" />
								<div class="mask mask1">
									<span>Quick View</span>
								</div>
							</a>
						<h4>Aenean placerat</h4>
						<p><a class="item_add" href="#"><i></i> <span class=" item_price">$329</span></a></p>
					</div>
				</div>
				<div class="col-md-4 product-left single-left"> 
					<div class="p-one simpleCart_shelfItem">
						<a href="product.php">
								<img src="images/shoes-7.png" alt="" />
								<div class="mask mask1">
									<span>Quick View</span>
								</div>
							</a>
						<h4>Aenean placerat</h4>
						<p><a class="item_add" href="#"><i></i> <span class=" item_price">$329</span></a></p>
					</div>
				</div>
			<div class="clearfix"> </div>
			</div>
			<div class="product-one">
				<div class="col-md-4 product-left single-left"> 
					<div class="p-one simpleCart_shelfItem">
						<a href="product.php">
								<img src="images/shoes-15.png" alt="" />
								<div class="mask mask1">
									<span>Quick View</span>
								</div>
							</a>
						<h4>Aenean placerat</h4>
						<p><a class="item_add" href="#"><i></i> <span class=" item_price">$329</span></a></p>
						
					</div>
				</div>
				<div class="col-md-4 product-left single-left"> 
					<div class="p-one simpleCart_shelfItem">
						<a href="product.php">
								<img src="images/shoes-10.png" alt="" />
								<div class="mask mask1">
									<span>Quick View</span>
								</div>
							</a>
						<h4>Aenean placerat</h4>
						<p><a class="item_add" href="#"><i></i> <span class=" item_price">$329</span></a></p>
						
					</div>
				</div>
				<div class="col-md-4 product-left single-left"> 
					<div class="p-one simpleCart_shelfItem">
						<a href="product.php">
								<img src="images/shoes-11.png" alt="" />
								<div class="mask mask1">
									<span>Quick View</span>
								</div>
							</a>
						<h4>Aenean placerat</h4>
						<p><a class="item_add" href="#"><i></i> <span class=" item_price">$329</span></a></p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>
			<div class="col-md-3 p-right single-right">
				<h3>Categories</h3>
					<ul class="product-categories">
						<li><a href="#">Blucher Shoe</a> <span class="count">(14)</span></li>
						<li><a href="#">Clog Shoe</a> <span class="count">(2)</span></li>
						<li><a href="#">Snow Boot Shoe</a> <span class="count">(2)</span></li>
						<li><a href="#">Galesh Shoe</a> <span class="count">(11)</span></li>
						<li><a href="#">pataugas Shoe</a> <span class="count">(3)</span></li>
						<li><a href="#">Jazz Shoe</a> <span class="count">(3)</span></li>
					</ul>
					<h3>Colors</h3>
					<ul class="product-categories">
						<li><a href="#">Green</a> <span class="count">(14)</span></li>
						<li><a href="#">Blue</a> <span class="count">(2)</span></li>
						<li><a href="#">Red</a> <span class="count">(2)</span></li>
						<li><a href="#">Gray</a> <span class="count">(8)</span></li>
						<li><a href="#">Green</a> <span class="count">(11)</span></li>
						<li><a href="#">Yellow</a> <span class="count">(2)</span></li>
					</ul>
					<h3>Sizes</h3>
					<ul class="product-categories">
						<li><a href="#">5.5</a> <span class="count">(14)</span></li>
						<li><a href="#">6</a> <span class="count">(2)</span></li>
						<li><a href="#">6.5</a> <span class="count">(2)</span></li>
						<li><a href="#">7</a> <span class="count">(8)</span></li>
						<li><a href="#">7.5</a> <span class="count">(11)</span></li>
					</ul>
					<h3>Price</h3>
					<ul class="product-categories p1">
						<li><a href="#">600$-700$</a> <span class="count">(14)</span></li>
						<li><a href="#">700$-800$</a> <span class="count">(2)</span></li>
						<li><a href="#">800$-900$</a> <span class="count">(2)</span></li>
						<li><a href="#">900$-1000$</a> <span class="count">(8)</span></li>
						<li><a href="#">1000$-1100$</a> <span class="count">(11)</span></li>
					</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	</div>
	<!--end-product-->
	<!--start-footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-3 footer-left">
					<h3>ABOUT US</h3>
					<ul>
						<li><a href="#">Who We Are</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						<li><a href="#">Our Sites</a></li>
						<li><a href="#">In The News</a></li>
						<li><a href="#">Team</a></li>
						<li><a href="#">Carrers</a></li>					 
					</ul>
				</div>
				<div class="col-md-3 footer-left">
					<h3>YOUR ACCOUNT</h3>
					<ul>
						<li><a href="account.html">Your Account</a></li>
						<li><a href="#">Personal Information</a></li>
						<li><a href="contact.html">Addresses</a></li>
						<li><a href="#">Discount</a></li>
						<li><a href="#">Track your order</a></li>					 					 
					</ul>
				</div>
				<div class="col-md-3 footer-left">
					<h3>CUSTOMER SERVICES</h3>
					<ul>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Shipping</a></li>				 
					</ul>
					<div class="sub">
						<form>
							<input type="text" value="Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Email';}">
							<input type="submit" value="Subscribe">
						</form>
					</div>
				</div>
				<div class="col-md-3 footer-left footer-right">
					<h3>FOLLOW US</h3>
					<ul>
						<li><a href="#"><span class="fb"> </span></a></li>
						<li><a href="#"><span class="twit"> </span></a></li>
						<li><a href="#"><span class="drbl"> </span></a></li>
						<li><a href="#"><span class="google"> </span></a></li>				 
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-footer-->
	<!--end-footer-text-->
	<div class="footer-text">
		<div class="container">
			<div class="footer-main">
				<p class="footer-class">© 2015 Free Style All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
			</div>
		</div>
		<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
	<!--end-footer-text-->	
</body>
</html>