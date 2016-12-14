<?php 
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
// Check to see the URL variable is set and that it exists in the database
if (isset($_GET['id'])) {
	// Connect to the MySQL database  
    include "data_access_helper.php"; 
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
	// Use this var to check to see if this ID exists, if yes then get the product 
	// details, if no then exit this script and give message why
	$sql = $mysqli->query("SELECT * FROM product WHERE product_id='$id' LIMIT 1");
	$productCount = $sql->num_rows; // count the output amount
    if ($productCount > 0) {
		// get all the product details
		while($row = $sql->fetch_array()){ 
			 $product_name = $row["name"];
			 $price = $row["price"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
         }
		 
	} else {
		echo "That item does not exist.";
	    exit();
	}
		
} else {
	echo "Data to render this page is missing.";
	exit();
}
$mysqli->close();

?>
	<?php include_once("template/header.php");?>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
    <div class="container">
    <h1 class="page-heading" style="font-size: 24px">Chi Tiết Sản Phẩm</h1>
    	<!--start-single-->
	<div class="container">
		<div class="single-main">
			<div class="col-md-12 single-main-left">
				<div class="sngl-top">
					<div class="col-md-4 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="images/s1.jpg">
									<img src="Images/<?php echo $id; ?>.jpg" />
								</li>
								<li data-thumb="images/s2.jpg">
									<img src="Images/<?php echo $id; ?>.jpg" />
								</li>
								<li data-thumb="images/s3.jpg">
									<img src="Images/<?php echo $id; ?>.jpg" />
								</li>
								<li data-thumb="images/s4.jpg">
									<img src="Images/<?php echo $id; ?>.jpg" />
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
<!--end-single-->
					</div>	
				<div class="col-md-8 single-top-right">
					<div class="details-left-info simpleCart_shelfItem">	
	    				<h3 class="on-top"><?php echo $product_name; ?></h3>
		          		<p><?php echo $price."VND"; ?></p>
		            	<form id="form1" name="form1" method="post" action="cart.php">
			           		<input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
			            	<button type="submit" name="button" id="button" class="btn btn-success"><i class="fa fa-cart-plus fa-2x"></i></button>
			        	</form>
	    			</div>
	    		</div>	
			</div>
		</div>
	</div>
	</div>
</div>
<?php include_once("template/footer.php");?>
<script language="javascript" type="text/javascript">
	$(document).ready(function(e) {
		setActive(1);
	});	
</script>