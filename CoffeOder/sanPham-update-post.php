<?php

include 'API.php';

$id_danhMuc = $_POST['id_danhMuc'];
$giaSanPham = $_POST['giaSanPham'];
$gioiThieu = $_POST['gioiThieu'];
$anhSanPham = $_POST['anhSanPham'];
$id_giamGia = $_POST['id_giamGia'];
$ten_sp = $_POST['ten_sp'];
$size = $_POST['size'];

$id = $_POST['sid'];

$connObj = mysqli_connect("localhost", "root", "", "coffeoder");
$update = "UPDATE sanpham SET id_danhMuc='$id_danhMuc' ,giaSanPham=$giaSanPham , gioiThieu='$gioiThieu ', anhSanPham='$anhSanPham', id_giamGia = $id_giamGia  ,ten_sp='$ten_sp' , size='$size'  WHERE Id_sanPham=$id";
// echo $update;exit;
if (mysqli_query($connObj, $update)) {
   
    header("Location:../man_chinh/Quan_ly_do_uong.html");
}

?>

