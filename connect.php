<?php
    $server = "localhost";
    $user = "root";
    $passwd= "";
    $database ="cosodulieu";

    $conn = new mysqLi($server, $user, $passwd,$database);

    if($conn){
        mysqli_query($conn,"SET NAMES 'utf8'");
    }else{
        echo "Connect k thành công";
    }

?>
