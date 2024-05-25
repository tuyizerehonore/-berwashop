<?php
$conn = mysqli_connect("localhost", "root", "", "berwashop");
$code = $_GET['ProductCode'];

if (!isset($id)) {
    header("Location: ./products.php");
}

if (isset($_GET['ProductCode'])) {
    $delete = mysqli_query($conn, "DELETE FROM product WHERE `ProductCode` = $code");
    if ($delete) {
        echo "<script>Item deleted succesfully</script>";
        header("Location: ./products.php");
    }
} else {
    echo "<script>Item not deleted</script>";
}