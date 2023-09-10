<?php

include 'API.php';

$sid = $_GET['id'];

$Cons = mysqli_connect("localhost", "root", "" , "coffeoder");
$xoa_sql = "DELETE FROM user WHERE Id_User= $sid  " ;
 
mysqli_query($Cons,$xoa_sql);
header("Location: user-get.php");
// // Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Kiểm tra xem ID sản phẩm cần xóa đã được cung cấp hay chưa
//     if (isset($_POST['id_User'])) {
//         $id_User = $_POST['id_User'];

//         // Thực hiện kết nối CSDL
//         try {
//             $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
//             $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         } catch (PDOException $e) {
//             die('Lỗi kết nối CSDL: ' . $e->getMessage());
//         }

//         // Kiểm tra xem sản phẩm có tồn tại trong CSDL hay không
//         $sql_check_product = "SELECT * FROM `user` WHERE `id_User` = :id_User";
//         $stmt_check_product = $objConn->prepare($sql_check_product);
//         $stmt_check_product->bindParam(':id_User', $id_User);
//         $stmt_check_product->execute();
//         $product = $stmt_check_product->fetch(PDO::FETCH_ASSOC);

//         if (!$product) {
//             echo "Sản phẩm không tồn tại.";
//             exit;
//         }

//         // Thực hiện truy vấn để xóa sản phẩm khỏi CSDL
//         try {
//             $sql_delete = "DELETE FROM `user` WHERE `id_User` = :id_User";
//             $stmt_delete = $objConn->prepare($sql_delete);
//             $stmt_delete->bindParam(':id_User', $id_User);

//             if ($stmt_delete->execute() && $stmt_delete->rowCount() > 0) {
//                 echo "Sản phẩm đã được xóa thành công.";
//             } else {
//                 echo "Không thể xóa sản phẩm.";
//             }
//         } catch (PDOException $e) {
//             die('Lỗi xóa sản phẩm: ' . $e->getMessage());
//         }
//     } else {
//         echo "Vui lòng nhập ID sản phẩm cần xóa.";
//     }
// }

?>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Xóa Sản phẩm</title>
</head>
<body>

    <h1>Xóa Sản phẩm</h1>

    <form action="user-delete.php" method="POST">
        <label>id sản phẩm: <input type="text" name="id_User"></label><br>
        <input type="submit" value="Xóa Sản phẩm">
    </form>

</body>
</html> -->
