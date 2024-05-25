<?php
include_once "./auth/config.php";

$select = mysqli_query($conn, "SELECT * FROM product");
$tbody = '';
$num_rows = '';
$a = 1;

if ($select) {
    $num_rows = mysqli_num_rows($select);

    if ($num_rows > 0) {
        while ($fetch = mysqli_fetch_assoc($select)) {
            $tbody .= "<tr>
            <td>" . $a++ . "</td>
            <td>" . $fetch["ProductName"] . "</td>
            <td class='text-align:center;'>
            <a href='update.php?ProductCode=" . $fetch['ProductCode'] . "' class='update'>Update</a>
            <a href='delete.php?ProductCode=" . $fetch['ProductCode'] . "' class='delete'>Delete</a</a>
            <a href='import.php?ProductCode=" . $fetch['ProductCode'] . "' class='import'>Import</a</a>
            </td>
        </tr></br>";
        }
    } else {
        $tbody .= '<tr><td colspan="3" style="text-align:center; font-weight:bold;">No Products found</td></tr>';
    }
} else {
    echo "Not selected";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/products.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: system-ui;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-inner {
            width: 60rem;
            margin: 0 auto;
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            background: orange;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .logo-text {
            font-weight: 600;
            color: #fff;
            margin-left: 0.5rem;
        }

        .primary-nav a {
            color: #4b5563;
            padding: 0.75rem 1rem;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .primary-nav a:hover {
            background-color: #edf2f7;
            color: #1f2937;
        }

        .secondary-nav a {
            background: orange;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            text-decoration: none;
        }

        .container {
            width: 100%;
            padding: 2rem;
        }

        .admin-info {
            background-color: #ffffff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            border-radius: 0.5rem;
            margin-top: 2rem;
        }

        .admin-info h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .admin-info p {
            font-size: 1rem;
            margin-bottom: 1rem;
            color: #555;
        }

        .card {
            background-color: #ffffff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
        }

        .card h3 {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .card p {
            font-size: 1rem;
            margin-bottom: 1rem;
            color: #555;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        

        table {
            width: 100%;
            /* border-collapse: collapse; */
            margin-top: 2rem;
        }

        th,
        td {
            border-bottom: 1px solid #dddddd2f;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #aaaaaa48;
        }

        .button {
            display: inline-block;
            background-color: dodgerblue;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 1rem;
        }

        .button:hover {
            text-decoration: none;
            color: #fff
        }

        .head {
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: space-between;
        }

        .update {
            padding: 10px 20px;
            background: gray;
            border-radius: 10px;
            color: #fff;
        }

        .delete {
            padding: 10px 20px;
            background: orange;
            border-radius: 10px;
            color: #fff;
        }

        .import {
            padding: 10px 20px;
            background: skyblue;
            border-radius: 10px;
            color: #fff;
        }

        .delete:hover,
        .update:hover,
        .import:hover {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="navbar-inner">
            <div class="logo">
                <span class="logo-text">Berwa Shop</span>
            </div>
            <div class="primary-nav">
                <a href="./index.php">Home</a>
                <a href="./products.php">Products</a>
                <a href="./productin.php">Product In</a>
                <a href="./productout.php">Product Out</a>
            </div>
            <div class="secondary-nav">
                <a href="./auth/logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="head">
            <h2>Products</h2>
            <a href="./addproduct.php" class="btn btn-info">Add New Product</a>

        </div>

        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $tbody ?>
            </tbody>
        </table>
    </div>

</body>

</html>