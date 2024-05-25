<?php
session_start();

if ($_SESSION['ShopkeeperId']) {
    session_destroy();
    session_unset();
    header("Location: ./login.php");
}else {
    header("Location: ./login.php");
}