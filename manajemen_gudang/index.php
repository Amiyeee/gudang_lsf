<?php
require_once 'db_connect.php';
session_start();
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = Database::connect(); // Menggunakan koneksi dari db_connect.php

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true); // Keamanan tambahan
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PT. LINTECH SEASIDE FACILITY</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(45deg, #007bff, rgb(28, 77, 151), #87CEEB);
            background-size: 300% 300%;
            animation: gradientBG 8s infinite alternate;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
        }

        /* Animasi background agar berubah-ubah */
        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .login-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
            position: relative;
            z-index: 1;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
        }

        /* Style Input dengan Label Floating */
        .input-container {
            position: relative;
            margin-bottom: 20px;
        }

        .input-container input {
            width: 100%;
            padding: 12px;
            padding-left: 40px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            font-size: 14px;
        }

        /* Label tetap di tempat tapi menghilang saat input diisi */
        .input-container label {
            position: absolute;
            top: 50%;
            left: 40px;
            transform: translateY(-50%);
            font-size: 14px;
            color: #666;
            transition: 0.3s;
            pointer-events: none;
        }

        /* Sembunyikan label saat input diisi atau difokuskan */
        .input-container input:focus+label,
        .input-container input:not(:placeholder-shown)+label {
            opacity: 0;
            visibility: hidden;
        }

        /* Icon di dalam input */
        .input-container .icon {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #666;
        }

        .login-button {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: 0.3s;
        }

        .login-button:hover {
            background: linear-gradient(135deg, #0056b3, #003f7f);
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="logo">PT. LINTECH SEASIDE FACILITY</div>
        <form action="" method="POST">
            <div class="input-container">
                <i class="fas fa-user icon"></i>
                <input type="text" name="username" placeholder=" " required>
                <label>Username</label>
            </div>
            <div class="input-container">
                <i class="fas fa-lock icon"></i>
                <input type="password" name="password" placeholder=" " required>
                <label>Password</label>
            </div>
            <button type="submit" class="login-button">Log In</button>
        </form>
    </div>
</body>

</html>