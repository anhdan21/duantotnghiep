<?php

include 'API.php';

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các tham số cần thiết đã được cung cấp hay chưa
    if (isset($_POST['ten_danhMuc'])) {
        $ten_danhMuc = $_POST['ten_danhMuc'];


        try {
            $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Lỗi kết nối CSDL: ' . $e->getMessage());
        }

        //validate
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $error = array();
            $data = array();
            # code...
            $data['ten_danhMuc'] = isset($_POST['ten_danhMuc']) ? $_POST['ten_danhMuc'] : '';


            if (empty(trim($_POST['ten_danhMuc']))) {
                $error['ten_danhMuc']['required'] = 'Không được để trống';
            } else {
                if (strlen(trim($_POST['ten_danhMuc'])) < 6) {
                    $error['ten_danhMuc']['min'] = 'Tên danh mục phải trên 6 ký tự';
                }
            }
            // Lưu dữ liệu
            if (!$error) {
                // echo 'Dữ liệu có thể lưu trữ';
                // Code lưu dữ liệu tại đây
                // ...
                try {
                    $sql_str = "INSERT INTO `danhmuc` (`ten_danhMuc`) VALUES (:ten_danhMuc)";
                    $stmt = $objConn->prepare($sql_str);
                    $stmt->bindParam(':ten_danhMuc', $ten_danhMuc);


                    if ($stmt->execute() && $stmt->rowCount() > 0) {
                        // echo "Thêm danh mục thành công.";

                        header("Location: danhMuc-get.php");
                    } else {
                        echo "Failed to add user.";
                    }
                } catch (PDOException $e) {
                    die('Lỗi thêm user vào CSDL: ' . $e->getMessage());
                }
                // header("Location: ban_set.php");
            } else {
                // echo 'Dữ liệu bị lỗi, không thể lưu trữ';
            }
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
    <title>Thêm Danh Sách</title>
    <link rel="stylesheet" href="ThemDanhSach.css">
    <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="oclock.js">
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
        margin-top: 100px;
    }

    .thongtinMK h4 {
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

    /**/
    .oclock {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
    }

    .dulieubtn {
        border: 1px solid #000000;
        padding: 10px;
        color: black;
        text-decoration: none;
        margin-left: 20%;
    }

    .dulieubtn:hover {
        background-color: #2A3F53;
        color: #ffffff;
    }
</style>

<body>
    <div class="div-all">
        <nav>
            <section class="head">
                <h2>Coffee Bee Order</h2>
                <section class="use">
                    <img src="../man_chinh/anh_manhinh/use.png" class="img" alt="">
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
                        <img src="../man_chinh/anh_manhinh/use.png" alt="">
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
                        <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Do_ban_chay.html"><span>Đồ bán chạy</span></a>
                        <a href=""><span>/ Thêm danh sách</span></a>

                    </section>

                    <form action="danhMuc-add.php" method="POST">
                        <section class="thongtinMK">
                            <?php
                            // Code PHP xử lý validate
                            ?>
                            <h4 for="">Tên loại:<input type="text" name="ten_danhMuc" id="ten_danhMuc" placeholder="Nhập tên loại" value="<?php echo isset($data['giaSanPham']) ? $data['giaSanPham'] : ''; ?>"></h4>
                            <?php
                            echo isset($error['ten_danhMuc']['required']) ? $error['ten_danhMuc']['required'] : '';
                            echo isset($error['ten_danhMuc']['min']) ? $error['ten_danhMuc']['min'] : '';
                            ?>



                            <h4 for="">Chi tiết:<input type="text" placeholder="Thông tin chi tiết loại"></h4> <br>
                            <div class="oclock">
                                <span> Ngày:<p id="current-date" style="margin: -17px 0 0 50px;"></p></span>
                                <span>Time:<p id="current-time" style="margin: -17px 0 0 50px;"></p></span>
                            </div><br>

                            <button type="submit">Thêm danh sách</button>
                        </section>
                    </form>
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