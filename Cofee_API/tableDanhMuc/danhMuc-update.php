<?php

$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả Id_danhMuc tham số cần thiết đã được cung cấp hay chưa
    if (isset($_POST['Id_danhMuc'], $_POST['ten_danhMuc'])) {
        $Id_danhMuc = $_POST['Id_danhMuc'];
        $ten_danhMuc = $_POST['ten_danhMuc'];


        // Thực hiện kết nối CSDL
        try {
            $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Lỗi kết nối CSDL: ' . $e->getMessage());
        }

        // Kiểm tra xem bàn có tồn tại trong CSDL hay không
        $sql_check_table = "SELECT * FROM `danhmuc` WHERE `Id_danhMuc` = :Id_danhMuc";
        $stmt_check_table = $objConn->prepare($sql_check_table);
        $stmt_check_table->bindParam(':Id_danhMuc', $Id_danhMuc);
        $stmt_check_table->execute();
        $table = $stmt_check_table->fetch(PDO::FETCH_ASSOC);

        if (!$table) {
            echo "Bàn không tồn tại.";
        } else {
            // Thực hiện truy vấn để cập nhật thông tin bàn trong CSDL
            try {
                $sql_update = "UPDATE `danhmuc` SET `ten_danhMuc` = :ten_danhMuc WHERE `Id_danhMuc` = :Id_danhMuc";
                $stmt_update = $objConn->prepare($sql_update);
                $stmt_update->bindParam(':ten_danhMuc', $ten_danhMuc);
                $stmt_update->bindParam(':Id_danhMuc', $Id_danhMuc);

                if ($stmt_update->execute() && $stmt_update->rowCount() > 0) {
                    echo "Thông tin danh mục đã được cập nhật thành công.";
                } else {
                    echo "Không thể cập nhật thông tin danh mục.";
                }
            } catch (PDOException $e) {
                die('Lỗi cập nhật thông tin bàn: ' . $e->getMessage());
            }
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin cần cập nhật.";
    }
}

?>