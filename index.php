<?php
session_start();

$username = "test";
$password = "test";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    if ($input_username === $username && $input_password === $password) {
        $_SESSION['loggedin'] = true; 
        header("Location: upload.php"); 
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            display: flex;
            justify-content: center; 
            align-items: center; 
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #6a11cb, #2575fc); 
        }

        /* Container styles */
        .container {
            background-color: #fff;
            color: #333;
            max-width: 400px;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 100%; 
            box-sizing: border-box; 
        }

        h2 {
            color: #2575fc;
            margin-bottom: 20px;
            font-size: 24px; 
        }

        input[type="text"],
        input[type="password"] {
            padding: 12px; 
            width: calc(100% - 24px); 
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            background-color: #f7f7f7;
            font-size: 16px;
            transition: border-color 0.3s ease;
            box-sizing: border-box; 
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #2575fc;
        }

        .submit-btn {
            width: 50%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: #2575fc;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #6a11cb;
            transform: translateY(-2px);
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login" class="submit-btn">
            <?php if (isset($error)) { echo "<div class='error'>$error</div>"; } ?>
        </form>
    </div>
</body>
</html>
