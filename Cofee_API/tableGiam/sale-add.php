<?php

$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các tham số cần thiết đã được cung cấp hay chưa
    if (isset($_POST['time_Start'], $_POST['time_End'], $_POST['giam'])) {
        $time_Start = $_POST['time_Start'];
        $time_End = $_POST['time_End'];
        $giam = $_POST['giam'];
     

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
            $sql_str = "INSERT INTO `giamgia` (`time_Start`, `time_End`, `giam`) VALUES (:time_Start, :time_End, :giam)";
            $stmt = $objConn->prepare($sql_str);
            $stmt->bindParam(':time_Start', $time_Start);
            $stmt->bindParam(':time_End', $time_End);
            $stmt->bindParam(':giam', $giam);
          

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