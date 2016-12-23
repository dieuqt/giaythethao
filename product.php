<?php 
if(!session_id())
  session_start();
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
			 $category = $row["category"];
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

	<?php include 'template/header.php';?>
	<br>
	<br>
	<br>
	<br>
    <div class="container">
    	<h1 class="page-heading">Chi Tiết Sản Phẩm</h1>
	    <div class="row">
	    	<div class="col-md-4 col-md-offset-2">
	    		<div class="thumbnail">
		    		<a href="Images/<?php echo $id; ?>.jpg">
			    		<img src="Images/<?php echo $id; ?>.jpg" alt="<?php echo $product_name; ?>" />
		    		</a>	
	    		</div>
	    	</div>
	    	<div class="col-md-6">
	    		<h3 class="on-top"><?php echo $product_name; ?></h3>
		          <p><?php echo $price."USD"; ?></p>
		          <form id="form1" name="form1" method="post" action="cart.php">
			            <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
			            <button type="submit" name="button" id="button" class="btn btn-success"><i class="fa fa-cart-plus fa-2x"></i></button>
			        </form>
	    	</div>
	    </div>	
	</div>
	<br>
<?php include "template/footer.php";?>
<script language="javascript" type="text/javascript">
	$(document).ready(function(e) {
		setActive(1);
	});
	
</script>