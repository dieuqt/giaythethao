<?php
include "path.php"; 
session_start();
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Connect to the MySQL database  
include "data_access_helper.php"; 

?>
<?php 
////////////////////////////////////////////////////////////////////////////////////////
//       Section 1 (if user attempts to add something to the cart from the product page)
////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
	$wasFound = false;
	$i = 0;

	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));

	}else{
		// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["cart_array"] as $each_item) { 
		    $i++;
		    while (list($key, $value) = each($each_item)) {
			  if ($key == "item_id" && $value == $pid) {
				  // That item is in cart already so let's adjust its quantity using array_splice()
				  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
				  $wasFound = true;
			  } // close if condition
		    } // close while loop
	    } // close foreach loop
		if ($wasFound == false) {
		   array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
		}
	}
	header("location: cart.php");
	exit();
}
?>

<?php 
//////////////////////////////////////////////////////////////////
//       Section 2 (if user chooses to empty their shopping cart)
//////////////////////////////////////////////////////////////////
	if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
		unset($_SESSION["cart_array"]);
	}

?>

<?php 
//////////////////////////////////////////////////////////////////
//       Section 3 (if user chooses to adjust item quantity)
//////////////////////////////////////////////////////////////////
	if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
		//execute some code
		$item_to_adjust = $_POST['item_to_adjust'];
		$quantity = $_POST['quantity'];
		$quantity = preg_replace('#[^0-9]#i', '', $quantity); 
		if($quantity >= 1000){$quantity = 999;}
		if($quantity < 1){$quantity = 1;}
		if($quantity == ""){$quantity = 1;}

		$i = 0;
		foreach ($_SESSION["cart_array"] as $each_item) { 
		    $i++;
		    while (list($key, $value) = each($each_item)) {
			  if ($key == "item_id" && $value == $item_to_adjust) {
				  // That item is in cart already so let's adjust its quantity using array_splice()
				  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
				  $wasFound = true;
			  } // close if condition
		    } // close while loop
	    } // close foreach loop
	
	header("location: cart.php"); 
    exit();
	}

?>

<?php 
///////////////////////////////////////////////////////////////
//       Section 4 (if user wants to remove an item from cart)
///////////////////////////////////////////////////////////////
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
 	$key_to_remove = $_POST['index_to_remove'];
	if (count($_SESSION["cart_array"]) <= 1) {
		unset($_SESSION["cart_array"]);
	} else {
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
	}
}

?>

<?php 
//////////////////////////////////////////////////////////////////////
//       Section 5  (render the cart for the user to view on the page)
//////////////////////////////////////////////////////////////////////
$cartOutput = "";
$cartTitle = "";
$cartTotal = "";
$pp_checkout_btn = '';
$product_id_array = '';
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
    $cartTitle = "Giỏ Hàng Của Bạn Còn Trống"; 
}else{
	$cartTitle ="Giỏ Hàng";
	//Start Paypal checkout button
	$pp_checkout_btn .= '<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">
    <input type="hidden" name="business" value="qtdieu@gmail.com">';
	$i = 0;
	foreach($_SESSION["cart_array"] as $each_item){
		$item_id = $each_item['item_id'];
		$sql = $mysqli->query("SELECT * FROM product WHERE product_id='$item_id' LIMIT 1");
		while($row = $sql->fetch_array()){
			$product_name = $row["name"];
			$price = $row["price"];
			$product_id = $row["product_id"];
		}
		$pricetotal = $price*$each_item['quantity']; 
		$cartTotal = $pricetotal + $cartTotal;
		// Dynamic Checkout Btn Assembly
		$x = $i + 1;
		$pp_checkout_btn .= '<input type="hidden" name="item_name_' . $x . '" value="' . $product_name . '">
        <input type="hidden" name="amount_' . $x . '" value="' . $price . '">
        <input type="hidden" name="quantity_' . $x . '" value="' . $each_item['quantity'] . '">  ';
		// Create the product array variable
		$product_id_array .= "$item_id-".$each_item['quantity'].",";
		//Dynamic table row assembly
		$cartOutput .= "<tr>";
		$cartOutput .= '<td><img src="Images/' . $item_id . '.jpg" alt="' . $product_name. '" width="80" border="1" /><br><a href="product.php?id=' . $item_id . '">' . $product_name . '</a></td>';
		$cartOutput .= '<td>'.$price.' USD</td>';
		$cartOutput .= '<td><form action="cart.php" method="post">
		<div class="input-group input-group-sm">
		<input class="form-control" name="quantity" type="text" value="'.$each_item['quantity'].'" size="1" maxlength="3" />
      <span class="input-group-btn">
		<button class="btn btn-success " name="adjustBtn' . $item_id . '" type="submit"><i class="fa fa-plus"></i></button>
		<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />      
		</span>
    </div>
		
		</form></td>';
		//$cartOutput .= '<td>'.$each_item['quantity'].'</td>';
		$cartOutput .= '<td>'.$pricetotal.' USD</td>';
		$cartOutput .= '<td><form action="cart.php" method="post"><button class="btn btn-danger btn-xs btn-block" name="deleteBtn' . $item_id . '" type="submit">&times;</button><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></td>';
		$cartOutput .= '</tr>';
		$i++;
	}
	
	$cartTotal = '<tr><td colspan="6" class="text-right">Tổng tiền: '.$cartTotal.' USD</td></tr>';
	//Finish Paypal checkout button
	$pp_checkout_btn .= '<input type="hidden" name="custom" value="' . $product_id_array . '">
	<input type="hidden" name="notify_url" value="'.$rooturl.'storescripts/my_ipn.php">
	<input type="hidden" name="return" value="'.$rooturl.'checkout_complete.php">
	<input type="hidden" name="rm" value="2">
	<input type="hidden" name="cbt" value="Return to The Store">
	<input type="hidden" name="cancel_return" value="'.$rooturl.'paypal_cancel.php">
	<input type="hidden" name="lc" value="US">
	<input type="hidden" name="currency_code" value="USD">
	</form>';

	if($_SESSION['username']){
		$username =$_SESSION['username'];
	}
	else $username = "guest";
	date_default_timezone_set('GMT');
	$today = date("Y-m-d H:i:s");
	echo $today;
	if($_SESSION['cart_array'][0]['quantity']){
		$quantity = $_SESSION['cart_array'][0]['quantity'];
	}
echo $username.'/'.$product_name.'/'.$quantity.'/'.$pricetotal;

	$mysqli->query("INSERT INTO order(username, product_id, quantity_order, total, date_added) VALUES ('$username','$product_name','$quantity','$pricetotal','$today')");
}
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
    <h1 class="page-heading" style="font-size: 24px;"><?php echo $cartTitle; ?></h1>
    <table class="table">
      <tr>
        <th width="30%" >Sản phẩm</th>
        <th width="20%" >Đơn giá</th>
        <th width="15%" >Số lượng</th>
        <th width="20%" >Thành tiền</th>
        <th width="5%" >Xóa</th>
      </tr>
	
    <?php echo $cartOutput; ?>
    <?php echo $cartTotal; ?>
    </table>
 	<div class="row">
 		<div class="col-md-4">
 			<a href="cart.php?cmd=emptycart" class="btn btn-default" style="background-color: #8c2830; color: white">Xóa Giỏ Hàng</a>
 		</div>
        <div class="col-md-4">
 			<a href="products.php" class="btn btn-default" style="background-color: #7bbd42; color: white"><i class="fa fa-plus"></i> Tiếp Tục Mua Hàng</a>
 		</div>
 		<div class="col-md-4 text-right">
 			<a href="checkout.php" class="btn btn-primary" ><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Thanh toán</a>
 		</div>
 	</div>
 	<br>
 	<pre><?php print_r($_SESSION["cart_array"]);?></pre>  
  <?php include 'template/footer.php';?>
