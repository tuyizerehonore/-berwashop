<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "berwashop");

if (isset($_SESSION['ShopkeeperId'])) {
    header("Location: ../index.php");
}

if (isset($_POST['signup'])) {
    $sname = $_POST['sname'];
    $pass = $_POST['pswrd'];

    $signup = mysqli_query($conn, "INSERT INTO shopkeeper VALUES('', '$sname','$pass')");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="../css/signup.css">
    <style>
        <style>
        body {
            font-family: system-ui;
        }

        .container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 30px;
            width: 350px;
            box-shadow: 0px 0px 1px #aaa;
            text-align: center;
        }

        .div1 {
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 10px;

        }

        .div1 label {
            font-family: system-ui;
            font-weight: bold;
        }

        .div1 input {
            padding: 10px;
            width: 325px;
            outline: none;
            border-radius: 5px;
            border: 1px solid #aaa;
            font-size: 15px;
        }

        .div2 {
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 10px;

        }

        .div2 label {
            font-family: system-ui;
            font-weight: bold;
        }

        .div2 input {
            border: 1px solid #aaa;
            padding: 10px;
            width: 325px;
            outline: none;
            border-radius: 5px;
            font-size: 15px;
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
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <h1>Berwa shop </h1>
            <p>Sign up your account</p>
            <div class="div1">
                <label>Username</label>
                <input type="text" placeholder="User name" name="sname">
            </div>
            <div class="div2">
                <label>Password</label>
                <input type="password" placeholder="Password" name="pswrd">
            </div>
            <div class="submit">
                <input type="submit" value="Sign up" name='signup' class="login">
            </div>
            <div class="link">
                <p>Already have an account? <a href="./login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>

</html>