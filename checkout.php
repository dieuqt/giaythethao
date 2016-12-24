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
  
  header("location: index.php"); 
    exit();
  }
?>

<?php 
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


  
}
?>
<?php
if($_SESSION['username']){
    $username =$_SESSION['username'];
  }
  else $username = "guest";
  date_default_timezone_set('GMT');
  $today = date("Y-m-d H:i:s");
  if($_SESSION['cart_array'][0]['quantity']){
    $quantity = $_SESSION['cart_array'][0]['quantity'];
  }
  $sql1 = $mysqli->query("SELECT name, phone, address from user WHERE username='$username' LIMIT 1");
   // count the output amount
    
    // get all the product details
    while($row1 = $sql1->fetch_array()){ 
       $fullname = $row1["name"];
       $phone = $row1["phone"];
       $address = $row1["address"];
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
<form method="post" action="checkout.php">
  <div class="container">
  <h1 class="page-heading" style="font-size: 24px;">Tiến hành thanh toán</h1>
  <div class="row">
    <div class="col-md-6">
      <h4>Thông tin mua hàng</h4>
      <label class="col-md-3" for="inputName">Họ và tên (*)</label>
      <div class="col-md-9">
        <input type="text" name="CustomerName" placeholder="Họ tên khách hàng" value="<?php echo $fullname; ?>" class="form-control">
        <br>
      </div>
      <label class="col-md-3" for="inputPhone">Điện thoại (*)</label>
      <div class="col-md-9">
        <input type="text" name="Phone" placeholder="Điện thoại" value="<?php echo $phone; ?>" class="form-control">
        <br>
      </div>
      <label class="col-md-3" for="inputAddress">Địa chỉ (*)</label>
      <div class="col-md-9">
        <input type="text" name="Address" placeholder="Địa chỉ giao hàng" value="<?php echo $address; ?>" class="form-control">
        <br>
      </div>
    </div>
        <div class="col-md-6">
      <h4>Đơn hàng</h4>
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
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="button" id="button">Hoàn tất</button>

  </div>
  </div>
  </div> 
  </form>   
  <br>
<?php include 'template/footer.php';?>