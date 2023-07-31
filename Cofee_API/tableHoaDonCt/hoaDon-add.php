<?php
$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các tham số cần thiết đã được cung cấp hay chưa
    if (isset($_POST['id_hoaDon'], $_POST['id_sanPham'], $_POST['time_Data'], $_POST['gia_sanPham'], $_POST['tongTien'], $_POST['trangThai'], $_POST['id_giamGia'])) {
        $id_hoaDon = $_POST['id_hoaDon'];
        $id_sanPham = $_POST['id_sanPham'];
        $time_Data = $_POST['time_Data'];
        $gia_sanPham = $_POST['gia_sanPham'];
        $tongTien = $_POST['tongTien'];
        $trangThai = $_POST['trangThai'];
        $id_giamGia = $_POST['id_giamGia'];

        // Thực hiện kết nối CSDL
        try {
            $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Lỗi kết nối CSDL: ' . $e->getMessage());
        }

        // Thực hiện truy vấn để thêm sản phẩm vào CSDL
        try {
            $sql_str = "INSERT INTO `hoadonct` (`id_hoaDon`, `id_sanPham`, `time_Data`, `gia_sanPham`, `tongTien`, `trangThai`, `id_giamGia`) VALUES 
            (:id_hoaDon, :id_sanPham, :time_Data, :gia_sanPham, :tongTien, :trangThai, :id_giamGia)";
            $stmt = $objConn->prepare($sql_str);
            $stmt->bindParam(':id_hoaDon', $id_hoaDon);
            $stmt->bindParam(':id_sanPham', $id_sanPham);
            $stmt->bindParam(':time_Data', $time_Data);
            $stmt->bindParam(':gia_sanPham', $gia_sanPham);
            $stmt->bindParam(':tongTien', $tongTien);
            $stmt->bindParam(':trangThai', $trangThai);
            $stmt->bindParam(':id_giamGia', $id_giamGia);

            if ($stmt->execute() && $stmt->rowCount() > 0) {
                echo "Sản phẩm added successfully.";
            } else {
                echo "Failed to add sản phẩm.";
            }
        } catch (PDOException $e) {
            die('Lỗi thêm sản phẩm vào CSDL: ' . $e->getMessage());
        }
    } else {
        echo "Missing required parameters.";
    }
}
?>