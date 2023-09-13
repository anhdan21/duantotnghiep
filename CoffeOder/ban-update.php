<?php

include 'API.php';

$id_tang = $_POST['id_tang'];
$trangThai = $_POST['trangThai'];
$soBan = $_POST['soBan'];
$id = $_POST['sid'];


$Cons = mysqli_connect("localhost", "root", "" , "coffeoder");
 
$update = "UPDATE `table` SET id_tang= '$id_tang', trangThai= '$trangThai',soBan=$soBan WHERE Id_Table= $id";
// echo $update;exit;
if(mysqli_query($Cons,$update)){
    header("Location: ban-get.php");
} 

?>

