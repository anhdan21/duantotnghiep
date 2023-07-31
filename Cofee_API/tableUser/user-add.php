<?php

$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các tham số cần thiết đã được cung cấp hay chưa
    if (isset($_POST['username'], $_POST['image'], $_POST['passwd'], $_POST['phone_Number'] , $_POST['chucNang'], $_POST['fullname'])) {
        $username = $_POST['username'];
        $passwd = $_POST['passwd'];
        $phone_Number = $_POST['phone_Number'];
        $fullname = $_POST['fullname'];
        $chucNang = $_POST['chucNang'];
        $image = $_POST['image'];

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
            $sql_str = "INSERT INTO `user` (`username`, `image`, `passwd`, `phone_Number`,`chucNang`, `fullname`) VALUES (:username, :image, :passwd, :phone_Number,:chucNang, :fullname)";
            $stmt = $objConn->prepare($sql_str);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':passwd', $passwd);
            $stmt->bindParam(':phone_Number', $phone_Number);
            $stmt->bindParam(':chucNang', $chucNang);
            $stmt->bindParam(':fullname', $fullname);

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