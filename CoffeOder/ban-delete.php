<?php

include 'API.php';

$sid = $_GET['id'];

$Cons = mysqli_connect("localhost", "root", "" , "coffeoder");
$xoa_sql = "DELETE FROM `table` WHERE Id_Table=$sid  " ;
 
mysqli_query($Cons,$xoa_sql);
header("Location: ban-get.php");

?>

