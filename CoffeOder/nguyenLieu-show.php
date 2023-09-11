<?php
session_start();
if (isset($_SESSION['err'])) {
    echo "<p style='color:red'>" . $_SESSION['err'] . "</p>";
    unset($_SESSION['err']);
}
require_once '../CoffeOder/API.php';

try {
    $stmt = $conn->prepare("SELECT * FROM nguyenlieu ORDER BY Id_nguyenLieu ASC");
    $stmt = $conn->prepare("SELECT nguyenlieu.*, user.fullName AS nameUser 
    FROM nguyenlieu
    INNER JOIN user ON nguyenlieu.id_User = user.id_User
    ORDER BY nguyenlieu.id_User ASC");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo "<table border='1'>
            <tr> <th>Tên nguyên liệu</th> <th>Ảnh</> <th>Số lượng</th> <th>Giá</th> <th>Người nhập</th> <th>Kiểu dạng</th> <th>Thao tác</th></tr> ";
    foreach ($stmt->fetchAll() as $row) {
        $link_delete = '../CoffeOder/nguyenLieu-delete.php?Id_nguyenLieu=' . $row['Id_nguyenLieu'];
        $link_edit = '../CoffeOder/nguyenLieu-update.php?Id_nguyenLieu=' . $row['Id_nguyenLieu'];
        echo "<tr>
                        <td> {$row['ten_nguyenLieu']} </td>
                        <td><img src='{$row['img_nguyenLieu']}' width='200' height='150' /></td>
                        <td> {$row['soLuong']}  </td>
                        <td> {$row['price']}   </td>
                        <td> {$row['nameUser']}   </td>
                        <td> {$row['kieuNguyenLieu']}   </td>
                        <td>
                        <a href='$link_edit'>Edit</a>
                        |
                        <a href=' $link_delete'>Delete</a>
                        </td>
            </tr>";
    }

    echo '</table>';
} catch (PDOException $e) {
    echo "<br>Loi truy van CSDL: " . $e->getMessage();
}
