<?php
session_start();
if(isset($_SESSION['err'])){
    echo "<p style='color:red'>".$_SESSION['err']."</p>";
    unset($_SESSION['err']);
}

require_once '../API/json.php';

try{
   
    $stmt = $objConn->prepare("SELECT * FROM nguyenlieu ORDER BY Id_nguyenLieu ASC");

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<table border='1'>
            <tr> <th>ID</th> <th>số lượng</th> <th>Gía Tiền</th> <th>id user</th> <th>tên nguyên liệu</th> </tr> ";

        foreach(   $stmt->fetchAll() as $row ){
            echo "<tr>
                        <td> {$row['Id_nguyenLieu']} </td>
                        <td> {$row['soLuong']}  </td>
                        <td> {$row['price']}   </td>
                        <td> {$row['id_User']}   </td>
                        <td> {$row['ten_nguyenLieu']}   </td>
                  </tr>";
        } 

    echo '</table>'; 

}catch(PDOException $e){
    echo "<br>Loi truy van CSDL: ".$e->getMessage();
}

?>