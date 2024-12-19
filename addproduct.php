<?php
include "connect.php";

if (isset($_POST["btn"])){
    $id = "";
    $ten = $_POST['ten'];
    // Lấy tên hình ảnhảnh
    $img = $_FILES['image']['name'];
    // Lấy nguồn hình ảnh
    $add_img = $_FILES['image']['tmp_name'];
    //
    $gia = $_POST['gia'];
    $bh = $_POST['baohanh'];

    $sql = "insert into sanpham values('$id','$ten','$img','$gia','$bh')";

    if (mysqLi_query($conn,$sql)){
        echo "Thêm sản phẩm mới thành công";
        move_uploaded_file($add_img,'img/product/'.$img);
    } else echo "Chưa thêm được";
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            margin:20px;
        }
    </style>
</head>
<body>
    <form action="addproduct.php" method="post" enctype="multipart/form-data" >
    <label>Nhập tên sản phẩm</label>
    <input type="text" name="ten"><br>
    <label>Chọn hình ảnh</label>
    <input type="file" name="image"><br>
    <label>Nhập giá</label>
    <input type="text" name="gia"><br>
    <label>Nhập thời gian bảo hành</label>
    <input type="text" name="baohanh"><br>

    <button id="submit" name="btn" >Gửi</button>


    </form>
</body>
</html>