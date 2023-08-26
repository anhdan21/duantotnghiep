<?php

$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các tham số cần thiết đã được cung cấp hay chưa
    if (isset($_POST['ten_danhMuc'])) {
        $ten_danhMuc = $_POST['ten_danhMuc'];
       
       

        // Thực hiện kết nối CSDL
        try {
            $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Lỗi kết nối CSDL: ' . $e->getMessage());
        }

        try {
            $sql_str = "INSERT INTO `danhmuc` (`ten_danhMuc`) VALUES (:ten_danhMuc)";
            $stmt = $objConn->prepare($sql_str);
            $stmt->bindParam(':ten_danhMuc', $ten_danhMuc);
           

            if ($stmt->execute() && $stmt->rowCount() > 0) {
                echo "Thêm danh mục thành công.";
            } else {
                echo "Failed to add user.";
            }
        } catch (PDOException $e) {
            die('Lỗi thêm user vào CSDL: ' . $e->getMessage());
        }
    } else {
        echo "";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Danh Mục</title>
</head>
<body>

    <h1>Add Danh Mục</h1>

    <form action="danhMuc-add.php" method="POST">
        <label>Tên danh mục: <input type="text" name="ten_danhMuc"></label><br>
      
        <input type="submit" value="Add Tầng">
    </form>

</body>
</html>
