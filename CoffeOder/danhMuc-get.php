<?php
// // Thông tin kết nối database
// $db_host = "localhost";
// $db_name = "coffeoder";
// $db_user = "root";
// $db_pass = "";

// try {
//     // Kết nối tới database sử dụng PDO
//     $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    
//     // Truy vấn dữ liệu từ bảng employee_data
//     $stmt = $conn->query("SELECT * FROM danhmuc");

//     // Lấy tất cả các bản ghi và chuyển thành mảng kết quả JSON
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     // Thiết lập header để trả về JSON
//     header('Content-Type: application/json');
        
//     // Hiển thị kết quả JSON hoặc trả về mã lỗi HTTP 404 Not Found nếu không có bản ghi nào được tìm thấy
//     echo ($stmt->rowCount() > 0) ? json_encode($result) : http_response_code(404);
// } catch(PDOException $e) {
//     // Trả về mã lỗi HTTP 500 Internal Server Error nếu xảy ra lỗi trong quá trình kết nối hoặc truy vấn
//     http_response_code(500);
//     echo json_encode(array("message" => "Unable to retrieve data: " . $e->getMessage()));
// }

// // Đóng kết nối database
// $conn = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồ bán chạy</title>
    <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/duantotnghiep/man_chinh/Do_ban_chay.css">
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
        margin-left: 297px;

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
        /* Đảm bảo ảnh không bị co lại khi không đủ không gian */
        width: 30px;
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
    .tenQL {
        margin-top: 10px;
        padding: 25px;
        border-bottom: 1px solid #D9D9D9;
        padding-left: 350px;

    }

    .thoigian {
        padding: 20px;
        border-bottom: 2px solid #D9D9D9;
        padding-left: 350px;
    }

    .themDS {
        position: absolute;
        right: 30px;
        width: 150px;
    }

    .themDS button {
        padding: 5px;
    }

    
        
       

    /* ===================================================== */
    #container {
        height: 300px;
        width: 60vw;
        padding: 0;
        background: rgb(246, 247, 247);
        display: flexd;
        place-items: center;
        margin-right: 50px;

    }

    #slider-container {
        height: 300px;
        width: 80vw;
        /* width: 200px; */
        max-width: 1900px;
        background: #fff;
        /* box-shadow: 5px 5px 8px gray inset; */
        position: relative;
        overflow: hidden;
        padding: 10px;

    }
/* 

    #slider-container #slider {
        display: flex;
        width: 1000%;
        height: 90%;
        transition: all .5s;
    } */

    #slider-container #slider .slide {
        height: 100%;
        margin: auto 20px;
        background-color: #eeeef3;
        box-shadow: 2px 2px 4px 2px gray, -2px -2px 4px 2px gray;
        display: flex;
        place-items: center;
    }

    #slider-container #slider .slide span {

        height: 400px;
        width: 250px;
    }
</style>


<body>
    <div class="div-all">
        <nav>
            <section class="head">
                <h2>Coffee Bee Order</h2>
                <section class="use">
                    <img src="anh_manhinh/use.png" class="img" alt="">
                    <section>
                        <span>Xin chào,</span> <br>
                        <span>Administrator</span>
</section>
                </section>
                <span>GENERAL</span>
            </section>

            <section class="menu">
                <ul>
                    <a href="http://localhost/Coffebe/duantotnghiep/CoffeOder/danhMuc-get.php">
                        <li><i class="fas fa-caravan"></i>Đồ bán chạy</li>
                    </a>
                    <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Quan_ly_do_uong.html">
                        <li><i class="fas fa-wine-glass-alt"></i>Quản lý đồ uống</li>
                    </a>
                    <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Quan_ly_nguyen_lieu.html">
                        <li><i class="fas fa-seedling"></i>Quản lý nguyên liệu</li>
                    </a>
                    <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Quan_ly_ban.html">
                        <li><i class="fas fa-couch"></i>Quản lý bàn </li>
                    </a>
                    <a href="http://localhost/Coffebe/duantotnghiep/CoffeOder/user-get.php">
                        <li><i class="fas fa-users"></i>Tài khoản nhân viên</li>
                    </a>
                    <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Thong_ke.html">
                        <li><i class="fas fa-chart-line"></i>Thống kê</li>
                    </a>
                    <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Khuyen_mai.html">
                        <li><i class="fas fa-gift"></i>Khuyến mại</li>
                    </a>
                </ul>
            </section>
        </nav>
        <main>

            <section class="canhan">
                <i class="fas fa-bars"></i>
                <img src="anh_manhinh/use.png" alt="">
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
                <span>Đồ Bán Chạy</span>
            </section>
            <section class="thoigian">
                <input type="date"> -- <input type="date" name="" id="">
                <a href="http://localhost/Coffebe/duantotnghiep/CoffeOder/danhMuc-add.php" class="themDS"><button class="">Thêm danh sách</button></a>
            </section>

            <?php
            // Thông tin kết nối database
            include 'API.php';
            $conn = mysqli_connect("localhost", "root", "", "coffeoder");

            try {
                // // Kết nối tới database sử dụng PDO
                // $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

                // // Truy vấn dữ liệu từ bảng employee_data
                // $stmt = $conn->query("SELECT * FROM sanpham");

                // // Lấy tất cả các bản ghi và chuyển thành mảng kết quả JSON
                // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // // Thiết lập header để trả về JSON
                // header('Content-Type: application/json');

                // // Hiển thị kết quả JSON hoặc trả về mã lỗi HTTP 404 Not Found nếu không có bản ghi nào được tìm thấy
                // echo ($stmt->rowCount() > 0) ? json_encode($result) : http_response_code(404);

                $set_danh_muc = "SELECT * FROM danhmuc order by ten_danhMuc";
                $result = mysqli_query($conn, $set_danh_muc);

                while ($dm = mysqli_fetch_assoc($result)) {
            ?>
                    <h3 style="margin-left: 310px;">
                        <?php echo $dm['ten_danhMuc']; ?>
                        <!-- </h3> -->
                        <div id="container">
                            <div id="slider-container">
                                <span onclick="slideRight()" class="btn button"></span>
                                <div id="slider">
                                    <div class="slide">
                                        <?php
                                        // Thông tin kết nối database
                                        include 'API.php';
                                        $conn = mysqli_connect("localhost", "root", "", "coffeoder");

                                        try {
                                            // // Kết nối tới database sử dụng PDO
                                            // $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

                                            // // Truy vấn dữ liệu từ bảng employee_data
                                            // $stmt = $conn->query("SELECT * FROM sanpham");
// // Lấy tất cả các bản ghi và chuyển thành mảng kết quả JSON
                                            // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            // // Thiết lập header để trả về JSON
                                            // header('Content-Type: application/json');

                                            // // Hiển thị kết quả JSON hoặc trả về mã lỗi HTTP 404 Not Found nếu không có bản ghi nào được tìm thấy
                                            // echo ($stmt->rowCount() > 0) ? json_encode($result) : http_response_code(404);

                                            $set_san_pham = "SELECT * FROM sanpham order by anhSanPham,giaSanPham,ten_sp";
                                            $results = mysqli_query($conn, $set_san_pham);

                                            while ($sp = mysqli_fetch_assoc($results)) {
                                        ?>
                                                <div class="Sanpham">
                                                    <h3 style="margin-left: 10px;">
                                                        <img src="<?php echo $sp['anhSanPham'];
                                                                    ?> " style="height: 150px; width: 150px;"> <br>
                                                        <?php echo $sp['ten_sp']; ?> <br>
                                                        <?php echo number_format($sp['giaSanPham']); ?> <br>

                                                    </h3>
                                                </div>


                                        <?php
                                            };
                                        } catch (PDOException $e) {
                                            // Trả về mã lỗi HTTP 500 Internal Server Error nếu xảy ra lỗi trong quá trình kết nối hoặc truy vấn
                                            http_response_code(500);
                                            echo json_encode(array("message" => "Unable to retrieve data: " . $e->getMessage()));
                                        }

                                        // Đóng kết nối database
                                        $conn = null;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php

                }
            } catch (PDOException $e) {
                // Trả về mã lỗi HTTP 500 Internal Server Error nếu xảy ra lỗi trong quá trình kết nối hoặc truy vấn
                http_response_code(500);
echo json_encode(array("message" => "Unable to retrieve data: " . $e->getMessage()));
            }

            // Đóng kết nối database
            $conn = null;
                ?>

                <!-- <h3 style="margin-left: 20px;">Đồ uống</h3> -->

            </div>

            <!-- 
                <h2 style="margin-left: 20px; margin-top: 20px;">Đồ ăn</h2>


                <div id="container">
                    <div id="slider-container">
                        <span onclick="Right2()" class="btn btn2"></span>

                        <span onclick="Left2()" class="btn btn2"></span>
                    </div>
                </div> -->



        </main>

    </div>

</body>



</html>
<?php
// Thông tin kết nối database
include 'API.php';

// try {
//     // Kết nối tới database sử dụng PDO
//     $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

//     // Truy vấn dữ liệu từ bảng employee_data
//     $stmt = $conn->query("SELECT * FROM sanpham");

//     // Lấy tất cả các bản ghi và chuyển thành mảng kết quả JSON
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     // Thiết lập header để trả về JSON
//     header('Content-Type: application/json');

//     // Hiển thị kết quả JSON hoặc trả về mã lỗi HTTP 404 Not Found nếu không có bản ghi nào được tìm thấy
//     echo ($stmt->rowCount() > 0) ? json_encode($result) : http_response_code(404);
// } catch (PDOException $e) {
//     // Trả về mã lỗi HTTP 500 Internal Server Error nếu xảy ra lỗi trong quá trình kết nối hoặc truy vấn
//     http_response_code(500);
//     echo json_encode(array("message" => "Unable to retrieve data: " . $e->getMessage()));
// }

// Đóng kết nối database
$conn = null;
?>
<?php
// Thông tin kết nối database
$db_host = "localhost";
$db_name = "coffeoder";
$db_user = "root";
$db_pass = "";

// try {
//     // Kết nối tới database sử dụng PDO
//     $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    
//     // Truy vấn dữ liệu từ bảng employee_data
//     $stmt = $conn->query("SELECT * FROM danhmuc");

//     // Lấy tất cả các bản ghi và chuyển thành mảng kết quả JSON
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     // Thiết lập header để trả về JSON
//     header('Content-Type: application/json');
        
//     // Hiển thị kết quả JSON hoặc trả về mã lỗi HTTP 404 Not Found nếu không có bản ghi nào được tìm thấy
//     echo ($stmt->rowCount() > 0) ? json_encode($result) : http_response_code(404);
// } catch(PDOException $e) {
//     // Trả về mã lỗi HTTP 500 Internal Server Error nếu xảy ra lỗi trong quá trình kết nối hoặc truy vấn
//     http_response_code(500);
//     echo json_encode(array("message" => "Unable to retrieve data: " . $e->getMessage()));
// }

// Đóng kết nối database
$conn = null;
?>
