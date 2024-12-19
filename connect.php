<?php

// kết nối csdl
$server = "localhost";
$user = "root";
$pass = "";
$database = "CSDL_PHONE";
// Kết nối 4 cái trên lại

$conn = new mysqLi($server,$user,$pass,$database);

if ($conn){
    mysqLi_query($conn,"SET NAMES 'utf8' ");
  //  echo "Kết nối được csdl";
} else echo "Chưa kết nối được CSDL";

?>