<?php
session_start();
if(isset($_SESSION['err'])){
    echo "<p style='color:red'>".$_SESSION['err']."</p>";
    unset($_SESSION['err']);
}

require_once '../API/json.php';

try{
   
    $stmt = $objConn->prepare("SELECT * FROM hoadon ORDER BY Id_hoaDon ASC");

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<table border='1'>
            <tr> <th>ID</th> <th>id table</th> <th>Gía Tiền</th> <th>id user</th>  </tr> ";

        foreach(   $stmt->fetchAll() as $row ){
            echo "<tr>
                        <td> {$row['Id_hoaDon']} </td>
                        <td> {$row['id_Table']}  </td>
                        <td> {$row['giaTien']}   </td>
                        <td> {$row['id_User']}   </td>
                  </tr>";
        } 

    echo '</table>'; 

}catch(PDOException $e){
    echo "<br>Loi truy van CSDL: ".$e->getMessage();
}

?>