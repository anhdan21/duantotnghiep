<?php

$db_host = "localhost";
$db_name = "du_an_tot_ngiep";
$db_user = "root";
$db_pass = "";

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các tham số cần thiết đã được cung cấp hay chưa
    if (isset($_POST['ten_nguyenLieu'], $_POST['price'], $_POST['soLuong'], $_POST['id_User'])) {
        $ten_nguyenLieu = $_POST['ten_nguyenLieu'];
        $price = $_POST['price'];
        $soLuong = $_POST['soLuong'];
        $id_User = $_POST['id_User'];
     

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
            $sql_str = "INSERT INTO `nguyenlieu` (`ten_nguyenLieu`, `price`, `soLuong`, `id_User`) VALUES (:ten_nguyenLieu, :price, :soLuong, :id_User)";
            $stmt = $objConn->prepare($sql_str);
            $stmt->bindParam(':ten_nguyenLieu', $ten_nguyenLieu);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':soLuong', $soLuong);
            $stmt->bindParam(':id_User', $id_User);

          

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

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Add giảm giá</title>
</head>
<body>

    <h1>Add giảm giá</h1>

    <form action="nguyenLieu-add.php" method="POST">
        <label>ten_nguyenLieu: <input type="text" name="ten_nguyenLieu"></label><br>
        <label>price: <input type="text" name="price"></label><br>
        <label>soLuong: <input type="text" name="soLuong"></label><br>
        <label>id_User: <input type="text" name="id_User"></label><br>
        <input type="submit" value="Add User">
    </form>

</body>
</html> -->
