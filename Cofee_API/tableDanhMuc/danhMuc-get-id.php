<?php
// Thông tin kết nối database
$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

$showForm = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem ID sản phẩm cần xóa đã được cung cấp hay chưa
    if (isset($_POST['Id_danhMuc'])) {
        $Id_danhMuc = $_POST['Id_danhMuc'];
        
        try {
            // Kết nối tới database sử dụng PDO
            $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            
            // Truy vấn dữ liệu từ bảng table
            $stmt = $conn->prepare("SELECT * FROM `danhmuc` WHERE `Id_danhMuc` = :Id_danhMuc");
            $stmt->bindParam(':Id_danhMuc', $Id_danhMuc);
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
    <title>Get id danh mục</title>
</head>
<body>

    <h1>Get id danh mục</h1>
    <?php if ($showForm) { ?>
    <form action="danhMuc-get-id.php" method="POST">
        <label>Id_danhMuc: <input type="text" name="Id_danhMuc"></label><br>
    
        <input type="submit" value="Get Bàn">
    </form>
    <?php } ?>

</body>
</html>
