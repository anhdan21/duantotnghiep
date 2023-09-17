<?php
// Thông tin kết nối database
include 'API.php';

$showForm = true;
$message = ""; // Biến để lưu thông báo

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem ID và password đã được cung cấp hay chưa
    if (isset($_POST['userName']) && isset($_POST['passwd'])) {
        $userName = $_POST['userName'];
        $passwd = $_POST['passwd'];
        
        try {
            // Kết nối tới database sử dụng PDO
            $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            
            // Truy vấn dữ liệu từ bảng user dựa trên ID và password
            $stmt = $conn->prepare("SELECT * FROM `user` WHERE `userName` = :userName AND `passwd` = :passwd AND chucNang = 0");
            $stmt->bindParam(':userName', $userName);
            $stmt->bindParam(':passwd', $passwd);
            $stmt->execute();

            // Lấy tất cả các bản ghi và chuyển thành mảng kết quả JSON
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Hiển thị kết quả JSON hoặc hiển thị thông báo
            if ($stmt->rowCount() > 0) {
                // Loại bỏ mật khẩu từ mảng kết quả trước khi trả về
                foreach ($result as &$user) {
                    unset($user['passwd']);
                }
                // echo json_encode($result);
                header("Location: ../CoffeOder/danhMuc-get.php");
            } else {
                
                $thon= " <p style='color : red; magrin-left:20%;'> Sai thong tin tai khoa mat khau </p>";
                echo $thon;
            }
            $showForm = false;
        } catch(PDOException $e) {
            $message = "Không thể kết nối đến CSDL: " . $e->getMessage();
        }

        // Đóng kết nối database
        $conn = null;
    } else {
        $message = "Vui lòng nhập tên người dùng và mật khẩu.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COFFEE BEE ORDER</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script>
</head>

<style>
    body{
    margin: auto;
    padding: 40px;
    width: 30%;
    font-family: 'Inter', sans-serif;
}
@font-face {
    font-family: 'Inter';
    src: url('đường_dẫn_đến_tệp_font/inter.woff2') format('woff2'),
         url('đường_dẫn_đến_tệp_font/inter.woff') format('woff');
    /* Nếu muốn hỗ trợ thêm các định dạng font khác, bạn có thể thêm vào đây */
    font-weight: normal; /* Trọng lượng phông chữ */
    font-style: normal; /* Kiểu phông chữ */
  }
h1{
    margin-left: 50px;
    color: #8b652a;
}
.all{
    text-align: center;
    background-color: #b9b8b7;
    padding:  10px;
}
.form{
    display: grid;
    grid-template-columns:  1fr 1fr;
}
.form img{
    width: 60%;
    height: 70%;  
    margin-left: 10px;
}
.form form input{
    width: 60%;
    padding: 10px;
    margin-top: 5%;
}
.form form {
    margin-left: -50%;
}
.form form i {
    margin-right: 2%;
}
.ghinho{
    margin-top: -3%;
    margin-left: -30%;
}
.ghinho span{
    margin-left: -28%;
}
.ghinho a{
    margin-left: 145px;
    text-decoration: none;
}
.all button{
    width: 100%;
    padding: 10px;
    color: white;
    background-color: blue;
}
</style>
<body>
    <div class="all">
        <h1>BEE COFFEE ORDER</h1>
        <div class="form">
                         <?php
                    // Thông tin kết nối database
                    include 'API.php';
                    $Cons = mysqli_connect("localhost", "root", "", "coffeoder");
                    try {
                        $set_user_sql = "SELECT * FROM user  WHERE chucNang =0";
                        $resultt = mysqli_query($Cons, $set_user_sql);

                        //duyet qua result va in ra
                       $r = mysqli_fetch_assoc($resultt);
                            
                            ?>
                                    <img src="../CoffeOder/padlock 1.png" name="image" alt="">
                                    <form action="login.php" method="POST">
                                        <i class="fas fa-user-alt"></i>
                                        <input type="text" placeholder=" Username" name="userName"> <br>
                                        <i class="fas fa-key"></i>
                                        <input type="password" placeholder=" Password" name="passwd"> <br>
                                        
                                        <div class="ghinho">
                                            
                                            <input type="checkbox">
                                            <span>Ghi nhớ</span>
                                            
                                            <a class="a" href="">Quên mật khẩu ?</a>
                                        </div>
                                        
                                        <button type="submit"  value=""> ĐĂNG NHẬP</button>
                                    </form>
                            <?php
                   } catch (PDOException $e) {
                    // Trả về mã lỗi HTTP 500 Internal Server Error nếu xảy ra lỗi trong quá trình kết nối hoặc truy vấn
                    http_response_code(500);
                    echo json_encode(array("message" => "Unable to retrieve data: " . $e->getMessage()));
                }     
            ?>
        </div>
        

    </div>

</body>

</html>
