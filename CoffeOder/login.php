<?php
// Thông tin kết nối database
include 'API.php';

$showForm = true;
$message = ""; // Biến để lưu thông báo

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem ID và password đã được cung cấp hay chưa
    if (isset($_POST['userName']) && isset($_POST['passwd'])) {
        $userName = $_POST['userName'];
        $passwd = $_POST['passwd'];
        
        try {
            // Kết nối tới database sử dụng PDO
            $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            
            // Truy vấn dữ liệu từ bảng user dựa trên ID và password
            $stmt = $conn->prepare("SELECT * FROM `user` WHERE `userName` = :userName AND `passwd` = :passwd");
            $stmt->bindParam(':userName', $userName);
            $stmt->bindParam(':passwd', $passwd);
            $stmt->execute();

            // Lấy tất cả các bản ghi và chuyển thành mảng kết quả JSON
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Hiển thị kết quả JSON hoặc hiển thị thông báo
            if ($stmt->rowCount() > 0) {
                // Loại bỏ mật khẩu từ mảng kết quả trước khi trả về
                foreach ($result as &$user) {
                    unset($user['passwd']);
                }
                echo json_encode($result);
            } else {
                $message = "Không tìm thấy người dùng.";
            }
            $showForm = false;
        } catch(PDOException $e) {
            $message = "Không thể kết nối đến CSDL: " . $e->getMessage();
        }

        // Đóng kết nối database
        $conn = null;
    } else {
        $message = "Vui lòng nhập tên người dùng và mật khẩu.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Get User Info</title>
</head>
<body>

    <h1>Get thông tin user</h1>
    <?php if ($showForm) { ?>
    <form action="login.php" method="POST">
        <label>userName: <input type="text" name="userName"></label><br>
        <label>passwd: <input type="password" name="passwd"></label><br>
        <input type="submit" value="Get user">
    </form>
    <?php } ?>
    
    <p><?php echo $message; ?></p>

</body>
</html>
