<?php

$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem ID sản phẩm cần xóa đã được cung cấp hay chưa
    if (isset($_POST['id_giamGia'])) {
        $id_giamGia = $_POST['id_giamGia'];

        // Thực hiện kết nối CSDL
        try {
            $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Lỗi kết nối CSDL: ' . $e->getMessage());
        }

        // Kiểm tra xem sản phẩm có tồn tại trong CSDL hay không
        $sql_check_product = "SELECT * FROM `giamgia` WHERE `id_giamGia` = :id_giamGia";
        $stmt_check_product = $objConn->prepare($sql_check_product);
        $stmt_check_product->bindParam(':id_giamGia', $id_giamGia);
        $stmt_check_product->execute();
        $product = $stmt_check_product->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            echo "Nguyên liệu không tồn tại.";
            exit;
        }

        // Thực hiện truy vấn để xóa sản phẩm khỏi CSDL
        try {
            $sql_delete = "DELETE FROM `giamgia` WHERE `id_giamGia` = :id_giamGia";
            $stmt_delete = $objConn->prepare($sql_delete);
            $stmt_delete->bindParam(':id_giamGia', $id_giamGia);

            if ($stmt_delete->execute() && $stmt_delete->rowCount() > 0) {
                echo "Giảm giá đã được xóa thành công.";
            } else {
                echo "Không thể xóa giảm giá.";
            }
        } catch (PDOException $e) {
            die('Lỗi xóa giảm giá: ' . $e->getMessage());
        }
    } else {
        echo "Vui lòng nhập ID giảm giá cần xóa.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Xóa giảm giá</title>
</head>
<body>

    <h1>Xóa giảm giá</h1>

    <form action="sale-delete.php" method="POST">
        <label>id sản phẩm: <input type="text" name="id_giamGia"></label><br>
        <input type="submit" value="Xóa Sản phẩm">
    </form>

</body>
</html>
