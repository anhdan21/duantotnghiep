<?php

include 'API.php';

$id_danhMuc = $_POST['id_danhMuc'];
$giaSanPham = $_POST['giaSanPham'];
$gioiThieu = $_POST['gioiThieu'];
//$anhSanPham = $_POST['anhSanPham'];
$target_dir = '../CoffeOder/uploads/';
$target_file = $target_dir . basename($_FILES["anhSanPham"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (isset($_POST["submitImg"])) {
    $check = getimagesize($_FILES["anhSanPham"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["anhSanPham"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["anhSanPham"]["name"])) . " has been uploaded.";
        $anhSanPham = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$ten_sp = $_POST['ten_sp'];
$size = $_POST['size'];

$id = $_POST['sid'];

$connObj = mysqli_connect("localhost", "root", "", "coffeoder");
$update = "UPDATE sanpham SET id_danhMuc='$id_danhMuc' ,giaSanPham=$giaSanPham , gioiThieu='$gioiThieu ', anhSanPham='$anhSanPham' ,ten_sp='$ten_sp' , size='$size'  WHERE Id_sanPham=$id";
// echo $update;exit;
if (mysqli_query($connObj, $update)) {
   
    header("Location:../man_chinh/Quan_ly_do_uong.html");
}

?>

