<?php 
// Connect to the MySQL database  
include "data_access_helper.php"; 
$dynamicList = "";
$dsql = $mysqli->query("SELECT * FROM product WHERE category = 'Converse' ORDER BY date_added DESC");
$dproductCount = $dsql->num_rows; // count the output amount
$i = 0;

if ($dproductCount > 0) {
	$dynamicList .= '<h1 class="page-heading">Converse</h1>';
	while($drow = $dsql->fetch_array()){ 
			$i++;
             $did = $drow["product_id"];
			 $dproduct_name = $drow["name"];
			 $dprice = $drow["price"];
			 $ddate_added = strftime("%b %d, %Y", strtotime($drow["date_added"]));
			 if($i%4==1){
				 $dynamicList .= '<div class="row">';
			 }
			 $dynamicList .= '
          <div class="col-md-3">
          	<div class="thumbnail">
          		<a href="product.php?id='.$did.'">
          			<img src="Images/'.$did.'.jpg" alt="$'.$dproduct_name.'" />
      			</a>
  				<div class="caption text-center">
  					<h3>'.$dproduct_name.'</h3>
  					<p class="text-info">'.$dprice.' VND</p>
    				<p><a class="btn btn-success btn-block" href="product.php?id='.$did.'">Xem sản phẩm</a></p>
				</div>
			</div>
		  </div>
       ';
	   if($i%4==0 || $i == $dproductCount){
				 $dynamicList .= '</div>';
			 }
    }
	
} else {
	$dynamicList = '<h1 class="text-center">We have no products listed in our store yet</h1>';
}
$mysqli->close();

?>

<?php include 'template/header.php';?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
	<?php echo $dynamicList; ?>
</div>
<?php include 'template/footer.php';?>
<script language="javascript" type="text/javascript">
	$(document).ready(function(e) {
		setActive(1);
	});
	
</script>