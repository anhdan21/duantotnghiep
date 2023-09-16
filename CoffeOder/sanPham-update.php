 <?php

    include "API.php";
    $id = $_GET['Id_sanPham'];
    $Con = mysqli_connect("localhost", "root", "", "coffeoder");
    $Edit = "SELECT * FROM sanpham WHERE Id_sanPham= $id";

    $result = mysqli_query($Con, $Edit);
    $row = mysqli_fetch_assoc($result);

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
                        <span>Cập nhật sản phẩm</span>
                    </section>
                 </div>
                 <div class="Header2">
                     <form action="sanPham-update-post.php" method="POST" enctype="multipart/form-data">
                         <h3>Update Sản phẩm</h3>

                         <input type="hidden" value="<?php echo $row['Id_sanPham']; ?>" name="sid">ID :<?php echo $row['Id_sanPham']; ?></input> <br><br>

                         <!-- <label>Id danh mục: <input type="text" name="id_danhMuc" value="<?php echo $row['id_danhMuc']; ?>"></label><br> -->
                         <h4 for="id_danhMuc" style="margin-right: 350px;">Danh mục :
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
                         </h4><br>
                         <label>Tên sản phẩm: <input type="text" name="ten_sp" value="<?php echo $row['ten_sp']; ?>"></label><br>
                         <label>Giá: <input type="text" name="giaSanPham" value="<?php echo $row['giaSanPham']; ?>"></label><br>
                         <label>Giới thiêu: <input type="text" name="gioiThieu" value="<?php echo $row['gioiThieu']; ?>"></label><br>
                         <label>Kích cỡ: <input type="text" name="size" value="<?php echo $row['size']; ?>"></label><br>
                         <h4>Chọn ảnh --
                             <input type="file" name="anhSanPham" id="anhSanPham">
                         </h4><br>
                         <button type="submit" name="btnSave">Save Update</button>
                         <button type="submit" name="btnCancel">Cancel</button>
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
 <style>
     /* CSS cho form */
     form {
         max-width: 500px;
         /* Đặt chiều rộng tối đa của form */
         margin: 0 auto;
         /* Căn giữa form trong trang */
         padding: 20px;
         /* Khoảng cách nội dung và khung form */
         border: 1px solid #ccc;
         /* Đường viền khung form */
         border-radius: 5px;
         /* Bo tròn góc của khung form */
         background-color: #f9f9f9;
         /* Màu nền của form */
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         /* Đổ bóng cho form */
     }

     /* CSS cho tiêu đề */
     h1 {
         text-align: center;
         /* Căn giữa tiêu đề */
         color: #333;
         /* Màu chữ */
     }

     /* CSS cho các label và input */
     label {
         display: block;
         /* Hiển thị mỗi label trên một dòng */
         margin-bottom: 10px;
         /* Khoảng cách giữa các label */
         font-weight: bold;
         /* In đậm chữ của label */
     }

     input[type="text"] {
         width: 100%;
         /* Đặt chiều rộng của input là 100% của form */
         padding: 10px;
         /* Khoảng cách bên trong input */
         margin-bottom: 15px;
         /* Khoảng cách giữa các input */
         border: 1px solid #ccc;
         /* Đường viền input */
         border-radius: 3px;
         /* Bo tròn góc của input */
     }

     /* CSS cho nút Save và Cancel */
     button[name="btnSave"],
     button[name="btnCancel"] {
         width: 50%;
         /* Đặt chiều rộng của nút là 50% của form */
         padding: 10px;
         /* Khoảng cách bên trong nút */
         border: none;
         /* Loại bỏ đường viền */
         border-radius: 3px;
         /* Bo tròn góc của nút */
         cursor: pointer;
         /* Biểu tượng chuột khi di chuyển qua nút */
     }

     button[name="btnSave"] {
         background-color: #4CAF50;
         /* Màu nền cho nút Save */
         color: white;
         /* Màu chữ trắng */
     }

     button[name="btnCancel"] {
         background-color: #f44336;
         /* Màu nền cho nút Cancel */
         color: white;
         /* Màu chữ trắng */
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
         margin-top: 130px;
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