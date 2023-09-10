<?php
session_start();
if (isset($_SESSION['err'])) {
    echo "<p style='color:red'>" . $_SESSION['err'] . "</p>";
    unset($_SESSION['err']);
}
require_once '../CoffeOder/API.php';

try {
    $stmt = $conn->prepare("SELECT * FROM giamgia ORDER BY id_giamGia ASC");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo "<table border='1' >
            <tr> <th>ID</th> <th>Thời giam bắt đầu</th> <th>Thời gian kết thúc</th> <th>Khuyến mãi</th> <th>Setup</th></tr> ";
    foreach ($stmt->fetchAll() as $row) {
        $link_delete = '../CoffeOder/sale-delete.php?id_giamGia=' . $row['id_giamGia'];
        $link_edit = '../CoffeOder/sale-update.php?id_giamGia=' . $row['id_giamGia'];
        echo "<tr>
                        <td> {$row['id_giamGia']} </td>
                        <td> {$row['time_Start']}  </td>
                        <td> {$row['time_End']}   </td>
                        <td> {$row['giam']} % </td>
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
