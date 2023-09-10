<?php

include 'API.php';

$id_danhMuc = $_POST['id_danhMuc'];
$giaSanPham = $_POST['giaSanPham'];
$gioiThieu = $_POST['gioiThieu'];
$anhSanPham = $_POST['anhSanPham'];
$ten_sp = $_POST['ten_sp'];
$size = $_POST['size'];
$note = $_POST['note'];

$id = $_POST['sid'];

$connObj = mysqli_connect("localhost", "root", "", "coffeoder");
$update = "UPDATE sanpham SET id_danhMuc='$id_danhMuc' ,giaSanPham=$giaSanPham , gioiThieu='$gioiThieu ', anhSanPham='$anhSanPham'  ,ten_sp='$ten_sp' , size='$size' , note='$note' WHERE Id_sanPham=$id";
// echo $update;exit;
if (mysqli_query($connObj, $update)) {
   
    header("Location:../man_chinh/Quan_ly_do_uong.html");
}

?>

