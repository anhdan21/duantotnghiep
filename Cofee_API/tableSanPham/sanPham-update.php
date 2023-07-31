<?php

$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các tham số cần thiết đã được cung cấp hay chưa
    if (isset($_POST['Id_sanPham'],$_POST['ten_sp'], $_POST['giaSanPham'], $_POST['size'], $_POST['anhSanPham'], $_POST['giaSanPham'], $_POST['gioiThieu'], $_POST['id_danhMuc'], $_POST['id_giamGia'])) {
        $Id_sanPham = $_POST['Id_sanPham'];
        $ten_sp = $_POST['ten_sp'];
        $giaSanPham = $_POST['giaSanPham'];
        $size = $_POST['size'];
        $anhSanPham = $_POST['anhSanPham'];
        $gioiThieu = $_POST['gioiThieu'];
        $id_danhMuc = $_POST['id_danhMuc'];
        $id_giamGia = $_POST['id_giamGia'];

        // Thực hiện kết nối CSDL
        try {
            $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Lỗi kết nối CSDL: ' . $e->getMessage());
        }

        // Kiểm tra và xử lý giá trị nhập liệu hợp lệ
        // (Bạn nên thực hiện kiểm tra hợp lệ và xử lý nhập liệu dựa trên yêu cầu cụ thể của ứng dụng)
        // Ví dụ: Xử lý giá trị rỗng, kiểm tra định dạng email, v.v.

        // Kiểm tra xem sản phẩm có tồn tại trong CSDL hay không
        $sql_check_product = "SELECT * FROM `sanpham` WHERE `Id_sanPham` = :Id_sanPham";
        $stmt_check_product = $objConn->prepare($sql_check_product);
        $stmt_check_product->bindParam(':Id_sanPham', $Id_sanPham);
        $stmt_check_product->execute();
        $product = $stmt_check_product->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            echo "Sản phẩm không tồn tại.";
            exit;
        }

        // Thực hiện truy vấn để update thông tin sản phẩm trong CSDL
        try {
            $sql_update = "UPDATE `sanpham` SET `ten_sp` = :ten_sp, `giaSanPham` = :giaSanPham, `size` = :size, `anhSanPham` = :anhSanPham, `gioiThieu` = :gioiThieu, `id_danhMuc` = :id_danhMuc, `id_giamGia` = :id_giamGia WHERE `Id_sanPham` = :Id_sanPham";
            $stmt_update = $objConn->prepare($sql_update);
            $stmt_update->bindParam(':ten_sp', $ten_sp);
            $stmt_update->bindParam(':giaSanPham', $giaSanPham);
            $stmt_update->bindParam(':size', $size);
            $stmt_update->bindParam(':anhSanPham', $anhSanPham);
            $stmt_update->bindParam(':gioiThieu', $gioiThieu);
            $stmt_update->bindParam(':id_danhMuc', $id_danhMuc);
            $stmt_update->bindParam(':id_giamGia', $id_giamGia);
            $stmt_update->bindParam(':Id_sanPham', $Id_sanPham);

            if ($stmt_update->execute() && $stmt_update->rowCount() > 0) {
                echo "Sản phẩm đã được cập nhật thành công.";
            } else {
                echo "Không thể cập nhật sản phẩm.";
            }
        } catch (PDOException $e) {
            die('Lỗi cập nhật sản phẩm: ' . $e->getMessage());
        }
    } else {
        echo "";
    }
}

?>