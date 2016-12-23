<?php 
if (isset($_REQUEST['search'])) {
    $key = addslashes($_GET['keyword']);
    if (empty($key)) {
        echo "Yêu cầu nhập từ khóa";
    } else {
            $query = "SELECT product.product_id FROM product WHERE product.name LIKE '%$key%' or product.category like '%$key%'");
              include '../data_access_helper.php';
                // Thực thi câu truy vấn
            $sql = mysql_query($query);
 
                // Đếm số đong trả về trong sql.
            $num = mysql_num_rows($sql);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
            if ($num > 0 && $key != "") 
              {
                    // Dùng $num để đếm số dòng trả về.
                echo "$num ket qua tra ve voi tu khoa <b>$key</b>";
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    echo '<table border="1" cellspacing="0" cellpadding="10">';
                    while ($row = mysql_fetch_assoc($sql)) {
                        echo '<tr>';
                            echo "<td>{$row['user_id']}</td>";
                            echo "<td>{$row['username']}</td>";
                            echo "<td>{$row['password']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>{$row['address']}</td>";
                        echo '</tr>';
                    }
                    echo '</table>';
                } 
                else {
                    echo "Khong tim thay ket qua!";
                }
    }
}
?>
