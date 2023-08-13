<?php
// Thông tin kết nối database
$db_host = "localhost:3306";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

try {
    // Kết nối tới database sử dụng PDO
    $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
   
    $objConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    echo "Ket noi CSDL thanh cong!"; 

}catch(Exception $ex) {
    die("Loi ket noi CSDL: " .$ex->getMessage() );
}
?>