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

$sql = "SELECT * FROM sanpham";

$result = $conn->query($sql);

if($result -> num_rows > 0){
    $listSanPham = array();

    while($row = $result-> fetch_assoc())
    {
        array_push($listSanPham, new SanPham($row["Id_sanPham"],$row["id_danhMuc"],$row["giaSanPham"],$row["gioiThieu"],$row["anhSanPham"],$row["id_giamGia"],$row["ten_sp"],$row["size"],$row["soluong"],$row["note"]));
    }
    
    echo json_encode($listSanPham);
}else{
    echo "không có dữ liệu";
}

class SanPham
{
    public $_Id_sanPham,$_id_danhMuc,$_giaSanPham, $_gioiThieu,$_anhSanPham,$_id_giamGia,$_ten_sp,$_size,$_soluong,$_note;

    public function __construct($Id_sanPham,$id_danhMuc,$giaSanPham, $gioiThieu,$anhSanPham,$id_giamGia,$ten_sp,$size,$soluong,$note)
    {
        $this->_Id_sanPham = $Id_sanPham;
        $this->_id_danhMuc = $id_danhMuc;
        $this->_giaSanPham = $giaSanPham;
        $this->_gioiThieu = $gioiThieu;
        $this->_anhSanPham = $anhSanPham;
        $this->_id_giamGia = $id_giamGia;
        $this->_ten_sp = $ten_sp;
        $this->_size = $size;
        $this->_soluong = $soluong;
        $this->_note = $note;
    }
}
?>
