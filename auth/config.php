<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "berwashop");
if (!$conn == true) {
    echo " Not connected ";
}


if (!$_SESSION['ShopkeeperId']) {
    header("Location: ./auth/login.php");
}

?>