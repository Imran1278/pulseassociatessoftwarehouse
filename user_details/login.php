<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' LIMIT 1");

    if (mysqli_num_rows($query) == 1) {

        $user = mysqli_fetch_assoc($query);

        if (password_verify($password, $user['password'])) {

            // Set session
            $_SESSION['user']  = $user['name'];
            $_SESSION['email'] = $user['email'];

            // Show popup and redirect
            echo "<script>
                    alert('Login Successful!');
                    window.location.href = '../index.php';
                  </script>";
            exit;

        } else {
            echo "<script>
                    alert('Incorrect password');
                    window.location.href='login.php';
                  </script>";
        }

    } else {
        echo "<script>
                alert('Email not found');
                window.location.href='login.php';
              </script>";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pulse Associates | Login</title>
    <!-- Favicon -->
    <link rel="icon" href="../Pics/logo.png">
    <!-- Favicon -->

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #4c6fff, #8f94fb);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background: #ffffff;
            width: 100%;
            max-width: 380px;
            padding: 30px 30px 35px;
            border-radius: 18px;
            box-shadow: 0 18px 35px rgba(0, 0, 0, 0.18);
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .title h2 {
            font-size: 26px;
            color: #222;
            margin-bottom: 5px;
        }

        .title p {
            font-size: 13px;
            color: #777;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            color: #444;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.2s ease;
        }

        .form-group input:focus {
            border-color: #4c6fff;
            box-shadow: 0 0 0 2px rgba(76, 111, 255, 0.15);
        }

        .forgot {
            text-align: right;
            font-size: 12px;
            margin-top: -8px;
            margin-bottom: 10px;
        }

        .forgot a {
            color: #4c6fff;
            text-decoration: none;
        }

        .forgot a:hover {
            text-decoration: underline;
        }

        .btn-submit {
            width: 100%;
            border: none;
            padding: 11px;
            background: linear-gradient(135deg, #4c6fff, #2f51ff);
            color: #fff;
            font-size: 15px;
            border-radius: 999px;
            cursor: pointer;
            font-weight: 600;
            letter-spacing: 0.3px;
            transition: 0.2s ease;
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(47, 81, 255, 0.35);
        }

        .bottom-text {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 12px;
        }

        .bottom-text a {
            color: #4c6fff;
            text-decoration: none;
            font-weight: 600;
        }

        .bottom-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="title">
            <h2>Welcome Back</h2>
            <p>Login to continue</p>
        </div>

        <form action="#" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" placeholder="you@example.com" required />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required />
            </div>

            <div class="forgot">
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="btn-submit">Login</button>

            <div class="bottom-text">
                Don't have an account?
                <a href="../user_details/register.php">Register here</a>
            </div>
        </form>
    </div>

</body>
</html>
