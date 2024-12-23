
<?php
    session_start();
    if(!isset($_SESSION['mySession'])){
        header('location: login.php');
    }else{
      if($_SESSION['mySession'] != 'admin'){
        header('location: index.php');
      }
    }

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
.title { display: flex;
justify-content: center; 
align-items: center; 
padding: 20px;
 }
</style>
<body>
<div class="title"><h1>Thêm sản phẩm</h1></div>
<div class="container">
  <div class="row">
    <div class="col">

    </div>

    <div class="col">
    <form action="add-product.php" method="post" enctype="multipart/form-data">
    <div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
  <input name="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <input name="img" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
  <input name="price" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Warranty</span>
  <input name="warranty" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<button type="submit" name="btn"  class="btn btn-secondary btn-sm mb-3" >Thêm</button>

</form>
<a href="product.php"><button class="btn btn-secondary btn-sm mb-3" >Về trang Product</button></a>
    </div>
    <div class="col">

    </div>
  </div>
</div>

    
</body>
</html>








<?php 
    include "connect.php";
    if(isset($_POST["btn"])){
        $name= $_POST['name'];
        $img= $_FILES['img']['name']; // chỉ lấy tên hình ảnh
        // lấy đường dẫn của ảnh
        $img_tmp_name = $_FILES['img']['tmp_name'];
        $price= $_POST['price'];
        $warranty= $_POST['warranty'];
   
        $sql = "INSERT INTO sanpham (name,image,price,warranty)
        VALUES ('$name', '$img', '$price', '$warranty')";

        mysqli_query($conn, $sql);
    
       move_uploaded_file($img_tmp_name, "img/product/".$img);

    }
?>


<!-- <form action="add-product.php" method="post" enctype="multipart/form-data">
    <p>NAME: </p>
    <input type="text" name="name" required>
    <p>IMAGE</p>
    <input type="file" name="img" required>
    <p>PRICE</p>
    <input type="text" name="price" required>
    <p>WARRANTY</p>
    <input type="text" name="warranty" required>
    <input type="submit" value="Gửi" name="submit" >
</form> -->