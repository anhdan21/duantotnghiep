<?php
session_start();

require_once '../CoffeOder/API.php';

if (isset($_GET['id_giamGia']) && is_numeric($_GET['id_giamGia'])) {
    $id = intval($_GET['id_giamGia']);
} else {
    header("Location:../man_chinh/Khuyen_mai.html");
}

try {
    $stmt = $conn->prepare("SELECT * FROM giamgia WHERE id_giamGia = $id ");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row = $stmt->fetch();
    if (empty($row)) {
        $_SESSION['err'] = 'Không tồn tại Role cần xóa. Bạn vừa yêu cầu xóa Role ' .  $id;
        header("Location:../man_chinh/Khuyen_mai.html");
    }
} catch (PDOException $e) {
    echo "<br>Loi truy van CSDL: " . $e->getMessage();
}

// Thực hiện truy vấn để xóa sản phẩm khỏi CSDL
if (isset($_POST['Id'])) {
    try {
        $stmt = $conn->prepare("DELETE FROM giamgia WHERE id_giamGia = $id ");
        $stmt->execute();

        header("Location:../man_chinh/Khuyen_mai.html");
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
        Bạn muốn xóa : Id  <?php echo $row['id_giamGia'] ?> với khuyến mãi <?php echo $row['giam'] ?>% <br><br>

        <button name='Id'>Đồng ý xóa</button>
        <a href="../man_chinh/Khuyen_mai.html">Không xóa</a>
    </form>
</body>

</html>