
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
session_start();

    include "connect.php";
   $id = $_GET['this_id'];

    $nd = $_POST['noidung'];
    $name = $_SESSION['mySession'];

    $sql = " INSERT INTO binhluan(id_cmt, noidung, id, username) VALUES (NULL,'$nd','$id','$name')";
    mysqli_query($conn, $sql);

    header("location:binhluan.php?this_id=$id"); ## phải là ngoặc kép

?> 

