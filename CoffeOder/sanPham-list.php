<?php
session_start();
if(isset($_SESSION['err'])){
    echo "<p style='color:red'>".$_SESSION['err']."</p>";
    unset($_SESSION['err']);
}

require_once '../CoffeOder/API.php';

try{
   
    $stmt = $conn->prepare("SELECT * FROM sanpham ORDER BY Id_sanPham ASC");

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<table border='1'>
            <tr> <th>ID</th> <th>Id category</th> <th>Price</th> <th>Introduce</th> <th>Image product</th>  <th>Discount id</th> <th>Name product</th> <th>Size</th> <th>Note</th> </tr> ";

        foreach(   $stmt->fetchAll() as $row ){
          
            echo "<tr>
            <td>{$row['Id_sanPham']}</td>
            <td>{$row['id_danhMuc']}</td>
            <td>{$row['giaSanPham']}</td>
            <td>{$row['gioiThieu']}</td>
            <td><img src='{$row['anhSanPham']}' width='200' height='150' /></td>
            <td>{$row['id_giamGia']}</td>
            <td>{$row['ten_sp']}</td>
            <td>{$row['size']}</td>
            <td>{$row['note']}</td>
        </tr>";
        } 

    echo '</table>'; 

}catch(PDOException $e){
    echo "<br>Loi truy van CSDL: ".$e->getMessage();
}

?>