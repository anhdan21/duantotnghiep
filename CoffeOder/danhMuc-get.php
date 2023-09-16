<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồ bán chạy</title>
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





    /* ===================================================== */
    #container {
        height: 300px;
        width: 82vw;
        place-items: center;
        background: rgb(246, 247, 247);
        margin-right: 50px;
        /* display: grid; */
        margin-left: 20px;

    }

    #slider-container {
        height: 300px;
        width: 82vw;
        max-width: 100%;
        background: #fff;
        position: relative;
        overflow: hidden;
        margin-top: 3%;
    }

    #slider-container .btn {
        position: absolute;
        top: calc(50% - 30px);
        height: 10px;
        width: 10px;
        border-left: 7px solid rgb(207, 205, 200);
        border-top: 7px solid rgb(207, 205, 200);
    }

    #slider-container .btn:hover {
        transform: scale(1.2);
    }

    #slider-container .btn.inactive {
        border-color: rgb(153, 121, 126)
    }

    #slider-container .btn:first-of-type {
        transform: rotate(-45deg);
        left: 10px
    }

    #slider-container .btn:last-of-type {
        transform: rotate(135deg);
        right: 10px;
    }



    #slider-container .slider {
        display: flex;
        width: 100%;
        height: 90%;
        transition: all .5s;
    }

    #slider-container .slider .slide {
        height: 100%;
        margin: auto 20px;
        background-color: #eeeef3;
        /* box-shadow: 2px 2px 4px 2px gray, -2px -2px 4px 2px gray; */
        display: flex;
        place-items: center;
    }

    #slider-container .slider .slide span {

        height: 300px;
        width: 250px;
    }

    #slider-container .slider .slide span .tensp {
        color: rgb(8, 8, 8);
        font-size: 18px;
        text-align: center;
        margin: 0px;
    }

    #slider-container .slider .slide span .giasp {
        color: rgb(244, 5, 5);
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        margin: 8px;
    }

    @media only screen and (min-width: 1100px) {

        #slider-container .slider .slide2 {
            width: calc(2.5% - 20px);
        }

    }

    @media only screen and (max-width: 1100px) {

        #slider-container .slider .slide {
            width: calc(3.3333333% - 20px);
        }

    }

    @media only screen and (max-width: 900px) {

        #slider-container .slider .slide {
            width: calc(5% - 20px);
        }

    }

    @media only screen and (max-width: 550px) {

        #slider-container .slider .slide {
            width: calc(10% - 20px);
        }

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
                        <span>Đồ Bán Chạy</span>
                    </section>
                    <section class="thoigian">
                        <input type="date"> -- <input type="date" name="" id="">
                        <a href="http://localhost/Coffebe/duantotnghiep/CoffeOder/danhMuc-add.php" class="themDS"><button class="">Thêm danh sách</button></a>
                    </section>
                </div>

                <div class="Header2">
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
                        $i = 1;
                        while ($dm = mysqli_fetch_assoc($result)) {
                           
                            
                    ?>
                            <h3 style="padding-left: 30px; padding-top: 40px;">
                                <?php echo $dm['ten_danhMuc']; ?>
                            </h3>
                            <h1></h1>
                            <div id="container">
                                <div id="slider-container">
                                    <span onclick="slideRight<?php echo $i; ?>()" class="btn button<?php echo $i; ?>"></span>
                                    <div id="slider<?php echo $i; ?>" class="slider">
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
                                                        <div style="margin-left: 10px;">
                                                            <img src="<?php echo $sp['anhSanPham'];
                                                                        ?> " style="height: 150px; width: 150px; object-fit: fill;"> <br>
                                                            <div><span> <?php echo $sp['ten_sp']; ?> </span></div> <br>
                                                            <div><span> <?php echo number_format($sp['giaSanPham']); ?> </span> </div> <br>

                                                        </div>
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
                                    <span onclick="slideLeft<?php echo $i; ?>()" class="btn button<?php echo $i; ?>"></span>

                                    <script>
                                        var container<?php echo $i; ?> = document.getElementById('container')
                                        var slider<?php echo $i; ?> = document.getElementById('slider<?php echo $i; ?>');
                                        var slides = document.getElementsByClassName('slide').length;
                                        var buttons<?php echo $i; ?> = document.getElementsByClassName('button<?php echo $i; ?>');

                                        console.log(buttons<?php echo $i; ?>)

                                        var currentPosition<?php echo $i; ?> = 0;
                                        var currentMargin<?php echo $i; ?> = 0;
                                        var slidesPerPage<?php echo $i; ?> = 0;
                                        var slidesCount<?php echo $i; ?> = slides - slidesPerPage<?php echo $i; ?>;
                                        var containerWidth<?php echo $i; ?> = container<?php echo $i; ?>.offsetWidth;
                                        var prevKeyActive<?php echo $i; ?> = false;
                                        var nextKeyActive<?php echo $i; ?> = true;

                                        window.addEventListener("resize", checkWidth);

                                        function checkWidth() {
                                            containerWidth<?php echo $i; ?> = container<?php echo $i; ?>.offsetWidth;
                                            setParams(containerWidth<?php echo $i; ?>);
                                        }

                                        function setParams(w) {
                                            if (w < 551) {
                                                slidesPerPage<?php echo $i; ?> = 1;
                                            } else {
                                                if (w < 901) {
                                                    slidesPerPage<?php echo $i; ?> = 2;
                                                } else {
                                                    if (w < 1101) {
                                                        slidesPerPage<?php echo $i; ?> = 3;
                                                    } else {
                                                        slidesPerPage<?php echo $i; ?> = 4;
                                                    }
                                                }
                                            }
                                            slidesCount<?php echo $i; ?> = slides - slidesPerPage<?php echo $i; ?>;
                                            if (currentPosition<?php echo $i; ?> > slidesCount<?php echo $i; ?>) {
                                                currentPosition<?php echo $i; ?> += slidesPerPage<?php echo $i; ?>;
                                                //không được xóa
                                                console.log(currentPosition<?php echo $i; ?> -= slidesPerPage<?php echo $i; ?>)
                                                //
                                            };
                                            currentMargin<?php echo $i; ?> = -currentPosition<?php echo $i; ?> * (100 / slidesPerPage<?php echo $i; ?>);
                                            slider<?php echo $i; ?>.style.marginLeft = currentMargin<?php echo $i; ?> + '%';
                                            if (currentPosition<?php echo $i; ?> > 0) {
                                                buttons<?php echo $i; ?>[0].classList.remove('inactive');
                                            }
                                            if (currentPosition<?php echo $i; ?> < slidesCount<?php echo $i; ?>) {
                                                buttons<?php echo $i; ?>[1].classList.remove('inactive');
                                            }
                                            if (currentPosition<?php echo $i; ?> >= slidesCount<?php echo $i; ?>) {
                                                buttons<?php echo $i; ?>[1].classList.add('inactive');
                                            }
                                        }

                                        setParams();

                                        function slideRight<?php echo $i; ?>() {
                                            if (currentPosition<?php echo $i; ?> != 0) {
                                                slider<?php echo $i; ?>.style.marginLeft = currentMargin<?php echo $i; ?> + (100 / slidesPerPage<?php echo $i; ?>) + '%';
                                                currentMargin<?php echo $i; ?> += (100 / slidesPerPage<?php echo $i; ?>);
                                                currentPosition<?php echo $i; ?>--;
                                            };
                                            if (currentPosition<?php echo $i; ?> === 0) {
                                                buttons<?php echo $i; ?>[0].classList.add('inactive');
                                            }
                                            if (currentPosition<?php echo $i; ?> < slidesCount<?php echo $i; ?>) {
                                                buttons<?php echo $i; ?>[1].classList.remove('inactive');
                                            }
                                        };

                                        function slideLeft<?php echo $i; ?>() {
                                            if (currentPosition<?php echo $i; ?> != slidesCount<?php echo $i; ?>) {
                                                slider<?php echo $i; ?>.style.marginLeft = currentMargin<?php echo $i; ?> - (100 / slidesPerPage<?php echo $i; ?>) + '%';
                                                currentMargin<?php echo $i; ?> -= (100 / slidesPerPage<?php echo $i; ?>);
                                                currentPosition<?php echo $i; ?>++;
                                            };
                                            if (currentPosition<?php echo $i; ?> == slidesCount<?php echo $i; ?>) {
                                                buttons<?php echo $i; ?>[1].classList.add('inactive');
                                            }
                                            if (currentPosition<?php echo $i; ?> > 0) {
                                                buttons<?php echo $i; ?>[0].classList.remove('inactive');
                                            }
                                        };
                                    </script>
                                </div>

                            </div>


                    <?php
                    $i++;

                        }
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

            <h3 style="margin-left: 20px;">Đồ uống</h3>

    </div>


    <!-- <h2 style="margin-left: 20px; margin-top: 20px;">Đồ ăn</h2> -->


    <!-- <div id="container">
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