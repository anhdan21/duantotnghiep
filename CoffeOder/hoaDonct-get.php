<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê</title>
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
    
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
      /* width: 150px; */
      text-align: center;
    }
    
    #customers tr:nth-child(even){background-color: #f2f2f2;}
    
    #customers tr:hover {background-color: #ddd;}
    
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: center;
      background-color: #2A3F53;
      color: white;
      
    }
    #customers td .sua a{
      
      text-decoration: none;
      color: black;
    }
    #customers td .sua a:hover{
      /* background: yellow; */
      color: blue;
      
    }
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

/****************************************************/
.select-menu{
   width: 160px;
   margin-top: -40px;
   margin-left: 20px;
}
 .select-btn{
    /* display: flex; */
    background: #fff;
    font-size: 18px;
    align-items: center;
    cursor: pointer;
    /* justify-content: space-between; */
}
 .options{
    position: relative;
    width: 150px;
    padding: 0;
    border-radius: 8px;
    display: none;
    border: 1px solid #000;
}
.select-menu.active .options{
   display: block;
}
 .option{
    list-style-type: none;
    cursor: pointer;
    border-radius: 8px;
    margin-top: 3px;
    padding: 10px;
    text-align: center;
    transition: background-color 0.2s linear;
}
.option:hover{
    background-color: #2A3F53;
    color: #fff;
}
.option-text{
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
          <a href="http://localhost/Coffebe/duantotnghiep/CoffeOder/danhMuc-get.php"><li><i class="fas fa-caravan"></i>Đồ bán chạy</li></a>
          <a href="http://localhost/Coffebe/duantotnghiep/man_chinh/Quan_ly_do_uong.html"><li><i class="fas fa-wine-glass-alt"></i>Quản lý đồ uống</li></a>
          <a href="http://localhost/Coffebe/duantotnghiep/man_chinh/Quan_ly_nguyen_lieu.html"><li><i class="fas fa-seedling"></i>Quản lý nguyên liệu</li></a>
          <a href="http://localhost/Coffebe/duantotnghiep/CoffeOder/ban-get.php"><li>Quản lý bàn </li></a>
          <a href="http://localhost/Coffebe/duantotnghiep/CoffeOder/user-get.php"><li>Tài khoản nhân viên</li></a>
          <a href=""><li>Hóa đơn</li></a>
          <a href="http://localhost/Coffebe/duantotnghiep/man_chinh/Khuyen_mai.html"><li>Khuyến mại</li></a> 
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
                <span>Hóa Đơn</span>
            </section>

            <section class="thoigian">
                <a href="" class="themDS"><button class="">Xuất File FDF</button></a>
            </section>
            <table id="customers">
                <tr>
                  <th style="width: auto;">Ngày</th>
                  <th style="width: auto;">Bàn</th>
                  <th style="width: auto;">Thời gian vào</th>
                  <th style="width: auto;">Thời gian ra</th>
                  <th style="width: auto;">Giảm</th>
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


                        //câu lệnh khóa ngoại table
                        $set_Table = "SELECT hoadonct.* , table.soBan
                        FROM  hoadonct 
                        INNER JOIN  `table` ON hoadonct.Id_Table = table.Id_Table
                        order by hoadonct.Id_Table ASC";
                        $resultl = mysqli_query($Cons, $set_Table);
                        $T = mysqli_fetch_assoc($resultl);
                        

                        // khóa ngoại giam gia
                        $set_Table = "SELECT hoadonct.* , giamgia.giam
                        
                        FROM  hoadonct
                        INNER JOIN  giamgia ON hoadonct.id_giamGia = giamgia.giam
                        order by hoadonct.id_giamGia ASC";
                        $resultlt = mysqli_query($Cons, $set_Table);
                        $G = mysqli_fetch_assoc($resultlt);

                        // echo $G['giam'];
                        //duyet qua result va in ra
                        while($r = mysqli_fetch_assoc($resultt) ){
                            // echo $r['Id_hoaDonCT'];
                            // echo '</br>'. $r['Id_Table'];
                            // $T = mysqli_fetch_assoc($resultl); 
                            // while($T = mysqli_fetch_assoc($resultl) ){
                            //     // echo $T['soBan'];
                            //     while($G = mysqli_fetch_assoc($resultlt) ){

                            ?>
                                    <tr>
                                    <td><?php echo $r['time_Data']?></td>
                                    <td>Tầng <?php echo $r['Id_Table']?></td>
                                    <td><?php echo $r['time_in']?></td>
                                    <td><?php echo $r['time_out']?></td>
                                    <td><?php echo $r['id_giamGia']?>% </td>
                                    <td><?php echo $r['tongTien']?> </td>

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
            <!-- <div class="select-menu">
                <div class="select-btn">
                    <span class="sBtn-text">Thống Kê Tất Cả</span>
                    <i class="fas fa-sort-down"></i>
                </div>
                <ul class="options">
                    <li class="option">
                        <span class="option-text">Theo ngày</span>
                    </li>
                    <li class="option">
                        <span class="option-text">Theo Tháng</span>
                    </li>
                    <li class="option">
                        <span class="option-text">Theo Năm</span>
                    </li>
                </ul>


            </div> -->
        </main>
    </div>
    <script src="/duantotnghiep/Them/menu.js"></script>
</body>

</html>
