<?php

include 'API.php';

$sid = $_GET['id'];

$Cons = mysqli_connect("localhost", "root", "" , "coffeoder");
$xoa_sql = "DELETE FROM user WHERE Id_User= $sid  " ;
 
mysqli_query($Cons,$xoa_sql);
header("Location: user-get.php");

?>
