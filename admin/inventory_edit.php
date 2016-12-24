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
// Parse the form data and add inventory item to the system
if (isset($_POST['product_name'])) {
	$pid = $mysqli->real_escape_string($_POST['thisID']);
  $product_name = $mysqli->real_escape_string($_POST['product_name']);
	$price = $mysqli->real_escape_string($_POST['price']);
	$category = $mysqli->real_escape_string($_POST['category']);
	// See if that product name is an identical match to another product in the system
	$sql = $mysqli->query("UPDATE product SET name='$product_name', price='$price', category='$category' WHERE product_id='$pid'");
	// Place image in the folder 
	if($_FILES['fileField']['tmp_name'] != "") {
		$newname = "$pid.jpg";
		move_uploaded_file( $_FILES['fileField']['tmp_name'], "../Images/$newname");
	}
	header("location: inventory_list.php"); 
    exit();
}
?>
 <?php 
// Gather this product's full information for inserting automatically into the edit form below on page
if (isset($_GET['pid'])) {
	$targetID = $_GET['pid'];
    $sql = $mysqli->query("SELECT * FROM product WHERE product_id='$targetID' LIMIT 1");
    $productCount = $sql->num_rows; // count the output amount
    if ($productCount > 0) {
	    while($row = $sql->fetch_array()){ 
             //print_r($row);
			 $product_name = $row["name"];
			 $price = $row["price"];
			 $category = $row["category"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
        }
    } else {
	    echo "Sorry dude that crap dont exist.";
		exit();
    }
}

?>
<?php 
	$vproduct_list = "";
	$vproductCount = 0;
	$vsql = $mysqli->query("SELECT * FROM product ORDER BY date_added DESC");
	$vproductCount = $vsql->num_rows;
	if ($vproductCount > 0) { // evaluate the count
	     while($vrow = $vsql->fetch_array()){
             $vid = $vrow["product_id"];
			 $vproduct_name = $vrow["name"];
			 $vprice = $vrow["price"];
			 $vdate_added = strftime("%b %d, %Y", strtotime($vrow["date_added"]));
       $vproduct_list .= "<tr>";
       $vproduct_list .= '<td>' .$vid. '</td>';
       $vproduct_list .= '<td>' .$vproduct_name. '</td>';
       $vproduct_list .= '<td>' .$vprice. '</td>';
       $vproduct_list .= '<td>' .$vdate_added. '</td>';
       $vproduct_list .= '<td><a href="inventory_edit.php?pid=' .$vid. '">Sửa</a> &bull; <a href="inventory_list.php?deleteid=' .$vid. '">Xóa</a></td>';
       $vproduct_list .= "</tr>";

    	}
	}else{
			$vproduct_list = '<tr><td class="text-center" colspan="5">Không có sản phẩm nào!</td></tr>';
	}
?>
  
  <?php include "template_header_admin.php";?>
  <div class="container">
      


 <a name="inventoryForm" id="inventoryForm"></a>
    <h1 class="page-heading">
     Sửa Sản Phẩm 
    </h1>

<form class="form-horizontal" action="inventory_edit.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
  <div class="form-group">
    <label for="product_name" class="col-sm-2 control-label">Tên Sản Phẩm</label>
    <div class="col-sm-10">
      <input class="form-control" name="product_name" type="text" id="product_name" value="<?php echo $product_name; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="price" class="col-sm-2 control-label">Giá Sản Phẩm</label>
    <div class="col-sm-10">
      <input class="form-control" name="price" type="text" id="price" value="<?php echo $price; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Danh Mục</label>
    <div class="col-sm-10">
      <select class="form-control" name="category" id="category">
          <option value="Adidas">Adidas</option>
          <option value="Converse">Converse</option>
          <option value="Nike">Nike</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="fileField" class="col-sm-2 control-label">Hình Ảnh</label>
    <div class="col-sm-10">
      <input type="file" name="fileField" id="fileField" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input name="thisID" type="hidden" value="<?php echo $targetID; ?>" />
      <button type="submit" name="button" id="button" class="btn btn-primary">Lưu</button>
    </div>
  </div>
</form>

<h1 class="page-heading">Danh Sách Sản Phẩm</h1>
      
      <table class="table">
        <tr>
          <th width="5%">ID</th>
          <th width="30%">Tên</th>
          <th width="10%">Giá</th>
          <th width="35%">Ngày thêm</th>
          <th width="20%">Chức năng</th>
        </tr> 
        <?php echo $vproduct_list; ?>
      </table>

<?php include "template_footer_admin.php";?>