<?php
// Thông tin kết nối database
$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

try {
    // Kết nối tới database sử dụng PDO
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    
    // Truy vấn dữ liệu từ bảng employee_data
    $stmt = $conn->query("SELECT * FROM danhmuc");

    // Lấy tất cả các bản ghi và chuyển thành mảng kết quả JSON
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Thiết lập header để trả về JSON
    header('Content-Type: application/json');
        
    // Hiển thị kết quả JSON hoặc trả về mã lỗi HTTP 404 Not Found nếu không có bản ghi nào được tìm thấy
    echo ($stmt->rowCount() > 0) ? json_encode($result) : http_response_code(404);
} catch(PDOException $e) {
    // Trả về mã lỗi HTTP 500 Internal Server Error nếu xảy ra lỗi trong quá trình kết nối hoặc truy vấn
    http_response_code(500);
    echo json_encode(array("message" => "Unable to retrieve data: " . $e->getMessage()));
}

// Đóng kết nối database
$conn = null;
?>
