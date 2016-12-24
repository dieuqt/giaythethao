<?php 
    $key = $_GET["keyword"];       
                    //count product
    $res_cou = mysql_query("SELECT product.product_id FROM product WHERE product.name LIKE '%$key%' or product.category like '%$key%'");
    $cou = mysql_num_rows($res_cou);
                

    $res=mysql_query("SELECT name, price, category, age, imglink, idphone FROM product WHERE phonename LIKE '%$key%' or _product.brand like '%$key%' limit $page_num, $per_page");
                    while($row=mysql_fetch_array($res)){
                                echo "<div class='col-md-4 text-center col-sm-6 col-xs-6'>";
                                echo "<div class='thumbnail product-box' style='height:300px'>";
                                echo "<img style='height:135px' src='".$row["imglink"]."'/>";
                                echo "<div class='caption'>";
                                echo "<br>";
                                
                                echo "<h4>".$row["phonename"]."<h4>";
                                echo "<h5>$".$row["price"]."<h5>";
                                echo '<form action="product.php" method="post"><button type="submit" class="btn btn-success" name="product" value='.$row["idphone"].'>Contact</button></form>';
                                echo "</div></div></div>";
                            }
?>
