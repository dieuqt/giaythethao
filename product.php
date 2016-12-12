<?php
if(!session_id())
	session_start();
	include 'header.php';
?>
<html>
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.php">Trang chủ</a></li>
					<li class="active">Sản phẩm</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-single-->
	<div class="single contact">
		<div class="container">
			<div class="single-main">
				<div class="col-md-12 single-main-left">
				<div class="sngl-top">
					<div class="col-md-4 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="images/s1.jpg">
									<img src="images/s1.jpg" />
								</li>
								<li data-thumb="images/s2.jpg">
									<img src="images/s2.jpg" />
								</li>
								<li data-thumb="images/s3.jpg">
									<img src="images/s3.jpg" />
								</li>
								<li data-thumb="images/s4.jpg">
									<img src="images/s4.jpg" />
								</li>
							</ul>
						</div>
<!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

	<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
				</div>	
				<div class="col-md-8 single-top-right">
					<div class="details-left-info simpleCart_shelfItem">
						<h3>Accessories Latest</h3>
						<p class="availability">Availability: <span class="color">In stock</span></p>
						<div class="price_single">
							<span class="reducedfrom">$800.00</span>
							<span class="actual item_price">$600.00</span><a href="#">click for offer</a>
						</div>
						<h2 class="quick">Quick Overview:</h2>
						<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
						<ul class="product-colors">
							<h3>available Colors ::</h3>
							<li><a class="color1" href="#"><span> </span></a></li>
							<li><a class="color2" href="#"><span> </span></a></li>
							<li><a class="color3" href="#"><span> </span></a></li>
							<li><a class="color4" href="#"><span> </span></a></li>
							<li><a class="color5" href="#"><span> </span></a></li>
							<li><a class="color6" href="#"><span> </span></a></li>
							<li><a class="color7" href="#"><span> </span></a></li>
							<li><a class="color8" href="#"><span> </span></a></li>
							<div class="clear"> </div>
						</ul>
						<ul class="size">
							<h3>Length</h3>
							<li><a href="#">7</a></li>
							<li><a href="#">6</a></li>
						</ul>
						<div class="quantity_box">
							<ul class="product-qty">
								<span>Quantity:</span>
								<select>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
								</select>
							</ul>
						</div>
					<div class="clearfix"> </div>
				<div class="single-but item_add">
					<input type="submit" value="add to cart"/>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
					<div class="latest products">
						<div class="product-one">
							<div class="col-md-4 product-left single-left"> 
								<div class="p-one simpleCart_shelfItem">
									
									<a href="#">
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
									<a href="#">
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
									<a href="#">
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
									<a href="#">
								<img src="images/shoes-13.png" alt="" />
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
									<a href="#">
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
									<a href="#">
								<img src="images/shoes-6.png" alt="" />
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
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-single-->
</body>
</html>
<?php
	include 'footer.php';
?>