<?php
// Thông tin kết nối database
include 'API.php';
// ... (Thông tin kết nối CSDL và các xử lý lỗi)

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    // Truy vấn dữ liệu từ bảng hoá đơn
    $stmt = $conn->query("SELECT * FROM hoadonct");

    // Tạo mảng lưu trữ kết quả JSON
    $resultArray = array();

    // Lặp qua các bản ghi hoá đơn
    while ($hoadon = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Truy vấn danh sách các mục (items) cho mỗi hoá đơn
        $stmt_items = $conn->prepare("SELECT * FROM hoadon_item WHERE hoadon_item_id = :hoadon_item_id");
        $stmt_items->bindParam(':hoadon_item_id', $hoadon['hoadon_item_id']); // Thay 'id' bằng tên cột tương ứng trong bảng hoá đơn
        $stmt_items->execute();
        $items = $stmt_items->fetchAll(PDO::FETCH_ASSOC);

        // Tạo cấu trúc JSON cho hoá đơn với mảng danh sách các mục
        $hoadonWithItems = array(
            'hoadon' => $hoadon,
            'items' => $items
        );

        // Thêm cấu trúc JSON vào mảng tổng hợp
        $resultArray[] = $hoadonWithItems;
    }

    // Thiết lập header để trả về JSON
    header('Content-Type: application/json');

    // Trả về chuỗi JSON kết quả
    echo json_encode($resultArray);
} catch(PDOException $e) {
    // ... (Xử lý lỗi)
}

// ... (Đóng kết nối CSDL)
?>


