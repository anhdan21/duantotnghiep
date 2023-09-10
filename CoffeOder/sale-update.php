<?php
session_start();
require_once '../CoffeOder/API.php';

if (!isset($_GET['id_giamGia'])) {
    $_SESSION['err'] = "Bạn chưa chọn Role để sửa";
    header("Location:../man_chinh/Khuyen_mai.html");
}
$id = intval($_GET['id_giamGia']);
try {
    $stmt = $conn->prepare("SELECT * FROM giamgia WHERE id_giamGia = $id ");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $row = $stmt->fetch();

    if (empty($row)) {
        header("Location:../man_chinh/Khuyen_mai.html");
    }
} catch (PDOException $e) {
    echo "<br>Loi truy van CSDL: " . $e->getMessage();
}

$err = [];
if (isset($_POST['btnSave'])) {
    $time_Start = $_POST['time_Start'];
    $time_End = $_POST['time_End'];
    $giam = $_POST['giam'];

    // kiểm tra
    if (empty($time_Start) || empty($time_End) || empty($giam)) {
        $err[] = "Bạn chưa nhập đủ nội dung";
    }

    if (empty($err)) {

        try {
            $stmt = $conn->prepare("UPDATE giamgia SET time_Start=:post_time_Start ,time_End=:post_time_End , giam=:post_giam  WHERE id_giamGia=:get_id");
            // gắn dữ liệu vào tham số
            $stmt->bindParam(":post_time_Start", $time_Start);
            $stmt->bindParam(":post_time_End", $time_End);
            $stmt->bindParam(":post_giam", $giam);

            $stmt->bindParam(":get_id", $id);
            // thực thi câu lệnh
            $stmt->execute();

            $_SESSION['err'] = "Cập nhật thành công!";

            header("Location:../man_chinh/Khuyen_mai.html");
        } catch (PDOException $e) {
            $err[] = "Loi truy van CSDL: " . $e->getMessage();
        }
    }
} else if (isset($_POST['btnCancel'])) {
    header("Location:../man_chinh/Khuyen_mai.html");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update thông tin bàn</title>
    <style>
        /* Định dạng h1 */
        h1 {
            font-size: 24px;
            /* Kích thước font */
            color: #333;
            /* Màu chữ */
        }

        /* Định dạng label */
        label {
            display: block;
            /* Hiển thị mỗi label trên một dòng */
            margin-bottom: 10px;
            /* Khoảng cách giữa các label */
            font-weight: bold;
            /* In đậm chữ của label */
        }

        /* Định dạng input */
        input[type="date"],
        input[type="text"] {
            width: 100%;
            /* Độ rộng 100% của input */
            padding: 10px;
            /* Khoảng cách bên trong input */
            margin-bottom: 15px;
            /* Khoảng cách giữa các input */
            border: 1px solid #ccc;
            /* Viền của input */
            border-radius: 5px;
            /* Bo tròn góc input */
        }

        /* Định dạng nút */
        button {
            width: 100px;
            /* Độ rộng của nút */
            padding: 10px;
            /* Khoảng cách bên trong nút */
            background-color: #007bff;
            /* Màu nền của nút (ví dụ màu xanh dương) */
            color: #fff;
            /* Màu chữ trắng */
            border: none;
            /* Loại bỏ đường viền */
            border-radius: 5px;
            /* Bo tròn góc của nút */
            cursor: pointer;
            /* Biến con trỏ thành một chiếc tay nếu di chuột qua nút */
        }

        /* Định dạng nút Cancel */
        button[name="btnCancel"] {
            background-color: #ccc;
            /* Màu nền của nút Cancel (ví dụ màu xám) */
            color: #333;
            /* Màu chữ của nút Cancel */
        }

        /* Định dạng nút khi di chuột qua */
        button:hover {
            background-color: #0056b3;
            /* Màu nền thay đổi khi di chuột qua */
        }
    </style>
</head>

<body>

    <h1>Update thông tin bàn</h1>

    <form action="" method="POST">
        <label>Thời gian bắt đầu: <input type="date" name="time_Start" value="<?php echo $row['time_Start']; ?>"></label><br>
        <label>Thời gian kết thúc: <input type="date" name="time_End" value="<?php echo $row['time_End']; ?>"></label><br>
        <label>Khuyễn mãi: <input type="text" name="giam" value="<?php echo $row['giam']; ?>"></label><br>

        <button name="btnSave">Save Update</button>
        <button name="btnCancel">Cancel</button>
    </form>

</body>

</html>