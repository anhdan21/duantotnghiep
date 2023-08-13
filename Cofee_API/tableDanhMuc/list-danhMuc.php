<?php
session_start();
if(isset($_SESSION['err'])){
    echo "<p style='color:red'>".$_SESSION['err']."</p>";
    unset($_SESSION['err']);
}

require_once '../API/json.php';

try{
   
    $stmt = $objConn->prepare("SELECT * FROM danhmuc ORDER BY Id_danhMuc ASC");

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<table border='1'>
            <tr> <th>ID</th> <th>Danh mục</th>  </tr> ";

        foreach(   $stmt->fetchAll() as $row ){
            echo "<tr>
                        <td> {$row['Id_danhMuc']}  </td>
                        <td> {$row['ten_danhMuc']}   </td>
                       
                  </tr>";
        } 

    echo '</table>'; 

}catch(PDOException $e){
    echo "<br>Loi truy van CSDL: ".$e->getMessage();
}

?>