<?php

include 'API.php';

$userName = $_POST['userName'];
// $image = $_POST['image'];
$phone_Number = $_POST['phone_Number'];
$fullName = $_POST['fullName'];
$chucNang = $_POST['chucNang'];

$target_dir = '../CoffeOder/uploads/';
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        $image = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$id = $_POST['sid'];
$Cons = mysqli_connect("localhost", "root", "" , "coffeoder");
 
$update = "UPDATE user SET userName='$userName',image = '$image',phone_Number ='$phone_Number', fullName = '$fullName',chucNang = '$chucNang' WHERE Id_User= $id";
// echo $update;exit;
if(mysqli_query($Cons,$update)){
    header("Location: user-get.php");
    // echo "hello";
}   


?>
