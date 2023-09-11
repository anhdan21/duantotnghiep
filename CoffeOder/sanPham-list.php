<?php
session_start();
if (isset($_SESSION['err'])) {
    echo "<p style='color:red'>" . $_SESSION['err'] . "</p>";
    unset($_SESSION['err']);
}

require_once '../CoffeOder/API.php';

try {
    $stmt = $conn->prepare("SELECT * FROM sanpham ORDER BY Id_sanPham ASC;");
    $stmt = $conn->prepare("SELECT sanpham.*, danhmuc.ten_danhMuc AS ten_danhmuc 
    -- ,giamgia.giam AS Giam
    FROM sanpham
    INNER JOIN danhmuc ON sanpham.Id_danhMuc = danhmuc.Id_danhMuc
    -- INNER JOIN giamgia ON sanpham.id_giamGia = giamgia.id_giamGia
    ORDER BY sanpham.Id_sanPham ASC");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo "<table border='1'>
            <tr> <th>Danh Mục</th> <th>Tên sản phẩm</th> <th>Ảnh sản phẩm</th>  <th>Giá</th> <th style='width:40%'>Giới thiệu</th>  <th>Kích cỡ</th> <th style='width:100px'>Thao tác</th> </tr> ";

    foreach ($stmt->fetchAll() as $row) {
        $link_delete = '../CoffeOder/sanPham-delete.php?Id_sanPham='.$row['Id_sanPham'];
        $link_edit = '../CoffeOder/sanPham-update.php?Id_sanPham='.$row['Id_sanPham'];
        echo "<tr>
            <td>{$row['ten_danhmuc']}</td>
            <td>{$row['ten_sp']}</td>
            <td><img src='{$row['anhSanPham']}' width='200' height='150' /></td>
            <td>{$row['giaSanPham']}</td>
            <td>{$row['gioiThieu']}</td>
            <td>{$row['size']}</td>
           
            <td>
                <a href=' $link_edit'>Edit</a>  |  <a href=' $link_delete'>Delete</a>
            </td>
        </tr>";
    }
    // <td>{$row['Giam']}%</td>
    echo '</table>';
} catch (PDOException $e) {
    echo "<br>Loi truy van CSDL: " . $e->getMessage();
}
