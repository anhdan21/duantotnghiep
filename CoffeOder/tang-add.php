<?php

include 'API.php';

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các tham số cần thiết đã được cung cấp hay chưa
    if (isset($_POST['soTang'])) {
        $soTang = $_POST['soTang'];
       
       

        // Thực hiện kết nối CSDL
        try {
            $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Lỗi kết nối CSDL: ' . $e->getMessage());
        }

        try {
            $sql_str = "INSERT INTO `tang` (`soTang`) VALUES (:soTang)";
            $stmt = $objConn->prepare($sql_str);
            $stmt->bindParam(':soTang', $soTang);
           

            if ($stmt->execute() && $stmt->rowCount() > 0) {
                echo "Thêm tầng thành công.";
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
    <title>Add Tầng</title>
</head>
<body>

    <h1>Add Tầng</h1>

    <form action="tang-add.php" method="POST">
        <label>Số Tầng: <input type="text" name="soTang"></label><br>
      
        <input type="submit" value="Add Tầng">
    </form>

</body>
</html>
