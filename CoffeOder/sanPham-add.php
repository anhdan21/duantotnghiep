<?php

include 'API.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ten_sp'], $_POST['giaSanPham'], $_POST['size'], $_POST['giaSanPham'], $_POST['gioiThieu'], $_POST['id_danhMuc'])) {
        $ten_sp = $_POST['ten_sp'];
        $giaSanPham = $_POST['giaSanPham'];
        $size = $_POST['size'];
        // $anhSanPham = $_POST['anhSanPham'];
        $gioiThieu = $_POST['gioiThieu'];
        $id_danhMuc = $_POST['id_danhMuc'];
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
            $data['ten_sp'] = isset($_POST['ten_sp']) ? $_POST['ten_sp'] : '';
            $data['giaSanPham'] = isset($_POST['giaSanPham']) ? $_POST['giaSanPham'] : '';
            $data['size'] = isset($_POST['size']) ? $_POST['size'] : '';
            $data['gioiThieu'] = isset($_POST['gioiThieu']) ? $_POST['gioiThieu'] : '';

            if (empty(trim($data['ten_sp']))) {
                $error['ten_sp'] = 'Bạn chưa nhập tên sản phẩm.';
            }
            if (empty(trim($data['giaSanPham']))) {
                $error['giaSanPham']['required'] = 'Bạn chưa nhập tên sản phẩm.';
            } else {
                if (!filter_var(trim($_POST['giaSanPham']), FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]])) {
                    $error['giaSanPham']['invaild'] = 'Giá sản phẩm không hợp lệ.';
                }
            }
            if (empty($data['size'])) {
                $error['size'] = 'Bạn chưa nhập size.';
            }
            if (empty($data['gioiThieu'])) {
                $error['gioiThieu'] = 'Bạn chưa nhập giới thiệu.';
            }
            // Lưu dữ liệu
            if (!$error) {
                // echo 'Dữ liệu có thể lưu trữ';
                // Code lưu dữ liệu tại đây
                // ...
                $target_dir = '../CoffeOder/uploads/';
                $target_file = $target_dir . basename($_FILES["anhSanPham"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["anhSanPham"]["tmp_name"]);
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
                    if (move_uploaded_file($_FILES["anhSanPham"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["anhSanPham"]["name"])) . " has been uploaded.";
                        $anhSanPham = $target_file;
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                try {
                    $sql_str = "INSERT INTO `sanpham` (`id_danhMuc`,`giaSanPham`,`gioiThieu`,`anhSanPham`, `ten_sp`,  `size`) 
                                            VALUES ( :id_danhMuc, :giaSanPham, :gioiThieu,:anhSanPham,:ten_sp, :size)";
                    $stmt = $objConn->prepare($sql_str);
                    $stmt->bindParam(':id_danhMuc', $id_danhMuc);
                    $stmt->bindParam(':giaSanPham', $giaSanPham);
                    $stmt->bindParam(':gioiThieu', $gioiThieu);
                    $stmt->bindParam(':anhSanPham', $anhSanPham);
                    $stmt->bindParam(':ten_sp', $ten_sp);
                    $stmt->bindParam(':size', $size);

                    if ($stmt->execute() && $stmt->rowCount() > 0) {
                        header("Location:../man_chinh/Quan_ly_do_uong.html");
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
    <title>Thêm Sản Phẩm</title>
    <link rel="stylesheet" href="/duantotnghiep/Them/ThemSanPham.css">
    <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script>
</head>

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
                        <li>Thống kê</li>
                    </a>
                    <a href="../man_chinh/Khuyen_mai.html">
                        <li>Khuyến mại</li>
                    </a>
                </ul>
            </section>
        </nav>
        <main>
            <section class="canhan">
                <i class="fas fa-bars"></i>
                <img src="./anh/use.png" alt="">
                <section class="dropdown">
                    <section class="dropdwon_select">
                        <span class="dropdown_selected"> Administrator</span>
                        <i class="fas fa-sort-down"></i>
                        <ul class="dropdown_list">
                            <a href="../Dang_nhap/Doi_mat_khau.html">
                                <li class="dropdown_item">
                                    <span class="dropdown_test"> Đổi Mật Khẩu</span>
                                    <i class="fas fa-key"></i>
                                </li>
                            </a>
                            <a href="../Dang_nhap/dang_nhap.html" type=" color: #000">
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
                <a href="../man_chinh/Quan_ly_do_uong.html"><span>Quản lý đồ uống</span></a>
                <a href=""><span>/ Thêm sản phẩm</span></a>

            </section>

            <form action="sanPham-add.php" method="POST" enctype="multipart/form-data">
                <section class="thongtinMK">
                    <label for="">Tên SP:<input type="text" name="ten_sp" id="ten_sp" placeholder="Nhập tên sản phẩm" value="<?php echo isset($data['ten_sp']) ? $data['ten_sp'] : ''; ?>"></label>
                    <?php
                    echo isset($error['ten_sp']) ? $error['ten_sp'] : '';
                    ?>

                    <label for="">Giá SP:<input type="text" name="giaSanPham" id="giaSanPham" placeholder="Nhập giá loại" value="<?php echo isset($data['giaSanPham']) ? $data['giaSanPham'] : ''; ?>"></label>
                    <?php
                    echo isset($error['giaSanPham']['required']) ? $error['giaSanPham']['required'] : '';
                    echo isset($error['giaSanPham']['invaild']) ? $error['giaSanPham']['invaild'] : '';
                    ?>
                    <label for="">Size:<input type="text" name="size" id="size" placeholder="Nhập size sản phẩm" value="<?php echo isset($data['size']) ? $data['size'] : ''; ?>"></label>
                    <?php
                    echo isset($error['size']) ? $error['size'] : '';
                    ?>
                    <h4 for="id_danhMuc" style="margin-right: 450px;">Danh mục :
                        <select name="id_danhMuc" style="height: 40px; width:200px">
                            <?php
                            include 'API.php';
                            $sql = "SELECT id_danhMuc, ten_danhMuc FROM danhmuc";
                            $stmt = $conn->query($sql);

                            // Lặp qua danh sách người dùng và tạo các tùy chọn trong dropdown menu
                            while ($rowea = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $rowea['id_danhMuc'] . "'>" . $rowea['ten_danhMuc'] . "</option>";
                            }
                            ?>
                        </select>
                    </h4>
                    <label for="">Giới thiệu:<input type="text" name="gioiThieu" id="gioiThieu" placeholder="Thông tin sản phẩm" value="<?php echo isset($data['gioiThieu']) ? $data['gioiThieu'] : ''; ?>"></label>
                    <?php
                    echo isset($error['gioiThieu']) ? $error['gioiThieu'] : '';
                    ?><br>
                    <h4 style="margin-right: 130px;">Chọn ảnh
                        <input type="file" name="anhSanPham" id="anhSanPham">
                    </h4><br><br>
                    <input type="submit" value="Thêm Sản phẩm" name="submit">
                </section>
            </form>
            <br>

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

    getCurrentDate();
</script>
<style>
    body {
        margin: auto;
        padding: 0;
        font-family: 'Inter', sans-serif;
        width: 1900px;
        height: 1080px;
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

    }

    .head h2 {
        margin-left: 60px;
        margin-bottom: 40px;
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

    /****************************************************/
    main i {}

    .canhan {
        background-color: #D9D9D9;
        padding: 25px;
        position: relative;

    }

    .canhan img {
        position: absolute;
        right: 190px;
        margin-top: -12px;
        border: 1px solid #ffffff;
        border-radius: 50%;
        padding: 15px;
        background-color: white;
        flex-shrink: 0;
        /* Đảm bảo ảnh không bị co lại khi không đủ không gian */
        width: 15px;
        /* Đặt chiều rộng ảnh là 200px */
        height: auto;
    }

    .canhan .dropdown {
        position: absolute;
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

    .dropdown_selected {}

    .dropdown_list {
        width: 135px;
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
        height: 20px;
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

    /****************************************************/
    .tenQL {
        margin-top: 10px;
        padding: 25px;
        border-bottom: 1px solid #D9D9D9;
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

    .select-menu {
        width: 160px;
        margin-top: -40px;
        margin-left: 20px;
    }

    .select-btn {
        /* display: flex; */
        background: #fff;
        font-size: 18px;
        align-items: center;
        cursor: pointer;
        /* justify-content: space-between; */
    }

    .options {
        position: relative;
        width: 150px;
        padding: 0;
        border-radius: 8px;
        display: none;
        border: 1px solid #000;
    }

    .select-menu.active .options {
        display: block;
    }

    .option {
        list-style-type: none;
        cursor: pointer;
        border-radius: 8px;
        margin-top: 3px;
        padding: 10px;
        text-align: center;
        transition: background-color 0.2s linear;
    }

    .option:hover {
        background-color: #2A3F53;
        color: #fff;
    }

    .option-text {
        font-size: 18px;

    }
</style>

</html>