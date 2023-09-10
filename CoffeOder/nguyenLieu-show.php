<?php
session_start();
if (isset($_SESSION['err'])) {
    echo "<p style='color:red'>" . $_SESSION['err'] . "</p>";
    unset($_SESSION['err']);
}
require_once '../CoffeOder/API.php';

try {
    $stmt = $conn->prepare("SELECT * FROM nguyenlieu ORDER BY Id_nguyenLieu ASC");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo "<table border='1'>
            <tr> <th>ID</th> <th>Quantity</th> <th>Price</th> <th>id user</th> <th>Name</th> <th>Setup</th></tr> ";
    foreach ($stmt->fetchAll() as $row) {
        $link_delete = '../CoffeOder/nguyenLieu-delete.php?Id_nguyenLieu=' . $row['Id_nguyenLieu'];
        $link_edit = '../CoffeOder/nguyenLieu-update.php?Id_nguyenLieu=' . $row['Id_nguyenLieu'];
        echo "<tr>
                        <td> {$row['Id_nguyenLieu']} </td>
                        <td> {$row['soLuong']}  </td>
                        <td> {$row['price']}   </td>
                        <td> {$row['id_User']}   </td>
                        <td> {$row['ten_nguyenLieu']} </td>
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
?>