<?php

include_once "./auth/config.php";

$code = $_GET['ProductCode'];


$select = mysqli_query($conn, "SELECT * FROM product WHERE `ProductCode` = $code");
$fetch = mysqli_fetch_assoc($select);

$form = '
<div class="container">
        <form action="" method="POST">
            <h1>Berwa shop</h1>
            <p>Import your products to the store</p>
            <div class="div1">
                <label>Product Id</label>
                <input type="text" placeholder="Product Id" name="pid" value="' . $fetch['ProductCode'] . '" disabled>
            </div>
            <div class="div2">
                <label>Product name</label>
                <input type="text" placeholder="Product name" name="pname" value="' . $fetch['ProductName'] . '" disabled>
            </div>
            <div class="div2">
                <label>Date</label>
                <input type="date" placeholder="Date" name="date">
            </div>
            <div class="div2">
                <label>Quantity</label>
                <input type="text" placeholder="Quantity" name="quant">
            </div>
            <div class="div2">
                <label>Unit price</label>
                <input type="text" placeholder="Unit price" name="unit">
            </div>

            <div class="submit">
                <input type="submit" value="Import product" name="import" class="login">
            </div>
            <div class="link">
                <p><a href="./productin.php">Back to productin</a></p>
            </div>
        </form>
    </div>
';

if (isset($_POST['import'])) {
    $date = $_POST['date'];
    $quantity = $_POST['quant'];
    $unit = $_POST['unit'];
    $total = $quantity * $unit;

    $import = mysqli_query($conn, "INSERT INTO productin VALUES('$date','$quantity','$unit','$total','$code')");
    if ($import) {
        echo "Imported successfully";
    } else {
        echo "Not imported";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: system-ui;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h1 {
            text-align: center;
        }

        p {
            text-align: center;
            margin-top: 10px;
        }

        .div1 {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="date"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .submit {
            text-align: center;
            margin-top: 20px;
        }

        .login {
            padding: 15px;
            width: 100%;
            font-weight: bold;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background: orange;
        }

        .submit {
            display: flex;
            align-items: start;
        }

        .link a {
            text-decoration: none;
            color: orange;
        }
    </style>
</head>

<body>
    <?php echo $form ?>
</body>

</html>