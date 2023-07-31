<?php

$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các tham số cần thiết đã được cung cấp hay chưa
    if (isset($_POST['id_User'], $_POST['userName'], $_POST['image'], $_POST['passwd'], $_POST['phone_Number'], $_POST['chucNang'], $_POST['fullName'])) {
        $id_User = $_POST['id_User'];
        $userName = $_POST['userName'];
        $image = $_POST['image'];
        $passwd = $_POST['passwd'];
        $phone_Number = $_POST['phone_Number'];
        $chucNang = $_POST['chucNang'];
        $fullName = $_POST['fullName'];

        // Thực hiện kết nối CSDL
        try {
            $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Lỗi kết nối CSDL: ' . $e->getMessage());
        }

        // Kiểm tra xem người dùng có tồn tại trong CSDL hay không
        $sql_check_user = "SELECT * FROM `user` WHERE `id_User` = :id_User";
        $stmt_check_user = $objConn->prepare($sql_check_user);
        $stmt_check_user->bindParam(':id_User', $id_User);
        $stmt_check_user->execute();
        $user = $stmt_check_user->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            echo "Người dùng không tồn tại.";
            exit;
        }

        // Thực hiện truy vấn để update thông tin người dùng trong CSDL
        try {
            $sql_update = "UPDATE `user` SET `userName` = :userName, `image` = :image, `passwd` = :passwd, `phone_Number` = :phone_Number, `chucNang` = :chucNang, `fullName` = :fullName WHERE `id_User` = :id_User";
            $stmt_update = $objConn->prepare($sql_update);
            $stmt_update->bindParam(':userName', $userName);
            $stmt_update->bindParam(':image', $image);
            $stmt_update->bindParam(':passwd', $passwd);
            $stmt_update->bindParam(':phone_Number', $phone_Number);
            $stmt_update->bindParam(':chucNang', $chucNang);
            $stmt_update->bindParam(':fullName', $fullName);
            $stmt_update->bindParam(':id_User', $id_User);

            if ($stmt_update->execute() && $stmt_update->rowCount() > 0) {
                echo "Người dùng đã được cập nhật thành công.";
            } else {
                echo "Không thể cập nhật người dùng.";
            }
        } catch (PDOException $e) {
            die('Lỗi cập nhật người dùng: ' . $e->getMessage());
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin cần cập nhật.";
    }
}

