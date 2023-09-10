<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản nhân viên</title>
    <link rel="stylesheet" href="../man_chinh/Quan_ly_nhan_vien.css">
    <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script>

    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 80%;
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
    width: 150px;
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
.thoigian{
    padding: 30px;
    border-bottom: 2px solid #D9D9D9;
}
.themDS{
    position: absolute;
    right: 50px;
    width: 130px;
    margin-top: -14px;
}
.themDS button{
    padding: 5px;
}

        </style>
</head>

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
                        <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Do_ban_chay.html"><li><i class="fas fa-caravan"></i>Đồ bán chạy</li></a>
                        <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Quan_ly_do_uong.html"><li><i class="fas fa-wine-glass-alt"></i>Quản lý đồ uống</li></a>
                        <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Quan_ly_nguyen_lieu.html"><li><i class="fas fa-seedling"></i>Quản lý nguyên liệu</li></a>
                        <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Quan_ly_ban.html"><li>Quản lý bàn </li></a>
                        <a href="http://localhost/Coffebe/duantotnghiep/CoffeOder/user-get.php"><li>Tài khoản nhân viên</li></a>
                        <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Thong_ke.html"><li>Thống kê</li></a>
                        <a href="http://127.0.0.1:5500/duantotnghiep/man_chinh/Khuyen_mai.html"><li>Khuyến mại</li></a> 
                    </ul>
                </section>
            </nav>
            <main>
                
                <section class="canhan">
                    <i class="fas fa-bars"></i>
                    <img src="anh_manhinh/use.png" alt="">
                    <section class="dropdown">
                        <section class="dropdwon_select">
                            <span class="dropdown_selected">Administrator</span>
                            <i class="fas fa-sort-down"></i>
                            <ul class="dropdown_list">
                                <a href="http://127.0.0.1:5500/duantotnghiep/Dang_nhap/Doi_mat_khau.html"><li class="dropdown_item">
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
                <span>Tài khoản nhân viên</span>
            </section>

            <section class="thoigian">
                <a href="http://localhost/Coffebe/duantotnghiep/CoffeOder/user-add.php" class="themDS"><button class="">Thêm Nhân Viên</button></a>
            </section>

            <section>
                <table id="customers">
                    <tr>
                        <th style="width: 150px;">Tên nhân viên</th>
                        <th style="width: 100px;">Ảnh</th>
                        <th style="width: 100px;">Chức Năng</th>
                        <th style="width: 150px;">Số điện thoại</th>
                        <th style="width: 200px;">Thông tin</th>
                    </tr>
                    <?php
                    // Thông tin kết nối database
                    include 'API.php';
                    $Cons = mysqli_connect("localhost", "root", "", "coffeoder");
                    try {
                        // // Kết nối tới database sử dụng PDO
                        // $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

                        // // Truy vấn dữ liệu từ bảng employee_data
                        // $stmt = $conn->query("SELECT * FROM user");

                        // // Lấy tất cả các bản ghi và chuyển thành mảng kết quả JSON
                        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // // Thiết lập header để trả về JSON
                        // header('Content-Type: application/json');

                        // // Hiển thị kết quả JSON hoặc trả về mã lỗi HTTP 404 Not Found nếu không có bản ghi nào được tìm thấy
                        // echo ($stmt->rowCount() > 0) ? json_encode($result) : http_response_code(404);

                        // thuc thi cau lenh


                        // cau lenh
                        $set_user_sql = "SELECT * FROM user  order by userName , chucNang";
                        $resultt = mysqli_query($Cons, $set_user_sql);

                        //duyet qua result va in ra
                        while($r = mysqli_fetch_assoc($resultt)){
                            
                            ?>
                           
                           <!-- echo  . " - ".$r['fullName']. " - ".$r['phone_Number'] ." - " .$r['chucNang'] . " - "; -->
                    <tr>      
                    <td><?php echo $r['fullName']; ?></td>
                           <td ><img src="<?php echo $r['image']; ?>" alt="Loading" style="width: 100px;height: 100px;"> </td>
                            <td><?php echo $r['chucNang']; ?></td>
                            
                            <td>0987654321</td>
                            <td> <div  class="sua" >
                            
                                <a onclick="myFunction() "  style="margin-right: 18px;" >Sửa</a>

                                <dialog id="myDialog">
                                <?php

                                        include 'API.php';

                                        // Kiểm tra xem người dùng đã gửi yêu cầu POST hay chưa
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            // Kiểm tra xem tất cả các tham số cần thiết đã được cung cấp hay chưa
                                            if (isset($_POST['id_User'], $_POST['userName'], $_POST['image'], $_POST['passwd'], $_POST['phone_Number'], $_POST['chucNang'], $_POST['fullName'])) {
                                                $id_User = $_POST['id_User'];
                                                $userName = $_POST['userName'];
                                                $image = $_POST['image'];
                                                $passwd = $_POST['passwd'];
                                                $phone_Number = $_POST['phone_Number'];
                                                $chucNang = $_POST['chucNang'];
                                                $fullName = $_POST['fullName'];

                                                // Thực hiện kết nối CSDL
                                                try {
                                                    $objConn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
                                                    $objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                } catch (PDOException $e) {
                                                    die('Lỗi kết nối CSDL: ' . $e->getMessage());
                                                }

                                                // Kiểm tra xem người dùng có tồn tại trong CSDL hay không
                                                $sql_check_user = "SELECT * FROM `user` WHERE `id_User` = :id_User";
                                                $stmt_check_user = $objConn->prepare($sql_check_user);
                                                $stmt_check_user->bindParam(':id_User', $id_User);
                                                $stmt_check_user->execute();
                                                $user = $stmt_check_user->fetch(PDO::FETCH_ASSOC);

                                                if (!$user) {
                                                    echo "Người dùng không tồn tại.";
                                                    exit;
                                                }

                                                // Thực hiện truy vấn để update thông tin người dùng trong CSDL
                                                try {
                                                    $sql_update = "UPDATE `user` SET `userName` = :userName, `image` = :image, `passwd` = :passwd, `phone_Number` = :phone_Number, `chucNang` = :chucNang, `fullName` = :fullName WHERE `id_User` = :id_User";
                                                    $stmt_update = $objConn->prepare($sql_update);
                                                    $stmt_update->bindParam(':userName', $userName);
                                                    $stmt_update->bindParam(':image', $image);
                                                    $stmt_update->bindParam(':passwd', $passwd);
                                                    $stmt_update->bindParam(':phone_Number', $phone_Number);
                                                    $stmt_update->bindParam(':chucNang', $chucNang);
                                                    $stmt_update->bindParam(':fullName', $fullName);
                                                    $stmt_update->bindParam(':id_User', $id_User);

                                                    if ($stmt_update->execute() && $stmt_update->rowCount() > 0) {
                                                        echo "Người dùng đã được cập nhật thành công.";
                                                    } else {
                                                        echo "Không thể cập nhật người dùng.";
                                                    }
                                                } catch (PDOException $e) {
                                                    die('Lỗi cập nhật người dùng: ' . $e->getMessage());
                                                }
                                            } else {
                                                echo "Vui lòng điền đầy đủ thông tin cần cập nhật.";
                                            }
                                        }

                                        ?>
                                <form action="user-update.php" method="POST">
                                <label>id_User: <input type="text" name="id_User" placeholder="<?php echo $r['Id_User']?>"></label><br>
                                <label>userName: <input type="text" name="userName"></label><br>
                                <label>image: <input type="text" name="image"></label><br>
                                <label>passwd: <input type="text" name="passwd"></label><br>
                                <label>phone_Number: <input type="text" name="phone_Number"></label><br>
                                <label>chucNang: <input type="text" name="chucNang"></label><br>
                                <label>fullName: <input type="text" name="fullName"></label><br>
                                <input type="submit" value="Update user">
                                
                            </form>
                            <button type="submit" type="margin-top :2% " onclick="ex()"> X</button>
                                </dialog>
                                <a style="margin-right: 18px;" href="">Xóa</a>
                                <a href="">Chi tiết</a>
                        
                            </div> </td>
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
            </section>
        </main>
    </div>
</body>
<script>
    function myFunction() {
        const element = document.getElementById("myDialog");
        element.open = true;
    }

    function ex() {
        const element = document.getElementById("myDialog");
        element.open = false;
    }
</script>

</html>