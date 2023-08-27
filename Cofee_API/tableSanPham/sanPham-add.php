<?php


$db_host = "localhost";
$db_name = "du_an_tot_ngiep";
$db_user = "root";
$db_pass = "";

// Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các tham số cần thiết đã được cung cấp hay chưa
    if (isset($_POST['ten_sp'], $_POST['giaSanPham'], $_POST['size'], $_POST['anhSanPham'] , $_POST['giaSanPham'], $_POST['gioiThieu'], $_POST['id_danhMuc'], $_POST['id_giamGia'])) {
        $ten_sp = $_POST['ten_sp'];
        $giaSanPham = $_POST['giaSanPham'];
        $size = $_POST['size'];
        $anhSanPham = $_POST['anhSanPham'];
        $gioiThieu = $_POST['gioiThieu'];
        $id_danhMuc = $_POST['id_danhMuc'];
        $id_giamGia = $_POST['id_giamGia'];

        // Thực hiện kết nối CSDL
        try {
            $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Lỗi kết nối CSDL: ' . $e->getMessage());
        }

        // Kiểm tra và xử lý giá trị nhập liệu hợp lệ
        // (Bạn nên thực hiện kiểm tra hợp lệ và xử lý nhập liệu dựa trên yêu cầu cụ thể của ứng dụng)
        // Ví dụ: Xử lý giá trị rỗng, kiểm tra định dạng email, v.v.

        // Thực hiện truy vấn để thêm người dùng vào CSDL
        try {
            $sql_str = "INSERT INTO `sanpham` (`ten_sp`, `giaSanPham`, `size`, `anhSanPham`, `gioiThieu`, `id_danhMuc`, `id_giamGia`) VALUES 
            (:ten_sp, :giaSanPham, :size, :anhSanPham, :gioiThieu, :id_danhMuc, :id_giamGia)";
            $stmt = $objConn->prepare($sql_str);
            $stmt->bindParam(':ten_sp', $ten_sp);
            $stmt->bindParam(':giaSanPham', $giaSanPham);
            $stmt->bindParam(':size', $size);
            $stmt->bindParam(':anhSanPham', $anhSanPham);
            $stmt->bindParam(':gioiThieu', $gioiThieu);
            $stmt->bindParam(':id_danhMuc', $id_danhMuc);
            $stmt->bindParam(':id_giamGia', $id_giamGia);

            if ($stmt->execute() && $stmt->rowCount() > 0) {
                echo "User added successfully.";
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
 

 <!-- <!DOCTYPE html>
 <html>
 <head>
     <title>Add Sản phẩm</title>
 </head>
 <body>

     <h1>Add Sản phẩm</h1>

     <form action="sanPham-add.php" method="POST">
         <label>ten_sp: <input type="text" name="ten_sp"></label><br>
         <label>giaSanPham: <input type="text" name="giaSanPham"></label><br>
         <label>size: <input type="text" name="size"></label><br>
         <label>anhSanPham: <input type="text" name="anhSanPham"></label><br>
         <label>gioiThieu: <input type="text" name="gioiThieu"></label><br>
         <label>id_danhMuc: <input type="text" name="id_danhMuc"></label><br>
         <label>id_giamGia: <input type="text" name="id_giamGia"></label><br>
         <input type="submit" value="Add User">
     </form>

 </body>
 </html>  -->
 
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
                    <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Do_ban_chay.html"><li><i class="fas fa-caravan"></i>Đồ bán chạy</li></a>
                        <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Quan_ly_do_uong.html"><li><i class="fas fa-wine-glass-alt"></i>Quản lý đồ uống</li></a>
                        <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Quan_ly_nguyen_lieu.html"><li><i class="fas fa-seedling"></i>Quản lý nguyên liệu</li></a>
                        <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Quan_ly_ban.html"><li>Quản lý bàn </li></a>
                        <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Tai_khoan_nhan_vien.html"><li>Tài khoản nhân viên</li></a>
                        <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Thong_ke.html"><li>Thống kê</li></a>
                        <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Khuyen_mai.html"><li>Khuyến mại</li></a> 
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
                <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Quan_ly_do_uong.html"><span>Quản lý đồ uống</span></a>
                <a href=""><span>/ Thêm sản phẩm</span></a>

            </section>

            <form action="sanPham-add.php" method="POST">
                <section class="thongtinMK">
                    <label for="">Ảnh SP:<input type="file" name="anhSanPham"></label> <br>
                    <label for="">Tên SP:<input type="text" name="ten_sp" placeholder="Nhập tên sản phẩm"></label> <br>
                    <label for="">Giá SP:<input type="text" name="giaSanPham" placeholder="Nhập giá loại"></label> <br>
                    <label for="">Size:<input type="text" name="size" placeholder="Nhạp size sản phẩm"></label> <br>
                    <label for="">Thể loại:<input type="text" name="id_danhMuc" placeholder="Nhập tên loại"></label>
                    <br>
                    <label for="">Giảm giá:<input type="text" name="id_giamGia" placeholder="Giảm giá"></label> <br>
                    <label for="">Giới thiệu:<input type="text" name="gioiThieu"
                            placeholder="Thông tin sản phẩm"></label> <br>
                    <div class="oclock">
                        <span> Ngày:<p id="current-date" style="margin: -17px 0 0 50px;"></p></span>
                        <span>Time:<p id="current-time" style="margin: -17px 0 0 50px;"></p></span>
                    </div><br>

                    <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Quan_ly_do_uong.html" type="sumbit">Them San Pham </a>

                   
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
<style>
    body{
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
    font-weight: normal; /* Trọng lượng phông chữ */
    font-style: normal; /* Kiểu phông chữ */
  }
 
.div-all{
    display: flex;
}
nav{
    flex: 1;
    background-color: #2A3F53;
    color: aliceblue;
    padding: 20px;

}
.head h2{
    margin-left: 60px;
    margin-bottom: 40px;
}
.img{
    border: 1px solid #ffffff;
    border-radius: 50%;
    padding: 20px;
    background-color: white;
    flex-shrink: 0; /* Đảm bảo ảnh không bị co lại khi không đủ không gian */
    width: 25px; /* Đặt chiều rộng ảnh là 200px */
    height: auto;
}
.use{
    display: flex;
    row-gap: 1fr;
    margin-bottom: 20px;
    
}
/**/
/*xin chao */
.use section{
    margin-left: 40px;
    margin-top: 15px;
}
/*menu list danh sach */
.menu {
    margin-top: 40px;
    border-top:  1px solid white;
    padding-bottom: 90px;
}
.menu ul{
    list-style-type: none;
}
ul li i{
     margin-right: 20px;
     width: 20px;
     height: 10px;
}
ul li{
    margin-top: 70px;
}
ul a{
    color: white;
        text-decoration: none;
}
main{

    flex: 5;
}
/****************************************************/
main i{

}
.canhan {
    background-color: #D9D9D9;
    padding: 25px;
    position: relative;
    
}
.canhan img{
    position: absolute;
    right: 190px;
    margin-top: -12px;
    border: 1px solid #ffffff;
    border-radius: 50%;
    padding: 15px;
    background-color: white;
    flex-shrink: 0; /* Đảm bảo ảnh không bị co lại khi không đủ không gian */
    width: 15px; /* Đặt chiều rộng ảnh là 200px */
    height: auto;
}
.canhan .dropdown{
    position: absolute;
    right: 60px;
    margin-top: -20px;
}
.dropdown{
   position: relative;
}
.dropdown_select{
    cursor: pointer;
   
}
.dropdown:hover .dropdown_list{
    display: block;
}
.dropdown_selected {
   
}
.dropdown_list{
    width: 135px;
    border-radius:  4px;
    background-color: #D9D9D9;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    display: none;
}
.dropdown_list::before{
    content: "";
    height: 20px;
    position: absolute;
    left: 0;
    right: 0;
    background-color: transparent;
    transform: translateY(-100%);
}
.dropdown_item{
   
    text-align: center;
    margin-top: -5px;
    margin-left: -40px;
    padding: 15px;
    cursor: pointer;
    transition: background-color 0.2s linear;
    list-style-type: none;
}
.dropdown_item:hover{
    background-color: #2A3F53;
}
/****************************************************/
.tenQL{
    margin-top: 10px;
    padding: 25px;
    border-bottom:1px solid #D9D9D9 ;
}
.tenQL a{
    text-decoration: none;
    color: black;
}
.thoigian{
    padding: 20px;
    border-bottom: 2px solid #D9D9D9;
}
.themDS{
    position: absolute;
    right: 50px;
    width: 100px;
}
.themDS button{
    padding: 5px;
}
/****************************************************/
.thongtinMK{
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    margin-top: 50px;
}
.thongtinMK label{
    margin-left: -100px;
    padding: 10px;

}
.thongtinMK input{
    margin-left: 30px;
    width: 500px;
    padding: 10px;
}
.thongtinMK span{
    margin-top: 20px;
    margin-left: -300px;
}
.thongtinMK button{
    padding: 10px;
    margin: 50px 0 0 500px;
    border-radius: 5px;
}
.thongtinMK button:hover{
    background-color: #2A3F53;
    color: white;
}
/**************************************************/
.oclock{
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
}
</style>

</html>
