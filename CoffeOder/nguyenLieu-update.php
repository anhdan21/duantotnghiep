<?php
session_start();
require_once '../CoffeOder/API.php';

if (!isset($_GET['Id_nguyenLieu'])) {
    $_SESSION['err'] = "Bạn chưa chọn Role để sửa";
    header("Location:../man_chinh/Quan_ly_nguyen_lieu.html");
}
$id = intval($_GET['Id_nguyenLieu']);
try {
    $stmt = $conn->prepare("SELECT * FROM nguyenlieu WHERE Id_nguyenLieu = $id ");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $row = $stmt->fetch();

    if (empty($row)) {
        header("Location:../man_chinh/Quan_ly_nguyen_lieu.html");
    }
} catch (PDOException $e) {
    echo "<br>Loi truy van CSDL: " . $e->getMessage();
}

$err = [];
if (isset($_POST['btnSave'])) {
    $soLuong = $_POST['soLuong'];
    $price = $_POST['price'];
    $id_User = $_POST['id_User'];
    $ten_nguyenLieu = $_POST['ten_nguyenLieu'];
    // kiểm tra
    if (empty($soLuong) || empty($price) || empty($id_User) || empty($ten_nguyenLieu)) {
        $err[] = "Bạn chưa nhập đủ nội dung";
    }

    if (empty($err)) {

        try {
            $stmt = $conn->prepare("UPDATE nguyenlieu SET soLuong=:post_soLuong ,price=:post_price , id_User=:post_id_User , ten_nguyenLieu=:post_ten_nguyenLieu  WHERE Id_nguyenLieu=:get_id");
            // gắn dữ liệu vào tham số
            $stmt->bindParam(":post_soLuong", $soLuong);
            $stmt->bindParam(":post_price", $price);
            $stmt->bindParam(":post_id_User", $id_User);
            $stmt->bindParam(":post_ten_nguyenLieu",  $ten_nguyenLieu);

            $stmt->bindParam(":get_id", $id);
            // thực thi câu lệnh
            $stmt->execute();

            $_SESSION['err'] = "Cập nhật thành công!";

            header("Location:../man_chinh/Quan_ly_nguyen_lieu.html");
        } catch (PDOException $e) {
            $err[] = "Loi truy van CSDL: " . $e->getMessage();
        }
    }
}else if(isset($_POST['btnCancel'])){
    header("Location:../man_chinh/Quan_ly_nguyen_lieu.html");
}
?>

<!DOCTYPE html>
<html>

<head>
    <style>
#container {
    max-width: 50%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: left;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 70%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button[name="btnSave"], button[name="btnCancel"] {
    width: 50%;
    padding: 10px;
    margin-top: 10px;
    background-color: #008000;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button[name="btnSave"] {
    background-color: #008000; /* Màu xanh */
}

button[name="btnCancel"] {
    background-color: #ff0000; /* Màu đỏ */
}

    </style>
</head>

<body>
    <div id="container">
        <p><?php echo implode('<br>', $err); ?></p>

        <form action="" method="post">
            <span>ID :<?php echo $row['Id_nguyenLieu']; ?></span>

            <label for="soLuong">So luong</label>
            <input type="text" name="soLuong" value="<?php echo $row['soLuong']; ?>">

            <label for="price">Price</label>
            <input type="text" name="price" value="<?php echo $row['price']; ?>">

            <label for="id_User">Id User</label>
            <input type="text" name="id_User" value="<?php echo $row['id_User']; ?>">

            <label for="ten_nguyenLieu">Ten nguyen lieu</label>
            <input type="text" name="ten_nguyenLieu" value="<?php echo $row['ten_nguyenLieu']; ?>">

            <button name="btnSave">Save Update</button>
            <button name="btnCancel">Cancel</button>
        </form>
    </div>
</body>

</html>