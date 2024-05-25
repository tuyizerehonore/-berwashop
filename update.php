<?php

include_once "./auth/config.php";

$code = $_GET['ProductCode'];

if (!isset($code)) {
    header("Location: ./products.php");
}

$select = mysqli_query($conn, "SELECT * FROM product WHERE `ProductCode` = '{$code}'");
$fetch = mysqli_fetch_assoc($select);

$form = '
<div class="container">
<form action="" method="POST">
    <h1>Berwa shop </h1>
    <p>Add your products</p>
    <div class="div1">
        <label>Product Code</label>
        <input type="text" name="code" placeholder="ProductCode" value="' . $fetch['ProductCode'] . '" disabled>
    </div>
    <div class="div2">
        <label>Product name</label>
        <input type="text" placeholder="Product name" name="pname" value="' . $fetch['ProductName'] . '">
    </div>

    <div class="submit">
        <input type="submit" value="Update product" name="update" class="login">
    </div>
    <div class="link">
        <p><a href="./products.php">Back to products</a></p>
    </div>
</form>
</div>
';

if (isset($_POST['update'])) {
    $pname = $_POST['pname'];
    $update = mysqli_query($conn, "UPDATE product SET `ProductName` = '{$pname}' WHERE `ProductCode` = $code");
    if ($update) {
        echo "<script>Item updated succesfully</script>";
        header("Location: ./products.php");
    }
} else {
    echo "<script>Item not updated</script>";
}
?>

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="./css/addproduct.css">
</head>

<body>
    <?php echo $form ?>
</body>

</html>