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
a{
    color: white;
    text-decoration: none;
 }
</style>
<body>
<div class="title"><h1>Đăng nhập</h1></div>
<div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col">
    <form action="login.php" method="post" >
  <div class="mb-3" >
    <label for="exampleInputEmail1" class="form-label">username</label>
    <input type="input" class="form-control"  name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>

  <button type="submit" name="btn" class="btn btn-secondary btn-sm">Đăng Nhập</button>
  <button type="submit" name="dangky" class="btn btn-secondary btn-sm"><a href="signup.php">Đăng ký</a></button>
</form>
    </div>
    <div class="col">
    </div>
  </div>
</div>
</body>
</html>



<?php 
 include "connect.php";
 session_start();
    ## nếu tồn tại session rồi thì chuyển qua index luôn
    if(isset($_SESSION['mySession'])){
        header('location: index.php');
    }

 if(isset($_POST['btn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM thanhvien WHERE username ='$username' AND password ='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqLi_num_rows($result) == 1){

      if( $username == 'admin'){
        $_SESSION['mySession'] = $username;
        header('location: product.php');
        }else{
          $_SESSION['mySession'] = $username;
          header('location: index.php');
        }

      }else{
        echo "Sai tài khoản hoặc mật khẩu";
      }
    
 }
?>

