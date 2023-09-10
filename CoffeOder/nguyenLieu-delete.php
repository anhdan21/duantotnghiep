<dialog id="dialog_delete_nl">
    <?php
    session_start();

    require_once '../CoffeOder/API.php';

    if (isset($_GET['Id_nguyenLieu']) && is_numeric($_GET['Id_nguyenLieu'])) {
        $id = intval($_GET['Id_nguyenLieu']);
    } else {
        header("Location:../man_chinh/Quan_ly_nguyen_lieu.html");
    }

    try {
        $stmt = $conn->prepare("SELECT * FROM nguyenLieu WHERE Id_nguyenLieu = $id ");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        if (empty($row)) {
            $_SESSION['err'] = 'Không tồn tại Role cần xóa. Bạn vừa yêu cầu xóa Role ' .  $id;
            header("Location:../man_chinh/Quan_ly_nguyen_lieu.html");
        }
    } catch (PDOException $e) {
        echo "<br>Loi truy van CSDL: " . $e->getMessage();
    }

    // Thực hiện truy vấn để xóa sản phẩm khỏi CSDL
    if (isset($_POST['Id_nguyenLieu'])) {
        try {
            $stmt = $conn->prepare("DELETE FROM nguyenLieu WHERE Id_nguyenLieu = $id ");
            $stmt->execute();

            header("Location:../man_chinh/Quan_ly_nguyen_lieu.html");
        } catch (PDOException $e) {
            echo "<br>Loi truy van CSDL: " . $e->getMessage();
        }
    }
    ?>
</dialog>

<!DOCTYPE html>
<html>

<head>
    <title>Xóa nguyên liệu</title>
</head>

<body>
    <h1>Xóa nguyên liệu</h1>
    <form action="" method="POST">
        Bạn cần xóa : <?php echo $row['ten_nguyenLieu'] ?> <br>
        <a onclick="myFunction()">
            <button name='Id_nguyenLieu'>Đồng ý xóa</button>
        </a>
        <a href="../man_chinh/Quan_ly_nguyen_lieu.html" onclick="close">Không xóa</a>
    </form>
</body>

</html>

<script>
    function myFunction() {
        const element = document.getElementById("dialog_delete_nl");
        element.open = true;
    }

    function close() {
        const element = document.getElementById("dialog_delete_nl");
        element.open = false;
    }
</script>