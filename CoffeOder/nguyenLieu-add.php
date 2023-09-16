<?php

include 'API.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ten_nguyenLieu'], $_POST['price'], $_POST['soLuong'], $_POST['id_User'])) {
        $soLuong = $_POST['soLuong'];

        $price = $_POST['price'];
        $ten_nguyenLieu = $_POST['ten_nguyenLieu'];
        $id_User = $_POST['id_User'];
        //$img_nguyenLieu = $_POST['img_nguyenLieu']; 
        $kieuNguyenLieu = $_POST['kieuNguyenLieu'];

        $target_dir = '../CoffeOder/uploads/';
        $target_file = $target_dir . basename($_FILES["img_nguyenLieu"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["img_nguyenLieu"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }
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
            if (move_uploaded_file($_FILES["img_nguyenLieu"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["img_nguyenLieu"]["name"])) . " has been uploaded.";
                $img_nguyenLieu = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        try {
            $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Lỗi kết nối CSDL: ' . $e->getMessage());
        }

        try {
            $sql_str = "INSERT INTO `nguyenlieu` (`soLuong`,`price`  ,`id_User` ,`ten_nguyenLieu`,`img_nguyenLieu` ,  `kieuNguyenLieu`) 
                                            VALUES (:soLuong,:price,   :id_User,:ten_nguyenLieu,:img_nguyenLieu, :kieuNguyenLieu )";
            $stmt = $objConn->prepare($sql_str);
            $stmt->bindParam(':soLuong', $soLuong);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':ten_nguyenLieu', $ten_nguyenLieu);
            $stmt->bindParam(':id_User', $id_User);
            $stmt->bindParam(':img_nguyenLieu', $img_nguyenLieu);
            $stmt->bindParam(':kieuNguyenLieu', $kieuNguyenLieu);

            if ($stmt->execute() && $stmt->rowCount() > 0) {
                echo "User added successfully.";
                header("Location:../man_chinh/Quan_ly_nguyen_lieu.html");
            } else {
                echo "Failed to add user.";
            }
        } catch (PDOException $e) {
            die('Lỗi thêm user vào CSDL: ' . $e->getMessage());
        }
    } else {
        echo "";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nguyên Liệu</title>
    <link rel="stylesheet" href="ThemNguyenLieu.css">
    <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script>
</head>
<style>
     body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }

    @font-face {
        font-family: 'Inter';
        src: url('đường_dẫn_đến_tệp_font/inter.woff2') format('woff2'),
            url('đường_dẫn_đến_tệp_font/inter.woff') format('woff');
        /* Nếu muốn hỗ trợ thêm các định dạng font khác, bạn có thể thêm vào đây */
        font-weight: normal;
        /* Trọng lượng phông chữ */
        font-style: normal;
        /* Kiểu phông chữ */
    }

    .div-all {
        display: flex;

    }

    nav {
        flex: 1;
        background-color: #2A3F53;
        color: aliceblue;
        padding: 20px;
        position: fixed;
        height: 1000px;
        z-index: 1;


    }

    .head h2 {
        margin-left: 60px;
        margin-bottom: 40px;
        text-align: center;

    }

    .img {
        border: 1px solid #ffffff;
        border-radius: 50%;
        padding: 20px;
        background-color: white;
        flex-shrink: 0;
        /* Đảm bảo ảnh không bị co lại khi không đủ không gian */
        width: 25px;
        /* Đặt chiều rộng ảnh là 200px */
        height: auto;
    }

    .use {
        display: flex;
        row-gap: 1fr;
        margin-bottom: 20px;

    }

    /**/
    /*xin chao */
    .use section {
        margin-left: 40px;
        margin-top: 15px;
    }

    /*menu list danh sach */
    .menu {
        margin-top: 40px;
        border-top: 1px solid white;
        padding-bottom: 90px;
    }

    .menu ul {
        list-style-type: none;
    }

    ul li i {
        margin-right: 20px;
        width: 20px;
        height: 10px;
    }

    ul li {
        margin-top: 70px;
    }

    ul a {
        color: white;
        text-decoration: none;
    }

    main {
        flex: 5;
    }


    /* ========================= */
    .canhan {
        background-color: #D9D9D9;
        padding: 25px;
        position: relative;
        border-bottom: 1px solid #fff;

    }

    .canhan img {
        position: absolute;
        right: 200px;
        margin-top: -12px;
        border: 1px solid #ffffff;
        border-radius: 50%;
        padding: 15px;
        background-color: white;
        flex-shrink: 0;
        width: 30px;
        height: auto;
    }

    .canhan .dropdown {
        position: fixed;
        right: 60px;
        margin-top: -20px;
    }

    .dropdown {
        position: relative;
    }

    .dropdown_select {
        cursor: pointer;
    }

    .dropdown:hover .dropdown_list {
        display: block;
    }

    .dropdown_list {
        width: 150px;
        border-radius: 4px;
        background-color: #D9D9D9;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        display: none;
    }

    .dropdown_list::before {
        content: "";
        height: 25px;
        position: absolute;
        left: 0;
        right: 0;
        background-color: transparent;
        transform: translateY(-100%);
    }

    .dropdown_item {
        text-align: center;
        margin-top: -5px;
        margin-left: -40px;
        padding: 15px;
        cursor: pointer;
        transition: background-color 0.2s linear;
        list-style-type: none;
    }

    .dropdown_item:hover {
        background-color: #2A3F53;
    }

    /* ==================================================== */


    .box {
        position: absolute;
        margin-left: 300px;
        width: 1599px;
    }

    .header1 {
        width: 1599px;
        position: fixed;
        z-index: 1;
    }

    .Header2 {
        width: 1599px;
        margin-top: 200px;
    }

    .tenQL {
        padding: 25px;
        border-bottom: 1px solid #D9D9D9;
        padding-left: 50px;
        background-color: #fff;
    }

    .thoigian {
        padding: 20px;
        border-bottom: 2px solid #D9D9D9;
        padding-left: 50px;
        background-color: #fff;
    }

    .themDS {
        position: absolute;
        right: 30px;
        width: 150px;
    }

    .themDS button {
        padding: 5px;
    }

    .tenQL a {
        text-decoration: none;
        color: black;
    }

    .thoigian {
        padding: 20px;
        border-bottom: 2px solid #D9D9D9;
    }

    .themDS {
        position: absolute;
        right: 50px;
        width: 100px;
    }

    .themDS button {
        padding: 5px;
    }


    /****************************************************/
    .thongtinMK {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
        margin-top: 50px;
    }

    .thongtinMK label {
        margin-left: -100px;
        padding: 10px;

    }

    .thongtinMK input {
        margin-left: 30px;
        width: 500px;
        padding: 10px;
    }

    .thongtinMK span {
        margin-top: 20px;
        margin-left: -300px;
    }

    .thongtinMK button {
        padding: 10px;
        margin: 50px 0 0 500px;
        border-radius: 5px;
    }

    .thongtinMK button:hover {
        background-color: #2A3F53;
        color: white;
    }

    /**************************************************/
    .oclock {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
    }
</style>

<body>
    <div class="div-all">
        <nav>
            <section class="head">
                <h2>Coffee Bee Order</h2>
                <section class="use">
                    <img src="./anh/use.png" class="img" alt="">
                    <section>
                        <span>Xin chào,</span> <br>
                        <span>Administrator</span>
                    </section>
                </section>
                <span>GENERAL</span>
            </section>

            <section class="menu">
                <ul>
                    <a href="../CoffeOder/danhMuc-get.php">
                        <li><i class="fas fa-caravan"></i>Đồ bán chạy</li>
                    </a>
                    <a href="../man_chinh/Quan_ly_do_uong.html">
                        <li><i class="fas fa-wine-glass-alt"></i>Quản lý đồ uống</li>
                    </a>
                    <a href="../man_chinh/Quan_ly_nguyen_lieu.html">
                        <li><i class="fas fa-seedling"></i>Quản lý nguyên liệu</li>
                    </a>
                    <a href="../CoffeOder/ban-get.php">
                        <li>Quản lý bàn </li>
                    </a>
                    <a href="../CoffeOder/user-get.php">
                        <li>Tài khoản nhân viên</li>
                    </a>
                    <a href="../CoffeOder/hoaDonct-get.php">
                        <li>Hóa đơn</li>
                    </a>
                    <a href="../man_chinh/Khuyen_mai.html">
                        <li>Khuyến mại</li>
                    </a>
                </ul>

            </section>
        </nav>
        <main>

            <div class="box">
                        <div class="header1">
                            <section class="canhan">
                                <i class="fas fa-bars"></i>
                                <img src="anh_manhinh/use.png" alt="">
                                <section class="dropdown">
                                    <section class="dropdwon_select">
                                        <span class="dropdown_selected"> Administrator</span>
                                        <i class="fas fa-sort-down"></i>
                                        <ul class="dropdown_list">
                                            <a href="#">
                                                <li class="dropdown_item">
                                                    <span class="dropdown_test"> Đổi Mật Khẩu</span>
                                                    <i class="fas fa-key"></i>
                                                </li>
                                            </a>
                                            <a href="../CoffeOder/login.php" type=" color: #000">
                                                <li class="dropdown_item">
                                                    <span class="dropdown_test">Đăng Xuất</span>
                                                    <i class="fas fa-sign-out-alt"></i>
                                                </li>
                                            </a>

                                        </ul>
                                    </section>

                                </section>
                            </section>
                            <section class="tenQL">
                                <a href=""><span> Thêm nguyên liệu</span></a>

                            </section>
                        </div>    
                            
                <div class="Header2">
                    <form action="nguyenLieu-add.php" method="POST" enctype="multipart/form-data">
                        <section class="thongtinMK">
                            <label for="">Tên NL:<input type="text" name="ten_nguyenLieu" placeholder="Nhập tên Nguyên Liệu" required></label> <br>
                            <label for="">Giá :<input type="text" name="price" placeholder="Nhập giá " required></label> <br>
                            <label for="">Số lượng:<input type="number" name="soLuong" required></label> <br>

                            <!-- <label for="">User:<input type="text" name="id_User" required></label> <br> -->
                            <h4 for="id_User" style="margin-right: 350px;">Chọn Người Nhập :
                                <select name="id_User" style="height: 40px; width:200px">
                                    <?php
                                    include 'API.php';
                                    try {

                                        $sql = "SELECT id_User, fullName FROM user";
                                        $stmt = $conn->query($sql);

                                        // Lặp qua danh sách người dùng và tạo các tùy chọn trong dropdown menu
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $row['id_User'] . "'>" . $row['fullName'] . "</option>";
                                        }
                                    } catch (PDOException $e) {
                                        die('Lỗi kết nối CSDL: ' . $e->getMessage());
                                    }
                                    ?>
                                </select>
                            </h4>

                            <label for="">Kiểu:<input type="text" name="kieuNguyenLieu" required></label> <br>
                            <h4>Chọn ảnh --
                                <input type="file" name="img_nguyenLieu" id="img_nguyenLieu">
                            </h4><br>
                            <div class="oclock">
                                <span> Ngày:<p id="current-date" style="margin: -17px 0 0 50px;"></p></span>
                                <span>Time:<p id="current-time" style="margin: -17px 0 0 50px;"></p></span>
                            </div><br>
                            <button type="submit" name="submit">Thêm nguyên liệu</button>
                        </section>
                    </form>
                    </div>  
            </div>          
        </main>
    </div>
</body>

<script>
    function getCurrentTime() {
        // Tạo đối tượng Date đại diện cho thời gian hiện tại
        const now = new Date();

        // Lấy thông tin về giờ, phút và giây
        const hour = now.getHours();
        const minute = now.getMinutes();
        const second = now.getSeconds();

        // Định dạng lại chuỗi để hiển thị đẹp hơn (nếu muốn)
        const formattedTime = `${hour.toString().padStart(2, '0')}:${minute.toString().padStart(2, '0')}:${second.toString().padStart(2, '0')}`;

        // Hiển thị giờ hiện tại trong thẻ p có id="current-time"
        document.getElementById('current-time').textContent = formattedTime;
    }

    // Gọi hàm getCurrentTime mỗi giây một lần để cập nhật giờ hiện tại
    setInterval(getCurrentTime, 1000);

    function getCurrentDate() {
        // Tạo đối tượng Date đại diện cho thời gian hiện tại
        const now = new Date();

        // Lấy thông tin về ngày, tháng và năm
        const day = now.getDate();
        const month = now.getMonth() + 1; // Tháng trong JavaScript bắt đầu từ 0 (0 -> Tháng 1)
        const year = now.getFullYear();

        // Định dạng lại chuỗi để hiển thị đẹp hơn (nếu muốn)
        const formattedDate = `${day.toString().padStart(2, '0')}/${month.toString().padStart(2, '0')}/${year}`;

        // Hiển thị ngày hiện tại trong thẻ p có id="current-date"
        document.getElementById('current-date').textContent = formattedDate;
    }

    // Gọi hàm getCurrentDate khi trang được tải và sau đó mỗi ngày một lần để cập nhật ngày hiện tại
    getCurrentDate();
</script>

</html>