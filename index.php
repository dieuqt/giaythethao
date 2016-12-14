<?php  
include "data_access_helper.php"; 
$dynamicList = "";
$dsql = $mysqli->query("SELECT * FROM product ORDER BY date_added DESC LIMIT 12");
$dproductCount = $dsql->num_rows; // count the output amount
$i = 0;

if ($dproductCount > 0) {
	$dynamicList .= '<h1 class="page-heading">Sản Phẩm Mới</h1>';
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
          <div class="col-md-3 col-xs-12 col-sm-6">
          	<div class="thumbnail">
          		<a href="product.php?id='.$did.'">
          			<div class="product-image">
          			<p style="position: absolute; z-index: 1; margin-top:2px; margin-left:4px">
            		<span class="label label-danger">SALE</span>
          			</p>
          			</div>
          			<img src="Images/'.$did.'.jpg" alt="$'.$dproduct_name.'" />
      			</a>
  				<div class="caption text-center">
  					<h3>'.$dproduct_name.'</h3>
  					<p class="text-info">'.$dprice.' USD</p>
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
	$dynamicList = '<h1 class="text-center">FREE STYLE hiện chưa có sản phẩm nào!</h1>';
}
$mysqli->close();

?>
<?php 
include 'template/header.php';
include 'template/slide.php';
?>
<div class="container">
    <?php echo $dynamicList; ?>
</div>
<?php
include 'template/footer.php';
?>
<script language="javascript" type="text/javascript">
	$(document).ready(function(e) {
		setActive(0);
	});	
</script>