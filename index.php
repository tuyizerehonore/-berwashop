<?php 
    include_once "./auth/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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

        .container{
            width: 100%;
            height: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 50px;
        }

        .managerinfo{
            width: 500px;
            height: 500px;
            box-shadow: 0px 0px 3px #aaa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 10px
        }

        .cards{
            width: 50%;
            display: grid;
            grid-template-columns: repeat(2,200px);
            grid-gap: 30px;
            align-items: center;
            justify-content: center;
        }

        .card{
            width: 200px;
            height: 200px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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
    <section class="container">
        <div class="managerinfo">
            <h1>Tuyizere Honore</h1>
            <p>Role: Administrator</p>
            <p>Stock-Name: Berwa-Shop</p>
            <p>Joined-at: 3/3/2023</p>
        </div>
        <div class="cards">
            <div class="card">
                <h2>Total product</h2>
                <?php 
                $select = mysqli_query($conn,"SELECT * FROM product");
                $numberpro = mysqli_num_rows($select);
                ?>
                <h3><?php echo $numberpro?></h3>
            </div>
            <div class="card">
            <h2>Total imports</h2>
                <?php 
                $select = mysqli_query($conn,"SELECT * FROM productin");
                $numberimpo = mysqli_num_rows($select);
                ?>
                <h3><?php echo $numberimpo?></h3>
            </div>
            <div class="card">
            <h2>Total Exports</h2>
                <?php 
                $select = mysqli_query($conn,"SELECT * FROM productout");
                $numberexpo = mysqli_num_rows($select);
                ?>
                <h3><?php echo $numberexpo ?></h3>
            </div>
            <div class="card">
            <h2>Total Stock</h2>
                <?php 
                $sum = $numberpro + $numberimpo+ $numberexpo;
                ?>
                <h3><?php echo $sum ?></h3>
            </div>
        </div>
    </section>


</body>

</html>