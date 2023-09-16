<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn</title>
    <link rel="stylesheet" href="Thong_ke.css">
    <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script>
</head>

<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 95%;
        margin: 20px;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        /* width: 150px; */
        text-align: center;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #2A3F53;
        color: white;

    }

    #customers td .sua a {

        text-decoration: none;
        color: black;
    }

    #customers td .sua a:hover {
        /* background: yellow; */
        color: blue;

    }

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

    .thoigian {
        padding: 20px;
        border-bottom: 2px solid #D9D9D9;
        padding-left: 50px;
        background-color: #fff;
    }

    .themDS {
        position: absolute;
        right: 50px;
        width: 130px;
        margin-top: -14px;
    }

    .themthang {
        position: absolute;
        right: 200px;
        width: 130px;
        margin-top: -14px;
    }

    .themthang button {
        padding: 5px;
    }

    .themDS button {
        padding: 5px;
    }

    /****************************************************/
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
                    <a href="http://localhost/Coffebe/duantotnghiep/man_chinh/Quan_ly_do_uong.html">
                        <li><i class="fas fa-wine-glass-alt"></i>Quản lý đồ uống</li>
                    </a>
                    <a href="http://localhost/Coffebe/duantotnghiep/man_chinh/Quan_ly_nguyen_lieu.html">
                        <li><i class="fas fa-seedling"></i>Quản lý nguyên liệu</li>
                    </a>
                    <a href="http://localhost/Coffebe/duantotnghiep/CoffeOder/ban-get.php">
                        <li>Quản lý bàn </li>
                    </a>
                    <a href="http://localhost/Coffebe/duantotnghiep/CoffeOder/user-get.php">
                        <li>Tài khoản nhân viên</li>
                    </a>
                    <a href="http://localhost/Coffebe/duantotnghiep/CoffeOder/hoaDonct-get.php">
                        <li>Hóa đơn</li>
                    </a>
                    <a href="http://localhost/Coffebe/duantotnghiep/man_chinh/Khuyen_mai.html">
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
                        <span>Hóa Đơn</span>
                    </section>

                    <section class="thoigian">
                        <a href="http://localhost/Coffebe/duantotnghiep/CoffeOder/hoa-don-ngay.php" class="themDS"><button class="">Tổng Đơn Ngày</button></a>
                        <a href="http://localhost/Coffebe/duantotnghiep/CoffeOder/hoa-don-thang.php" class="themthang"><button class="">Tổng Đơn Tháng</button></a>
                    </section>
                </div>
                <div class="Header2">
                    <table id="customers">
                        <tr>
                            <th style="width: auto;">Ngày</th>
                            <th style="width: auto;">Tầng & Bàn</th>
                            <th style="width: auto;">Tên sản phẩm</th>
                            <th style="width: auto;">Số lượng</th>
                            <th style="width: auto;">Giá sản phẩm</th>
                            <th style="width: auto;">Tổng tiền</th>

                        </tr>
                        <?php
                        // Thông tin kết nối database
                        include 'API.php';
                        $Cons = mysqli_connect("localhost", "root", "", "coffeoder");
                        try {

                            // thuc thi cau lenh


                            // cau lenh
                            $set_hoadonct_sql = "SELECT * FROM hoadonct  order by time_in , time_out";
                            $resultt = mysqli_query($Cons, $set_hoadonct_sql);
                            // $r = mysqli_fetch_assoc($resultt);

                            //câu lệnh khóa ngoại table
                            // $set_Table = "SELECT * FROM hoadon_item ORDER BY Id_hoaDonCT ASC;";

                            $set_Table = "SELECT hoadon_item.* , hoadonct.time_Data AS time_data , hoadonct.tongTien AS tongtien, hoadonct.Id_Table AS id_table     
                                                        -- ,sanpham.ten_sp AS ten_Sp
                        
                        FROM  hoadon_item
                        INNER JOIN  hoadonct  ON hoadon_item.Id_hoaDonCT = hoadonct.Id_hoaDonCT
                        order by hoadon_item.id_hd_item ASC
                        --  AND
                        -- INNER JOIN sanpham ON hoadon_item.id_sanPham = sanpham.Id_sanPham
                        -- order by hoadon_item.id_hd_item ASC 
                        ";

                            $resultl = mysqli_query($Cons, $set_Table);

                            // $T = mysqli_fetch_assoc($resultl);
                            // echo $T ['soban'];


                            $set_Tang = "SELECT `table`.* , tang.soTang
                    FROM  `table` 
                    INNER JOIN  `tang` ON `table`.id_tang= tang.id_tang
                    order by table.id_tang ASC";
                            $resultltang = mysqli_query($Cons, $set_Tang);
                            // $Ta = mysqli_fetch_assoc($resultltang);



                            // khóa ngoại giam gia

                            $resultlt = mysqli_query($Cons, $set_Table);

                            // $G = mysqli_fetch_assoc($resultlt);


                            // echo $G['giam'];
                            //duyet qua result va in ra
                            while ($T = mysqli_fetch_assoc($resultl)) {
                                // echo $r['Id_hoaDonCT'];
                                // echo '</br>'. $r['Id_Table'];
                                // $T = mysqli_fetch_assoc($resultl); 
                                // while($T = mysqli_fetch_assoc($resultl) ){
                                //     // echo $T['soBan'];
                                //     while($G = mysqli_fetch_assoc($resultlt) ){



                        ?>
                                <tr>
                                    <td>
                                        <?php echo $T['time_data'] ?>
                                    </td>
                                    <td>
                                        <?php echo $T['id_table'] ?>
                                    </td>
                                    <td>
                                        <?php echo $T['tenSp'] ?>
                                    </td>
                                    <td>
                                        <?php echo $T['soLuong'] ?>
                                    </td>
                                    <td>
                                        <?php echo $T['giaSp'] ?>
                                    </td>
                                    <td>
                                        <?php echo $T['tongtien'] ?>
                                    </td>

                                </tr>

                        <?php

                            }
                        } catch (PDOException $e) {
                            // Trả về mã lỗi HTTP 500 Internal Server Error nếu xảy ra lỗi trong quá trình kết nối hoặc truy vấn
                            http_response_code(500);
                            echo json_encode(array("message" => "Unable to retrieve data: " . $e->getMessage()));
                        }

                        // Đóng kết nối database
                        // $conn = null;
                        ?>

                    </table>
                </div>
            </div>    
                
        </main>
    </div>
    <script src="/duantotnghiep/Them/menu.js"></script>
</body>

</html>