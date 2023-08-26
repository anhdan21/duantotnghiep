<?php

$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem ID sản phẩm cần xóa đã được cung cấp hay chưa
    if (isset($_POST['Id_Table'])) {
        $Id_Table = $_POST['Id_Table'];

        // Thực hiện kết nối CSDL
        try {
            $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Lỗi kết nối CSDL: ' . $e->getMessage());
        }

        // Kiểm tra xem sản phẩm có tồn tại trong CSDL hay không
        $sql_check_product = "SELECT * FROM `table` WHERE `Id_Table` = :Id_Table";
        $stmt_check_product = $objConn->prepare($sql_check_product);
        $stmt_check_product->bindParam(':Id_Table', $Id_Table);
        $stmt_check_product->execute();
        $product = $stmt_check_product->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            echo "Nguyên liệu không tồn tại.";
            exit;
        }

        // Thực hiện truy vấn để xóa sản phẩm khỏi CSDL
        try {
            $sql_delete = "DELETE FROM `table` WHERE `Id_Table` = :Id_Table";
            $stmt_delete = $objConn->prepare($sql_delete);
            $stmt_delete->bindParam(':Id_Table', $Id_Table);

            if ($stmt_delete->execute() && $stmt_delete->rowCount() > 0) {
                echo "Giảm giá đã được xóa thành công.";
            } else {
                echo "Không thể xóa bàn.";
            }
        } catch (PDOException $e) {
            die('Lỗi xóa bàn: ' . $e->getMessage());
        }
    } else {
        echo "Vui lòng nhập ID bàn cần xóa.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Xóa bàn</title>
</head>
<body>

    <h1>Xóa bàn</h1>

    <form action="ban-delete.php" method="POST">
        <label>id bàn: <input type="text" name="Id_Table"></label><br>
        <input type="submit" value="Xóa Sản phẩm">
    </form>

</body>
</html>
