<?php

include 'API.php';

$id_tang = $_POST['id_tang'];
$trangThai = $_POST['trangThai'];
$soBan = $_POST['soBan'];
$id = $_POST['sid'];


$Cons = mysqli_connect("localhost", "root", "" , "coffeoder");
 
$update = "UPDATE `table` SET id_tang= '$id_tang', trangThai= '$trangThai',soBan=$soBan WHERE Id_Table= $id";
// echo $update;exit;
if(mysqli_query($Cons,$update)){
    header("Location: ban-get.php");
} 
// // Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Kiểm tra xem tất cả các tham số cần thiết đã được cung cấp hay chưa
//     if (isset($_POST['Id_Table'], $_POST['id_tang'], $_POST['trangThai'], $_POST['soBan'])) {
//         $Id_Table = $_POST['Id_Table'];
//         $id_tang = $_POST['id_tang'];
//         $trangThai = $_POST['trangThai'];
//         $soBan = $_POST['soBan'];

//         // Thực hiện kết nối CSDL
//         try {
//             $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
//             $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         } catch (PDOException $e) {
//             die('Lỗi kết nối CSDL: ' . $e->getMessage());
//         }

//         // Kiểm tra xem bàn có tồn tại trong CSDL hay không
//         $sql_check_table = "SELECT * FROM `tables` WHERE `Id_Table` = :Id_Table";
//         $stmt_check_table = $objConn->prepare($sql_check_table);
//         $stmt_check_table->bindParam(':Id_Table', $Id_Table);
//         $stmt_check_table->execute();
//         $table = $stmt_check_table->fetch(PDO::FETCH_ASSOC);

//         if (!$table) {
//             echo "Bàn không tồn tại.";
//         } else {
//             // Thực hiện truy vấn để cập nhật thông tin bàn trong CSDL
//             try {
//                 $sql_update = "UPDATE `tables` SET `id_tang` = :id_tang, `trangThai` = :trangThai, `soBan` = :soBan WHERE `Id_Table` = :Id_Table";
//                 $stmt_update = $objConn->prepare($sql_update);
//                 $stmt_update->bindParam(':id_tang', $id_tang);
//                 $stmt_update->bindParam(':trangThai', $trangThai);
//                 $stmt_update->bindParam(':soBan', $soBan);
//                 $stmt_update->bindParam(':Id_Table', $Id_Table);

            

//                 if ($stmt_update->execute() && $stmt_update->rowCount() > 0) {
//                     echo "Thông tin bàn đã được cập nhật thành công.";
//                 } else {
//                     echo "Không thể cập nhật thông tin bàn.";
//                 }
//             } catch (PDOException $e) {
//                 die('Lỗi cập nhật thông tin bàn: ' . $e->getMessage());
//             }
//         }
//     } else {
//         echo "Vui lòng điền đầy đủ thông tin cần cập nhật.";
//     }
// }

?>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Update thông tin bàn</title>
</head>
<body>

    <h1>Update thông tin bàn</h1>

    <form action="ban-update.php" method="POST">
        <label>Id_Table: <input type="text" name="Id_Table"></label><br>
        <label>id_tang: <input type="text" name="id_tang"></label><br>
        <label>trangThai: <input type="text" name="trangThai"></label><br>
        <label>soBan: <input type="text" name="soBan"></label><br>

        <input type="submit" value="Update thông tin bàn">
    </form>

</body>
</html> -->
