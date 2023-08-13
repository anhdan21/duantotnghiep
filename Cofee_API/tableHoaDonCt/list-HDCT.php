<?php
session_start();
if(isset($_SESSION['err'])){
    echo "<p style='color:red'>".$_SESSION['err']."</p>";
    unset($_SESSION['err']);
}

require_once '../API/json.php';

try{
   
    $stmt = $objConn->prepare("SELECT * FROM hoadonct ORDER BY Id_hoaDonCT ASC");

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<table border='1'>
            <tr> <th>Id HDCT</th> <th>id Hóa Đơn</th> <th>id sản phẩm</th> <th>thời gian</th> <th>giá sản phẩm</th> <th>tổng tiền</th> <th>trạng thái</th> <th>id giảm giá</th> </tr> ";

        foreach(   $stmt->fetchAll() as $row ){
            echo "<tr>
                        <td> {$row['Id_hoaDonCT']} </td>
                        <td> {$row['id_hoaDon']}  </td>
                        <td> {$row['id_sanPham']}   </td>
                        <td> {$row['time_Data']}   </td>
                        <td> {$row['gia_sanPham']} </td>
                        <td> {$row['tongTien']}  </td>
                        <td> {$row['trangThai']}   </td>
                        <td> {$row['id_giamGia']}   </td>
                  </tr>";
        } 

    echo '</table>'; 

}catch(PDOException $e){
    echo "<br>Loi truy van CSDL: ".$e->getMessage();
}

?>