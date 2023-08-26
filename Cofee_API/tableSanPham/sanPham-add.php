<?php

$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các tham số cần thiết đã được cung cấp hay chưa
    if (isset($_POST['ten_sp'], $_POST['giaSanPham'], $_POST['size'], $_POST['anhSanPham'] , $_POST['giaSanPham'], $_POST['gioiThieu'], $_POST['id_danhMuc'], $_POST['id_giamGia'])) {
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

        // Thực hiện truy vấn để thêm người dùng vào CSDL
        try {
            $sql_str = "INSERT INTO `sanpham` (`ten_sp`, `giaSanPham`, `size`, `anhSanPham`, `gioiThieu`, `id_danhMuc`, `id_giamGia`) VALUES 
            (:ten_sp, :giaSanPham, :size, :anhSanPham, :gioiThieu, :id_danhMuc, :id_giamGia)";
            $stmt = $objConn->prepare($sql_str);
            $stmt->bindParam(':ten_sp', $ten_sp);
            $stmt->bindParam(':giaSanPham', $giaSanPham);
            $stmt->bindParam(':size', $size);
            $stmt->bindParam(':anhSanPham', $anhSanPham);
            $stmt->bindParam(':gioiThieu', $gioiThieu);
            $stmt->bindParam(':id_danhMuc', $id_danhMuc);
            $stmt->bindParam(':id_giamGia', $id_giamGia);

            if ($stmt->execute() && $stmt->rowCount() > 0) {
                echo "User added successfully.";
            } else {
                echo "Failed to add user.";
            }
        } catch (PDOException $e) {
            die('Lỗi thêm user vào CSDL: ' . $e->getMessage());
        }
    } else {
        echo "";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Sản phẩm</title>
</head>
<body>

    <h1>Add Sản phẩm</h1>

    <form action="sanPham-add.php" method="POST">
        <label>ten_sp: <input type="text" name="ten_sp"></label><br>
        <label>giaSanPham: <input type="text" name="giaSanPham"></label><br>
        <label>size: <input type="text" name="size"></label><br>
        <label>anhSanPham: <input type="text" name="anhSanPham"></label><br>
        <label>gioiThieu: <input type="text" name="gioiThieu"></label><br>
        <label>id_danhMuc: <input type="text" name="id_danhMuc"></label><br>
        <label>id_giamGia: <input type="text" name="id_giamGia"></label><br>
        <input type="submit" value="Add User">
    </form>

</body>
</html>
