<?php
session_start();
require_once '../CoffeOder/API.php';

if (!isset($_GET['Id_nguyenLieu'])) {
    $_SESSION['err'] = "Bạn chưa chọn Role để sửa";
    header("Location:../man_chinh/Quan_ly_nguyen_lieu.html");
}
$id = intval($_GET['Id_nguyenLieu']);
try {
    $stmt = $conn->prepare("SELECT * FROM nguyenlieu WHERE Id_nguyenLieu = $id ");

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $row = $stmt->fetch();

    if (empty($row)) {
        header("Location:../man_chinh/Quan_ly_nguyen_lieu.html");
    }
} catch (PDOException $e) {
    echo "<br>Loi truy van CSDL: " . $e->getMessage();
}

$err = [];
if (isset($_POST['btnSave'])) {
    $soLuong = $_POST['soLuong'];
    $price = $_POST['price'];
    $id_User = $_POST['id_User'];
    $ten_nguyenLieu = $_POST['ten_nguyenLieu'];
    // $img_nguyenLieu = $_POST['img_nguyenLieu'];
    $kieuNguyenLieu = $_POST['kieuNguyenLieu'];
    // kiểm tra
    if (empty($soLuong) || empty($price) || empty($id_User) || empty($ten_nguyenLieu)  ||  empty($kieuNguyenLieu)) {
        $err[] = "Bạn chưa nhập đủ nội dung";
    }

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

    if (empty($err)) {

        try {
            $stmt = $conn->prepare("UPDATE nguyenlieu SET soLuong=:post_soLuong ,price=:post_price , id_User=:post_id_User , ten_nguyenLieu=:post_ten_nguyenLieu  , img_nguyenLieu=:post_img_nguyenLieu , kieuNguyenLieu=:post_kieuNguyenLieu WHERE Id_nguyenLieu=:get_id");
            // gắn dữ liệu vào tham số
            $stmt->bindParam(":post_soLuong", $soLuong);
            $stmt->bindParam(":post_price", $price);
            $stmt->bindParam(":post_id_User", $id_User);
            $stmt->bindParam(":post_ten_nguyenLieu",  $ten_nguyenLieu);
            $stmt->bindParam(":post_img_nguyenLieu",  $img_nguyenLieu);
            $stmt->bindParam(":post_kieuNguyenLieu",  $kieuNguyenLieu);
            $stmt->bindParam(":get_id", $id);
            // thực thi câu lệnh
            $stmt->execute();
            header("Location:../man_chinh/Quan_ly_nguyen_lieu.html");
        } catch (PDOException $e) {
            $err[] = "Loi truy van CSDL: " . $e->getMessage();
        }
    }
} else if (isset($_POST['btnCancel'])) {
    header("Location:../man_chinh/Quan_ly_nguyen_lieu.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Bàn</title>
    <link rel="stylesheet" href="ThemBan.css">
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
                        <li>Hóa đơn</li>
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
                            <a href="http://127.0.0.1:5500/duantotnghiep/Dang_nhap/Doi_mat_khau.html">
                                <li class="dropdown_item">
                                    <span class="dropdown_test"> Đổi Mật Khẩu</span>
                                    <i class="fas fa-key"></i>
                                </li>
                            </a>
                            <a href="http://127.0.0.1:5500/duantotnghiep/Dang_nhap/dang_nhap.html" type=" color: #000">
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
                <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Quan_ly_ban.html"><span>Quản lý bàn</span></a>
                <a href="http://127.0.0.1:5500/duantotnghiep/Them/ThemBan.html"><span>/ Thêm bàn</span></a>

            </section>
            <div id="container">
                <p><?php echo implode('<br>', $err); ?></p>

                <form action="" method="post" enctype="multipart/form-data">
                    <span>ID :<?php echo $row['Id_nguyenLieu']; ?></span>
                    <!-- <label for="id_User">Id người nhập</label>
                    <input type="text" name="id_User" value="<?php echo $row['id_User']; ?>"> -->
                    <label for="ten_nguyenLieu">Tên nguyên liệu</label>
                    <input type="text" name="ten_nguyenLieu" value="<?php echo $row['ten_nguyenLieu']; ?>">

                    <label for="soLuong">Số lượng</label>
                    <input type="text" name="soLuong" value="<?php echo $row['soLuong']; ?>">

                    <label for="price">Giá</label>
                    <input type="text" name="price" value="<?php echo $row['price']; ?>">

                    <h4>Chọn ảnh --
                        <input type="file" name="img_nguyenLieu" id="img_nguyenLieu">
                    </h4>
                    <br>
                    <label for="ten_nguyenLieu">Kiểu dạng</label>
                    <input type="text" name="kieuNguyenLieu" value="<?php echo $row['kieuNguyenLieu']; ?>">

                    <br>
                    <label for="id_User" style="margin-right: 200px;">Chọn Người Nhập :
                        <select name="id_User" style="height: 40px; width:200px">
                            <?php
                            include 'API.php';

                            $sql = "SELECT id_User, fullName FROM user";
                            $stmt = $conn->query($sql);

                            while ($roww = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $roww['id_User'] . "'>" . $roww['fullName'] . "</option>";
                            }

                            ?>
                        </select>
                    </label>
                    <br><br>
                    <button name="btnSave">Save Update</button>
                    <button name="btnCancel">Cancel</button>
                </form>
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
<style>
    #container {
        max-width: 50%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: left;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"] {
        width: 70%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button[name="btnSave"],
    button[name="btnCancel"] {
        width: 50%;
        padding: 10px;
        margin-top: 10px;
        background-color: #008000;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button[name="btnSave"] {
        background-color: #008000;
        /* Màu xanh */
    }

    button[name="btnCancel"] {
        background-color: #ff0000;
        /* Màu đỏ */
    }

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
        margin-top: 100px;
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

    .oclock {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
    }
</style>

</html>