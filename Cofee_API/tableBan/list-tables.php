<?php
session_start();
if(isset($_SESSION['err'])){
    echo "<p style='color:red'>".$_SESSION['err']."</p>";
    unset($_SESSION['err']);
}

require_once '../API/json.php';

try{
   
    $stmt = $objConn->prepare("SELECT * FROM tables ORDER BY Id_Table ASC");

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<table border='1'>
            <tr> <th>ID</th> <th>Id tặng</th> <th>Trạng thái</th> <th>Số Bàn</th>  </tr> ";

        foreach(   $stmt->fetchAll() as $row ){
            echo "<tr>
                        <td> {$row['Id_Table']}  </td>
                        <td> {$row['id_tang']}   </td>
                        <td> {$row['trangThai']} </td>
                        <td> {$row['soBan']}     </td>
                       
                  </tr>";
        } 

    echo '</table>'; 

}catch(PDOException $e){
    echo "<br>Loi truy van CSDL: ".$e->getMessage();
}

?>