
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
 }
a{
    color: black;
    text-decoration: none;
 }
 .col-sm-4, .col-sm-2{
    padding: 20px;
 }
 .col-sm-6{
    padding: 20px;
 }
</style>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-6"><h1><a href="product.php">TRANG CHỦ </a></div>
    <div class="col-sm-4">
    <form action="" method="POST">
    <div class="input-group input-group-sm mb-3">
    <input name="noidung" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    <button type="submit" name="btn" class="btn btn-secondary btn-lg" >tìm kiếm</button>
    </div>
   
 </form>
    </div>
    <div class="col-sm-2">
        <a href="logout.php">
        <button type="submit" class="btn btn-secondary btn-sm" >Đăng Xuất</button>
        </a>
  </div>
  <div class="row">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Warranty</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  
  <?php 
    
    include "connect.php";
   
    if(isset($_POST['noidung'])){
        $noidung = $_POST['noidung'];
        $sql = "SELECT * FROM sanpham WHERE name LIKE '%$noidung%'";
    }else{
        $sql = "SELECT * FROM sanpham";
    }
    
    
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
    ?>

<tbody>    
     <tr>
            <th scope="row"><?php echo $row['id'] ?></th>
            <td><a href="binhluan.php?this_id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></td>
            <td> <img src="img/product/<?php echo $row['image']?>" alt="" width="50" height="60"></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['warranty'] ?></td>
            <td><a href="delete.php?this_id=<?php echo $row['id']?>"> <button class="btn btn-secondary btn-sm" >Xóa</button></a>
            <span><a href="edit.php?this_id=<?php echo $row['id']?>"><button class="btn btn-secondary btn-sm" >Sửa</button></a></span></td>
    </tr>
<tbody>
<?php } ?>
  </tbody>
</table>
  </div>
</div>
<span><a href="add-product.php"><button class="btn btn-secondary btn-sm" >Thêm SP</button></a></span>
</body>
</html>



