<?php
session_start();
require_once '../CoffeOder/API.php';

if (!isset($_GET['id_giamGia'])) {
    $_SESSION['err'] = "Bạn chưa chọn Role để sửa";
    header("Location:../man_chinh/Khuyen_mai.html");
}
$id = intval($_GET['id_giamGia']);
try {
    $stmt = $conn->prepare("SELECT * FROM giamgia WHERE id_giamGia = $id ");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $row = $stmt->fetch();

    if (empty($row)) {
        header("Location:../man_chinh/Khuyen_mai.html");
    }
} catch (PDOException $e) {
    echo "<br>Loi truy van CSDL: " . $e->getMessage();
}

$err = [];
if (isset($_POST['btnSave'])) {
    $time_Start = $_POST['time_Start'];
    $time_End = $_POST['time_End'];
    $giam = $_POST['giam'];

    // kiểm tra
    if (empty($time_Start) || empty($time_End) || empty($giam)) {
        $err[] = "Bạn chưa nhập đủ nội dung";
    }

    if (empty($err)) {

        try {
            $stmt = $conn->prepare("UPDATE giamgia SET time_Start=:post_time_Start ,time_End=:post_time_End , giam=:post_giam  WHERE id_giamGia=:get_id");
            // gắn dữ liệu vào tham số
            $stmt->bindParam(":post_time_Start", $time_Start);
            $stmt->bindParam(":post_time_End", $time_End);
            $stmt->bindParam(":post_giam", $giam);

            $stmt->bindParam(":get_id", $id);
            // thực thi câu lệnh
            $stmt->execute();

            $_SESSION['err'] = "Cập nhật thành công!";

            header("Location:../man_chinh/Khuyen_mai.html");
        } catch (PDOException $e) {
            $err[] = "Loi truy van CSDL: " . $e->getMessage();
        }
    }
} else if (isset($_POST['btnCancel'])) {
    header("Location:../man_chinh/Khuyen_mai.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin Bàn</title>
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
        height: 30px;

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
        margin-top: -5px;
    }

    .tenQL a {
        text-decoration: none;
        color: black;
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


    /***************************/


    h1 {
        font-size: 24px;
        /* Kích thước font */
        color: #333;
        /* Màu chữ */
    }

    /* Định dạng label */
    label {
        display: block;
        /* Hiển thị mỗi label trên một dòng */
        margin-bottom: 10px;
        /* Khoảng cách giữa các label */
        font-weight: bold;
        /* In đậm chữ của label */
    }

    /* Định dạng input */
    input[type="date"],
    input[type="text"] {
        width: 80%;
        /* Độ rộng 100% của input */
        padding: 10px;
        /* Khoảng cách bên trong input */
        margin-bottom: 15px;
        /* Khoảng cách giữa các input */
        border: 1px solid #ccc;
        /* Viền của input */
        border-radius: 5px;
        /* Bo tròn góc input */
    }

    /* Định dạng nút */
    button {
        width: 100px;
        /* Độ rộng của nút */
        padding: 10px;
        /* Khoảng cách bên trong nút */
        background-color: #007bff;
        /* Màu nền của nút (ví dụ màu xanh dương) */
        color: #fff;
        /* Màu chữ trắng */
        border: none;
        /* Loại bỏ đường viền */
        border-radius: 5px;
        /* Bo tròn góc của nút */
        cursor: pointer;
        /* Biến con trỏ thành một chiếc tay nếu di chuột qua nút */
    }

    /* Định dạng nút Cancel */
    button[name="btnCancel"] {
        background-color: #ccc;
        /* Màu nền của nút Cancel (ví dụ màu xám) */
        color: #333;
        /* Màu chữ của nút Cancel */
    }

    /* Định dạng nút khi di chuột qua */
    button:hover {
        background-color: #0056b3;
        /* Màu nền thay đổi khi di chuột qua */
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
                                    <a href="http://127.0.0.1:5500/duantotnghiep/Dang_nhap/Doi_mat_khau.html">
                                        <li class="dropdown_item">
                                            <span class="dropdown_test"> Đổi Mật Khẩu</span>
                                            <i class="fas fa-key"></i>
                                        </li>
                                    </a>
                                    <a href="http://127.0.0.1:5500/duantotnghiep/Dang_nhap/dang_nhap.html"
                                        type=" color: #000">
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
                        <a href="#"><span>Sửa Thông khuyến mại</span></a>

                    </section>
                </div>



                <div class="Header2">

                    <form action="" method="POST">
                        <div style="margin-left: 10%;">
                        <label>Thời gian bắt đầu: <input type="date" name="time_Start"
                                value="<?php echo $row['time_Start']; ?>"></label><br>
                        <label>Thời gian kết thúc:<input type="date" name="time_End"
                                value="<?php echo $row['time_End']; ?>"></label><br>
                        <label>Khuyễn mãi :<input style="margin-left: 3%;" type="text" name="giam"
                                value="<?php echo $row['giam']; ?>"></label><br>
                                </div>
                        <div style="margin-left: 70%;">
                            <button name="btnSave">Save Update</button>
                            <button name="btnCancel">Cancel</button>
                        </div>

                    </form>
                </div>
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