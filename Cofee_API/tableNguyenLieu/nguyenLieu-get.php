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

$sql = "SELECT * FROM nguyenlieu";

$result = $conn->query($sql);

if($result -> num_rows > 0){
    $listNguyenLieu = array();

    while($row = $result-> fetch_assoc())
    {
        array_push($listNguyenLieu, new NguyenLieu($row["Id_nguyenLieu"],$row["soLuong"],$row["price"],$row["id_User"],$row["ten_nguyenLieu"]));
    }
    
    echo json_encode($listNguyenLieu);
}else{
    echo "không có dữ liệu";
}

class NguyenLieu
{
    public $_Id_nguyenLieu,$_soLuong,$_price, $_id_User,$_ten_nguyenLieu;

    public function __construct($Id_nguyenLieu,$soLuong,$price, $id_User,$ten_nguyenLieu)
    {
        $this->_Id_nguyenLieu = $Id_nguyenLieu;
        $this->_soLuong = $soLuong;
        $this->_price = $price;
        $this->_id_User = $id_User;
        $this->_ten_nguyenLieu = $ten_nguyenLieu;
       
    }
}
?>
