
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

<?php 
    include "connect.php";

    $this_id = $_GET['this_id'];

    $sql ="SELECT * FROM sanpham WHERE id = ".$this_id;
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query); ## dữ liệu thành array
    
    ## Khi nhấn nút edit
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $warranty  = $_POST['warranty'];
        $img = $_FILES['img']['name']; ## Gọi tên hình ảnh để đăng lên database
        $img_tmp = $_FILES['img']['tmp_name'];

        ## câu lệnh sửa sản phẩm
        $sql = "UPDATE sanpham SET name = '$name', image = '$img', price = '$price', warranty = '$warranty'
        WHERE id = ".$this_id ;
        mysqli_query($conn, $sql);
        
        move_uploaded_file($img_tmp,'img/product/'.$img);

        header('location: product.php');
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
<div class="title"><h1>SẢN PHẨM: <?php echo $row['name'] ?></h1></div>
<div class="container">
  <div class="row">
    <div class="col">

    </div>

    <div class="col">
    <form  method="post" enctype="multipart/form-data">
    <div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
  <input name="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
    <span><img src="img/product/<?php echo $row['image']?>" alt="" width="30" height="40"></span>
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
<button type="submit" name="submit"  class="btn btn-secondary btn-sm mb-3" >Sửa</button>

</form>
<a href="product.php"><button class="btn btn-secondary btn-sm mb-3" >Về trang Product</button></a>
    </div>
    <div class="col">

    </div>
  </div>
</div>

    
</body>
</html>







<!-- <form  method="post" enctype="multipart/form-data">
    <p>NAME: </p>
    <input type="text" name="name" value=" <?php echo $row['name'] ?>"required>
    <p>IMAGE</p>
    <span><img src="img/product/<?php echo $row['image']?>" alt="" width="30" height="40"></span>
    <input type="file" name="img" >
    <p>PRICE</p>
    <input type="text" name="price" value="<?php echo $row['price'] ?>" required>
    <p>WARRANTY</p>
    <input type="text" name="warranty" value="<?php echo $row['warranty'] ?>" required>
    <input type="submit" value="Gửi" name="submit" >
</form> -->