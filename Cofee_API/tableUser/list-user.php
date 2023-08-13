<?php
session_start();
if(isset($_SESSION['err'])){
    echo "<p style='color:red'>".$_SESSION['err']."</p>";
    unset($_SESSION['err']);
}

require_once '../API/json.php';

try{
   
    $stmt = $objConn->prepare("SELECT * FROM user ORDER BY Id_User ASC");

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<table border='1'>
            <tr> <th>ID</th> <th>tên người dùng</th> <th>Avatar</th> <th>mật khẩu</th> <th>số điện thoại</th>  <th>chức năng</th> <th>họ và tên</th> </tr> ";

        foreach(   $stmt->fetchAll() as $row ){
            echo "<tr>
                        <td> {$row['Id_User']} </td>
                        <td> {$row['userName']}  </td>
                        <td> <img src='{$row['image']}' width='200'  height='150' /> </td>
                        <td> {$row['passwd']} </td>
                        <td> {$row['phone_Number']}  </td>
                        <td> {$row['chucNang']}   </td>
                        <td> {$row['fullName']}   </td>
                  </tr>";
        } 

    echo '</table>'; 

}catch(PDOException $e){
    echo "<br>Loi truy van CSDL: ".$e->getMessage();
}

?>