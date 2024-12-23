<?php
    session_start();
    if(!isset($_SESSION['mySession'])){
        header('location: login.php');
    }
    ?>

<?php
    include "connect.php";

    $this_id = $_GET['this_id'];

    $getname = mysqli_query($conn, "SELECT name FROM sanpham WHERE id = '$this_id'");
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
.container {
    padding: 20px;
}
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
 .form{
    padding: 10px;
 }
</style>
<body>
<div class="container text-center">
  <div class="row">
    <div class="col">
    <h1><?php  echo mysqli_fetch_array($getname)['name']; ?> </h1> 
    </div>
    <div class="col">
    <?php
    $sql = "SELECT username,noidung FROM binhluan  WHERE id = '$this_id' 
    ORDER BY id_cmt DESC";

    $result = (mysqli_query($conn,$sql));

    while($row = mysqli_fetch_array($result)){
    ?>  
    
    <ul class="list-group">
    <li class="list-group-item">    <?php echo $row['username'] ?>
                                    <?php echo $row['noidung'] ?>
    </li>
    </ul>
    <?php } ?>

    <form class="form" action="add_binhluan.php?this_id=<?php echo $this_id?>" method = "POST" enctype = "multipart/form-data">
        <input type="text" name="noidung">
        <button type="submit" class="btn btn-secondary btn-sm" >Thêm bình luận</button>
      
</form>
<a href="index.php">
        <button class="btn btn-secondary btn-sm" >Về Trang Chủ</button>
        </a>
    </div>
  </div>
</body>
</html>










