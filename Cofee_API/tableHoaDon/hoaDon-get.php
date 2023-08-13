<?php
// Thông tin kết nối database
$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";


$conn = new mysqli($db_host,$db_user,$db_pass,$db_name);
mysqli_set_charset($conn,'utf8');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM hoadon";

$result = $conn->query($sql);

if($result -> num_rows > 0){
    $listHoaDon = array();

    while($row = $result-> fetch_assoc())
    {
        array_push($listHoaDon, new HoaDon($row["Id_hoaDon"],$row["id_Table"],$row["giaTien"],$row["id_User"]));
    }
    
    echo json_encode($listHoaDon);
}else{
    echo "không có dữ liệu";
}

class HoaDon{
    public $_Id_hoaDon,$_id_Table,$_giaTien, $_id_User;

    public function __construct($Id_hoaDon,$id_Table,$giaTien, $id_User)
    {
        $this->_Id_hoaDon = $Id_hoaDon;
        $this->_id_Table = $id_Table;
        $this->_giaTien = $giaTien;
        $this->_id_User = $id_User;
    }
}

?>
