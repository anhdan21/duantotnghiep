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
    
    $sql = "SELECT * FROM danhmuc";

    $result = $conn->query($sql);

    if($result -> num_rows > 0){
        $listDanhMuc = array();

        while($row = $result-> fetch_assoc())
        {
            array_push($listDanhMuc, new danhMuc($row["Id_danhMuc"],$row["ten_danhMuc"]));
        }
        
        echo json_encode($listDanhMuc);
    }else{
        echo "không có dữ liệu";
    }
    

class danhMuc
{
    public $_Id_danhMuc, $_ten_danhMuc;

    public function __construct($Id_danhMuc,$ten_danhMuc)
    {
        $this->_Id_danhMuc = $Id_danhMuc;
        $this->_ten_danhMuc = $ten_danhMuc;
    }
}

?>
