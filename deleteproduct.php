<?php
include "connect.php";

$this_id = $_GET['this_id'];

$sql = "delete from sanpham where id='$this_id'";
if (mysqLi_query($conn,$sql)){
 echo "Xóa thành công";
 header("location:product.php");
}



?>