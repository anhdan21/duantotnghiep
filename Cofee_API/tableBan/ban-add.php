<?php

$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các tham số cần thiết đã được cung cấp hay chưa
    if (isset($_POST['id_tang'], $_POST['trangThai'], $_POST['soBan'])) {
        $id_tang = $_POST['id_tang'];
        $trangThai = $_POST['trangThai'];
        $soBan = $_POST['soBan'];
  
     

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
            $sql_str = "INSERT INTO `table` (`id_tang`, `trangThai`, `soBan`) VALUES (:id_tang, :trangThai, :soBan)";
            $stmt = $objConn->prepare($sql_str);
            $stmt->bindParam(':id_tang', $id_tang);
            $stmt->bindParam(':trangThai', $trangThai);
            $stmt->bindParam(':soBan', $soBan);

          

            if ($stmt->execute() && $stmt->rowCount() > 0) {
                echo "User added successfully.";
            } else {
                echo "Failed to add user.";
            }
        } catch (PDOException $e) {
            die('Lỗi thêm user vào CSDL: ' . $e->getMessage());
        }
    } else {
        echo " ";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Bàn</title>
</head>
<body>

    <h1>Add bàn</h1>

    <form action="ban-add.php" method="POST">
        <label>id_tang: <input type="text" name="id_tang"></label><br>
        <label>trangThai: <input type="text" name="trangThai"></label><br>
        <label>soBan: <input type="text" name="soBan"></label><br>
        <input type="submit" value="Add User">
    </form>

</body>
</html>
