<?php 
session_start();
if (!isset($_SESSION["username"])) {
    header("location: admin_login.php"); 
    exit();
}
$username = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["username"]); // filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); // filter everything but numbers and letters
// Run mySQL query to be sure that this person is an admin and that their password session var equals the database information
// Connect to the MySQL database  
include "../data_access_helper.php"; 
$sql = $mysqli->query("SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1"); // query the person
// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = $sql->num_rows; // count the row nums
if ($existCount == 0) { // evaluate the count
	 echo "Your login session data is not on record in the database.";
     exit();
}
?>
<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
?>
<?php 
// Delete Item Question to Admin, and Delete Product if they choose
if (isset($_GET['deleteid'])) {
	echo 'Do you really want to delete product with ID of ' . $_GET['deleteid'] . '? <a href="inventory_list.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="inventory_list.php">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	// remove item from system and delete its picture
	// delete from database
	$id_to_delete = $_GET['yesdelete'];
	$sql = $mysqli->query("DELETE FROM product WHERE product_id='$id_to_delete' LIMIT 1") or die ($mysqli->error);
	// unlink the image from server
	// Remove The Pic -------------------------------------------
    $pictodelete = ("../inventory_images/$id_to_delete.jpg");
    if (file_exists($pictodelete)) {
       		    unlink($pictodelete);
    }
	header("location: inventory_list.php"); 
    exit();
}

?>
<?php 
// Parse the form data and add inventory item to the system
if (isset($_POST['name'])) {
	
    $product_name = $mysqli->real_escape_string($_POST['name']);
	$price = $mysqli->real_escape_string($_POST['price']);
	$category = $mysqli->real_escape_string($_POST['category']);
	// See if that product name is an identical match to another product in the system
	$sql = $mysqli->query("SELECT product_id FROM product WHERE name='$product_name' LIMIT 1");
	$productMatch = $sql->num_rows; // count the output amount
    if ($productMatch > 0) {
		echo 'Sorry you tried to place a duplicate "Product Name" into the system, <a href="inventory_list.php">click here</a>';
		exit();
	}
	// Add this product into the database now
	$sql = $mysqli->query("INSERT INTO product (name, price, date_added, category) 
        VALUES('$product_name','$price', now(), '$category')") or die ($mysqli->error);
  
     $pid = $mysqli->insert_id;
	// Place image in the folder 
	$newname = "$pid.jpg";
	move_uploaded_file( $_FILES['fileField']['tmp_name'], "../images/$newname");
	header("location: order_list.php"); 
    exit();
}
?>
<?php 
	$product_list = "";
	$productCount = 0;
	$sql = $mysqli->query("SELECT * FROM tbl_order ORDER BY date_added DESC");
	$productCount = $sql->num_rows;
	if ($productCount > 0) { // evaluate the count
	     while($row = $sql->fetch_array()){
             $id = $row["order_id"];
			 $username = $row["username"];
			 $product_id = $row["product_id"];
       $quantity = $row["quantity_order"];
       $total = $row["total"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $product_list .= "<tr>";
       $product_list .= '<td>' .$id. '</td>';
       $product_list .= '<td>' .$username. '</td>';
       $product_list .= '<td>' .$product_id. '</td>';
       $product_list .= '<td>' .$quantity. '</td>';
       $product_list .= '<td>' .$total. '</td>';
       $product_list .= '<td>' .$date_added. '</td>';
       $product_list .= '<td><a href="order_edit.php?pid=' .$id. '">Sửa</a> &bull; <a href="order_list.php?deleteid=' .$id. '">Xóa</a></td>';
       $product_list .= "</tr>";

  //     $vproduct_list .= "Product ID: $vid - <strong>$vproduct_name</strong> - $$vprice - <em>Added $vdate_added</em> &nbsp; &nbsp; &nbsp; <a href='inventory_edit.php?pid=$vid>edit</a> &bull; <a href='inventory_list.php?deleteid=$vid'>delete</a><br />";
      }
  }else{
      $product_list = '<tr><td class="text-center" colspan="5">Không có sản phẩm nào!</td></tr>';
  }
?>
 <?php include "template_header_admin.php";?>
  <div class="container">
      <h1 class="page-heading">Danh Sách đơn hàng</h1>
      
      <table class="table">
        <tr>
          <th width="10%">ID</th>
          <th width="10%">User ID</th>
          <th width="10%">Product ID</th>
          <th width="10%">Quantity</th>
          <th width="20%">Total</th>
          <th width="20%">Date added</th>     
          <th width="20%">Chức năng</th>
        </tr> 
        <?php echo $product_list; ?>
      </table>


 <a name="orderForm" id="orderForm"></a>
    <h1 class="page-heading">
     Đơn hàng
    </h1>

<form class="form-horizontal" action="order_list.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">User</label>
    <div class="col-sm-10">
      <input class="form-control" name="name" type="text" id="name">
    </div>
  </div>
  <div class="form-group">
    <label for="price" class="col-sm-2 control-label">Sản phẩm</label>
    <div class="col-sm-10">
      <input class="form-control" name="price" type="text" id="price">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Số lượng</label>
    <div class="col-sm-10">
      <input class="form-control" name="quantity" type="text" id="quantity">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tổng tiền</label>
    <div class="col-sm-10">
      <input class="form-control" name="total" type="text" id="total">
    </div>
  </div>

</form>

<?php include "template_footer_admin.php";?>