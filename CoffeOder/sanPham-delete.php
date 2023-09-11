<?php
session_start();

require_once '../CoffeOder/API.php';

if (isset($_GET['Id_sanPham']) && is_numeric($_GET['Id_sanPham'])) {
    $id = intval($_GET['Id_sanPham']);
} else {
    header("Location:../man_chinh/Quan_ly_do_uong.html");
}

$checkQuery = "SELECT COUNT(*) FROM hoadon_item WHERE Id_sanPham = :idSanPham"; 
$stmt = $conn->prepare($checkQuery);
$stmt->bindParam(':idSanPham', $id, PDO::PARAM_INT);
$stmt->execute();

$count = $stmt->fetchColumn();

if ($count > 0) {
    echo "<script>alert('Sản phẩm này đang được sử dụng và không thể xóa.')</script>";
    echo "<script>window.location.href = '../man_chinh/Quan_ly_do_uong.html';</script>";
    exit; 
}


try {
    $stmt = $conn->prepare("SELECT * FROM sanpham WHERE Id_sanPham = $id ");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row = $stmt->fetch();
    if (empty($row)) {
        $_SESSION['err'] = 'Không tồn tại Role cần xóa. Bạn vừa yêu cầu xóa Role ' .  $id;
        header("Location:../man_chinh/Quan_ly_do_uong.html");
    }
} catch (PDOException $e) {
    echo "<br>Loi truy van CSDL: " . $e->getMessage();
}

if (isset($_POST['Id'])) {
    try {
        $stmt = $conn->prepare("DELETE FROM sanpham WHERE Id_sanPham = $id ");
        $stmt->execute();

        header("Location:../man_chinh/Quan_ly_do_uong.html");
    } catch (PDOException $e) {
        echo "<br>Loi truy van CSDL: " . $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Xóa Sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="../man_chinh/delete.css">
</head>
<body>
    <h3>Xóa nguyên liệu</h3>
    <form action="" method="POST">
        Bạn muốn xóa : <?php echo $row['ten_sp'] ?> <br><br>

        <button name='Id'>Đồng ý xóa</button>
        <a href="../man_chinh/Quan_ly_do_uong.html">Không xóa</a>
    </form>
</body>

</html>