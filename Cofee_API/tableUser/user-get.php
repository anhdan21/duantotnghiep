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

$sql = "SELECT * FROM user";

$result = $conn->query($sql);

if($result -> num_rows > 0){
    $listUser = array();

    while($row = $result-> fetch_assoc())
    {
        array_push($listUser, new User($row["Id_User"],$row["userName"],$row["image"],$row["passwd"],$row["phone_Number"],$row["chucNang"],$row["fullName"]));
    }
    
    echo json_encode($listUser);
}else{
    echo "không có dữ liệu";
}

class User
{
    public $Id_User,$userName,$image,$passwd,$phone_Number,$chucNang,$fullName;

    public function __construct($Id_User,$userName,$image,$passwd,$phone_Number,$chucNang,$fullName)
    {
        $this->Id_User = $Id_User;
        $this->userName = $userName;
        $this->image = $image;
        $this->passwd = $passwd;
        $this->phone_Number = $phone_Number;
        $this->chucNang = $chucNang;
        $this->fullName = $fullName;
    }
}
?>
