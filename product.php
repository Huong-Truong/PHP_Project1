<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width:100px;
            height:100px;
        }
    </style>
</head>
<body>
 

<thead>
    <tr>
        <th>ID</th>
        <th>----------Tên Sản Phẩm</th>
        <th>----------Hình Ảnh</th>
        <th>----------Giá</th>
        <th>----------Bào Hành</th>
    </tr>
</thead>

<tbody>
        <?php
            $sql = "select * from sanpham";
            $result = mysqLi_query($conn,$sql);
           // mysqLi_query_

           while($row = mysqLi_fetch_array($result)){  
        ?>
            <tr>
                <br>
                <td><?php echo $row["id"] ?></td><t></t>
                <td><?php echo "-------".$row["ten"]."-------" ?></td>
                <td><img src="img/product/<?php echo $row["hinhanh"] ?>" alt="lỗi ảnh" ></td>
                <td><?php echo "-------".$row["gia"] ?></td>
                <td><?php echo "-------".$row["baohanh"] ?></td>
                <span><a href="deleteproduct.php?this_id=<?php echo $row["id"] ?>" >Xóa</a></span>
            </tr>
        <?php   } ?>
</tbody>
    
</body>
</html>