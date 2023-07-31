<?php

$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem ID sản phẩm cần xóa đã được cung cấp hay chưa
    if (isset($_POST['Id_nguyenLieu'])) {
        $Id_nguyenLieu = $_POST['Id_nguyenLieu'];

        // Thực hiện kết nối CSDL
        try {
            $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Lỗi kết nối CSDL: ' . $e->getMessage());
        }

        // Kiểm tra xem sản phẩm có tồn tại trong CSDL hay không
        $sql_check_product = "SELECT * FROM `nguyenlieu` WHERE `Id_nguyenLieu` = :Id_nguyenLieu";
        $stmt_check_product = $objConn->prepare($sql_check_product);
        $stmt_check_product->bindParam(':Id_nguyenLieu', $Id_nguyenLieu);
        $stmt_check_product->execute();
        $product = $stmt_check_product->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            echo "Nguyên liệu không tồn tại.";
            exit;
        }

        // Thực hiện truy vấn để xóa sản phẩm khỏi CSDL
        try {
            $sql_delete = "DELETE FROM `nguyenlieu` WHERE `Id_nguyenLieu` = :Id_nguyenLieu";
            $stmt_delete = $objConn->prepare($sql_delete);
            $stmt_delete->bindParam(':Id_nguyenLieu', $Id_nguyenLieu);

            if ($stmt_delete->execute() && $stmt_delete->rowCount() > 0) {
                echo "Nguyên liệu đã được xóa thành công.";
            } else {
                echo "Không thể xóa nguyên liệu.";
            }
        } catch (PDOException $e) {
            die('Lỗi xóa sản phẩm: ' . $e->getMessage());
        }
    } else {
        echo "Vui lòng nhập ID nguyên liệu cần xóa.";
    }
}

?>