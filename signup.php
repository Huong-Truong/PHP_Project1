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
<div class="title"><h1>Đăng Ký</h1></div>
<div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col">
    <form action="signup.php" method="post" >
  <div class="mb-3" >
    <label for="exampleInputEmail1" class="form-label">username</label>
    <input type="input" class="form-control"  name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" name="btn" class="btn btn-secondary btn-sm">Đăng Ký</button>
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

    if(isset($_POST['btn'])){
        echo "xin chào";
        $id ="";
        $name = $_POST['username'];
        $password = $_POST['password'];
        $level = 2;

        $sql = "INSERT INTO thanhvien VALUES  ('$id', '$name', '$password', '$level')";

        if(mysqli_query($conn, $sql)){
            header('location: login.php');
        }


    }

?>

<!-- <form action="signup.php" method="post">
<label for="">username:</label>
<input type="text" name="username">
<label for="">password</label>
<input type="password" name="password">
<button type="submit" name="btn">Đăng ký</button>
</form> -->