<?php
// Thông tin kết nối database
include 'API.php';

$showForm = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem ID sản phẩm cần xóa đã được cung cấp hay chưa
    if (isset($_POST['id_giamGia'])) {
        $id_giamGia = $_POST['id_giamGia'];
        
        try {
            // Kết nối tới database sử dụng PDO
            $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            
            // Truy vấn dữ liệu từ bảng table
            $stmt = $conn->prepare("SELECT * FROM `giamgia` WHERE `id_giamGia` = :id_giamGia");
            $stmt->bindParam(':id_giamGia', $id_giamGia);
            $stmt->execute();

            // Lấy tất cả các bản ghi và chuyển thành mảng kết quả JSON
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Thiết lập header để trả về JSON
            header('Content-Type: application/json');
            
            // Hiển thị kết quả JSON hoặc trả về mã lỗi HTTP 404 Not Found nếu không có bản ghi nào được tìm thấy
            echo ($stmt->rowCount() > 0) ? json_encode($result) : http_response_code(404);
            $showForm = false;
        } catch(PDOException $e) {
            // Trả về mã lỗi HTTP 500 Internal Server Error nếu xảy ra lỗi trong quá trình kết nối hoặc truy vấn
            http_response_code(500);
            echo json_encode(array("message" => "Unable to retrieve data: " . $e->getMessage()));
        }

        // Đóng kết nối database
        $conn = null;
    } else {
        echo "Vui lòng nhập ID bàn cần tìm.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Get id sale</title>
</head>
<body>

    <h1>Get id sale</h1>
    <?php if ($showForm) { ?>
    <form action="sale-get-id.php" method="POST">
        <label>id_giamGia: <input type="text" name="id_giamGia"></label><br>
    
        <input type="submit" value="Get sale">
    </form>
    <?php } ?>

</body>
</html>
