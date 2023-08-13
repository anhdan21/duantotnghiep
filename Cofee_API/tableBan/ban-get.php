<?php
// Thông tin kết nối database
$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";


    // Kết nối tới database sử dụng PDO
    //$conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $conn = new mysqli($db_host,$db_user,$db_pass,$db_name);
    mysqli_set_charset($conn,'utf8');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `tables`";
    $stmt = $conn->query($sql);

    if($stmt->num_rows > 0){
        $listTable = array();

        while($row = $stmt->fetch_assoc()){
            array_push($listTable, new tablemodel($row["Id_Table"],$row["id_tang"],$row["trangThai"],$row["soBan"]));

        }
        echo json_encode($listTable); 
    }else {
        echo "không có dữ liệu";
    }

class tablemodel
{
    public $_id_Table,$_id_Tang,$_trangThai, $_soBan;

    public function __construct($Id_Table,$id_tang,$trangThai,$soBan)
    {
        $this->_id_Table = $Id_Table;
        $this->_id_Tang = $id_tang;
        $this->_trangThai = $trangThai;
        $this->_soBan = $soBan;
    }

}   

?>

