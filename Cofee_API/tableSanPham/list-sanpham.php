<?php
session_start();
if(isset($_SESSION['err'])){
    echo "<p style='color:red'>".$_SESSION['err']."</p>";
    unset($_SESSION['err']);
}

require_once '../API/json.php';

try{
   
    $stmt = $objConn->prepare("SELECT * FROM sanpham ORDER BY Id_sanPham ASC");

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<table border='1'>
            <tr> <th>ID</th> <th>id danh mục</th> <th>giá sản phẩm</th> <th>giới thiệu</th> <th>ảnh sản phẩm</th>  <th>id giảm giá</th> <th>tên sản phẩm</th> <th>Size</th> <th>số lượng</th> <th>ghi chú</th> </tr> ";

        foreach(   $stmt->fetchAll() as $row ){
            echo "<tr>
                        <td> {$row['Id_sanPham']} </td>
                        <td> {$row['id_danhMuc']}  </td>
                        <td> {$row['giaSanPham']}   </td>
                        <td> {$row['gioiThieu']}   </td>
                        <td> <img src='{$row['anhSanPham']}' width='200'  height='150' /> </td>
                        <td> {$row['id_giamGia']} </td>
                        <td> {$row['ten_sp']}  </td>
                        <td> {$row['size']}   </td>
                        <td> {$row['soluong']}   </td>
                        <td> {$row['note']}   </td>
                  </tr>";
        } 

    echo '</table>'; 

}catch(PDOException $e){
    echo "<br>Loi truy van CSDL: ".$e->getMessage();
}

?>