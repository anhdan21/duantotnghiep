<?php
$db_host = "localhost";
$db_name = "du_an_tot_ngiep";
$db_user = "root";
$db_pass = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['Id_hoaDonCT'])){
        $id_hoadonct = $_POST['Id_hoaDonCT']; 
    
    try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    // Lấy id hoadonct từ yêu cầu POST hoặc GET
   

    // Truy vấn dữ liệu từ bảng hoá đơn chi tiết dựa trên id_hoadonct
    $stmt_hoadonct = $conn->prepare("SELECT * FROM hoadonct WHERE Id_hoaDonCT = :Id_hoaDonCT");
    $stmt_hoadonct->bindParam(':Id_hoaDonCT', $id_hoadonct);
    $stmt_hoadonct->execute();
    $hoadonct = $stmt_hoadonct->fetch(PDO::FETCH_ASSOC);

    // Truy vấn danh sách các mục (items) cho hoá đơn chi tiết
    $stmt_items = $conn->prepare("SELECT * FROM hoadon_item WHERE hoadon_item_id = :hoadon_item_id");
    $stmt_items->bindParam(':hoadon_item_id', $hoadonct['hoadon_item_id']);
    $stmt_items->execute();
    $items = $stmt_items->fetchAll(PDO::FETCH_ASSOC);

    foreach ($items as &$item) {
        $stmt_nameSp = $conn->prepare("SELECT ten_sp, note FROM sanpham WHERE id_sanPham = :id_sanPham");
        $stmt_nameSp->bindParam(':id_sanPham', $item['id_sanPham']);
        $stmt_nameSp->execute();
        $row = $stmt_nameSp->fetch(PDO::FETCH_ASSOC);
        $item['ten_sp'] = $row['ten_sp']; // Thêm tên sản phẩm vào mảng item
        $item['note'] = $row['note'];     // Thêm giá trị "note" vào mảng item
    }
   

    // Tạo cấu trúc JSON cho hoá đơn chi tiết với mảng danh sách các mục
    $hoadonctWithItems = array(
        'hoadonct' => $hoadonct,
        'items' => $items
    );

    // Thiết lập header để trả về JSON
    header('Content-Type: application/json');

    // Trả về chuỗi JSON kết quả
    echo json_encode($hoadonctWithItems);
} catch(PDOException $e) {
    die('Lỗi thêm sản phẩm vào CSDL: ' . $e->getMessage());
}
    }else {
        echo "Missing required parameters.";
}
}

// ... (Đóng kết nối CSDL)
?>
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Get hoa don ct id</title>
</head>
<body>

    <h1>Get hoa don ct id</h1>

    <form action="hoaDon-get-id.php" method="POST">
        <label>Id_hoaDonCT: <input type="text" name="Id_hoaDonCT"></label><br>
        <input type="submit" value="Lấy thông tin">
    </form>

</body>
</html> -->
