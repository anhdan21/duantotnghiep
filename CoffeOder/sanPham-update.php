 <?php

include "API.php";
$id = $_GET['Id_sanPham'];
$Con = mysqli_connect("localhost", "root","" ,"coffeoder");
$Edit = "SELECT * FROM sanpham WHERE Id_sanPham= $id";

$result = mysqli_query($Con,$Edit);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Sản phẩm</title>
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
    </style>
</head>

<body>
    <form action="sanPham-update-post.php" method="POST">
        <h3>Update Sản phẩm</h3>

        <input type="hidden" value="<?php echo $row['Id_sanPham']; ?>" name="sid" >ID :<?php echo $row['Id_sanPham']; ?></input> <br><br>
        
        <label>Id danh mục: <input type="text" name="id_danhMuc" value="<?php echo $row['id_danhMuc']; ?>"></label><br>
        <label>Tên sản phẩm: <input type="text" name="ten_sp" value="<?php echo $row['ten_sp']; ?>"></label><br>
        <label>Anh sản phẩm: <input type="text" name="anhSanPham" value="<?php echo $row['anhSanPham']; ?>"></label><br>
        <label>Giá: <input type="text" name="giaSanPham" value="<?php echo $row['giaSanPham']; ?>"></label><br>
        <label>Giới thiêu: <input type="text" name="gioiThieu" value="<?php echo $row['gioiThieu']; ?>"></label><br>
        <label>Kích cỡ: <input type="text" name="size" value="<?php echo $row['size']; ?>"></label><br>
        <label>Ghi chú: <input type="text" name="note" value="<?php echo $row['note']; ?>"></label><br>

        <button type="submit" name="btnSave">Save Update</button>
        <button type="submit" name="btnCancel">Cancel</button>
    </form>

</body>

</html>