<?php

include 'API.php';

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các tham số cần thiết đã được cung cấp hay chưa
    if (isset($_POST['Id_nguyenLieu'], $_POST['soLuong'], $_POST['price'], $_POST['id_User'], $_POST['ten_nguyenLieu'])) {
        $Id_nguyenLieu = $_POST['Id_nguyenLieu'];
        $soLuong = $_POST['soLuong'];
        $price = $_POST['price'];
        $id_User = $_POST['id_User'];
        $ten_nguyenLieu = $_POST['ten_nguyenLieu'];

        // Thực hiện kết nối CSDL
        try {
            $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Lỗi kết nối CSDL: ' . $e->getMessage());
        }

        // Kiểm tra xem nguyên liệu có tồn tại trong CSDL hay không
        $sql_check_nguyenlieu = "SELECT * FROM `nguyenlieu` WHERE `Id_nguyenLieu` = :Id_nguyenLieu";
        $stmt_check_nguyenlieu = $objConn->prepare($sql_check_nguyenlieu);
        $stmt_check_nguyenlieu->bindParam(':Id_nguyenLieu', $Id_nguyenLieu);
        $stmt_check_nguyenlieu->execute();
        $nguyenlieu = $stmt_check_nguyenlieu->fetch(PDO::FETCH_ASSOC);

        if (!$nguyenlieu) {
            echo "Nguyên liệu không tồn tại.";
            exit;
        }

        // Thực hiện truy vấn để update thông tin nguyên liệu trong CSDL
        try {
            $sql_update = "UPDATE `nguyenlieu` SET `soLuong` = :soLuong, `price` = :price, `id_User` = :id_User, `ten_nguyenLieu` = :ten_nguyenLieu WHERE `Id_nguyenLieu` = :Id_nguyenLieu";
            $stmt_update = $objConn->prepare($sql_update);
            $stmt_update->bindParam(':soLuong', $soLuong);
            $stmt_update->bindParam(':price', $price);
            $stmt_update->bindParam(':id_User', $id_User);
            $stmt_update->bindParam(':ten_nguyenLieu', $ten_nguyenLieu);
            $stmt_update->bindParam(':Id_nguyenLieu', $Id_nguyenLieu);

            if ($stmt_update->execute() && $stmt_update->rowCount() > 0) {
                echo "Nguyên liệu đã được cập nhật thành công.";
            } else {
                echo "Không thể cập nhật nguyên liệu.";
            }
        } catch (PDOException $e) {
            die('Lỗi cập nhật nguyên liệu: ' . $e->getMessage());
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin cần cập nhật.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update nguyên liệu</title>
</head>
<body>

    <h1>Update nguyên liệu</h1>

    <form action="nguyenLieu-update.php" method="POST">
        <label>Id_nguyenLieu: <input type="text" name="Id_nguyenLieu"></label><br>
        <label>soLuong: <input type="text" name="soLuong"></label><br>
        <label>price: <input type="text" name="price"></label><br>
        <label>id_User: <input type="text" name="id_User"></label><br>
        <label>ten_nguyenLieu: <input type="text" name="ten_nguyenLieu"></label><br>

        <input type="submit" value="Update nguyên liệu">
    </form>

</body>
</html>
