

<?php 
    ## Xóa session
    session_start();
    if(!isset($_SESSION['mySession'])){
        header('location: login.php');
    }else{
        unset($_SESSION['mySession']);
        header('location: login.php');
    }

?>