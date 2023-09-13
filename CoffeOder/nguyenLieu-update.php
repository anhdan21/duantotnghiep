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
    // $img_nguyenLieu = $_POST['img_nguyenLieu'];
    $kieuNguyenLieu = $_POST['kieuNguyenLieu'];
    // kiểm tra
    if (empty($soLuong) || empty($price) || empty($id_User) || empty($ten_nguyenLieu)  ||  empty($kieuNguyenLieu) ) {
        $err[] = "Bạn chưa nhập đủ nội dung";
    }

    $target_dir = '../CoffeOder/uploads/';
    $target_file = $target_dir . basename($_FILES["img_nguyenLieu"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["img_nguyenLieu"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["img_nguyenLieu"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["img_nguyenLieu"]["name"])) . " has been uploaded.";
            $img_nguyenLieu = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    try {
        $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Lỗi kết nối CSDL: ' . $e->getMessage());
    }

    if (empty($err)) {

        try {
            $stmt = $conn->prepare("UPDATE nguyenlieu SET soLuong=:post_soLuong ,price=:post_price , id_User=:post_id_User , ten_nguyenLieu=:post_ten_nguyenLieu  , img_nguyenLieu=:post_img_nguyenLieu , kieuNguyenLieu=:post_kieuNguyenLieu WHERE Id_nguyenLieu=:get_id");
            // gắn dữ liệu vào tham số
            $stmt->bindParam(":post_soLuong", $soLuong);
            $stmt->bindParam(":post_price", $price);
            $stmt->bindParam(":post_id_User", $id_User);
            $stmt->bindParam(":post_ten_nguyenLieu",  $ten_nguyenLieu);
            $stmt->bindParam(":post_img_nguyenLieu",  $img_nguyenLieu);
            $stmt->bindParam(":post_kieuNguyenLieu",  $kieuNguyenLieu);
            $stmt->bindParam(":get_id", $id);
            // thực thi câu lệnh
            $stmt->execute();
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

        <form action="" method="post" enctype="multipart/form-data">
            <span>ID :<?php echo $row['Id_nguyenLieu']; ?></span>

            <label for="id_User">Id người nhập</label>
            <input type="text" name="id_User" value="<?php echo $row['id_User']; ?>">
            
            <label for="ten_nguyenLieu">Tên nguyên liệu</label>
            <input type="text" name="ten_nguyenLieu" value="<?php echo $row['ten_nguyenLieu']; ?>">

            <label for="soLuong">Số lượng</label>
            <input type="text" name="soLuong" value="<?php echo $row['soLuong']; ?>">

            <label for="price">Giá</label>
            <input type="text" name="price" value="<?php echo $row['price']; ?>">

            Select image to upload:
                    <input type="file" name="img_nguyenLieu" id="img_nguyenLieu"><br>

            <label for="ten_nguyenLieu">Kiểu dạng</label>
            <input type="text" name="kieuNguyenLieu" value="<?php echo $row['kieuNguyenLieu']; ?>">

            <button name="btnSave">Save Update</button>
            <button name="btnCancel">Cancel</button>
        </form>
    </div>
</body>

</html>