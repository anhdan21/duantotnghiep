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

$sql = "SELECT * FROM hoadonct";

$result = $conn->query($sql);

if($result -> num_rows > 0){
    $listHoaDonCT = array();

    while($row = $result-> fetch_assoc())
    {
        array_push($listHoaDonCT, new HoaDonCT($row["Id_hoaDonCT"],$row["id_hoaDon"],$row["id_sanPham"],$row["time_Data"],$row["gia_sanPham"],$row["tongTien"],$row["trangThai"],$row["id_giamGia"]));
    }
    
    echo json_encode($listHoaDonCT);
}else{
    echo "không có dữ liệu";
}

class HoaDonCT {
    public $_Id_hoaDonCT,$_id_hoaDon,$_id_sanPham, $_time_Data,$_gia_sanPham,$_tongTien,$_trangThai,$_id_giamGia;

    public function __construct($Id_hoaDonCT,$id_hoaDon,$id_sanPham, $time_Data,$gia_sanPham,$tongTien,$trangThai,$id_giamGia)
    {
        $this->_Id_hoaDonCT = $Id_hoaDonCT;
        $this->_id_hoaDon = $id_hoaDon;
        $this->_id_sanPham = $id_sanPham;
        $this->_time_Data = $time_Data;
        $this->_gia_sanPham = $gia_sanPham;
        $this->_tongTien = $tongTien;
        $this->_trangThai = $trangThai;
        $this->_id_giamGia = $id_giamGia;
    }
}

?>
