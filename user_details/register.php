<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $city     = $_POST['city'];
    $gender   = $_POST['gender'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    // Check password match
    if ($password !== $confirm) {
        echo "<script>alert('Passwords do not match'); window.history.back();</script>";
        exit;
    }

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Email already registered'); window.history.back();</script>";
        exit;
    }

    // Hash password
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $sql = "INSERT INTO users (name, email, phone, city, gender, password)
            VALUES ('$name', '$email', '$phone', '$city', '$gender', '$hashed')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registration successful'); window.location='./login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pulse Associates | Register</title>
    <!-- Favicon -->
    <link rel="icon" href="../Pics/logo.png">
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
            max-width: 420px;
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

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.2s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #4c6fff;
            box-shadow: 0 0 0 2px rgba(76, 111, 255, 0.15);
        }

        .inline-group {
            display: flex;
            gap: 10px;
        }

        .inline-group .form-group {
            flex: 1;
        }

        .gender-options {
            display: flex;
            gap: 12px;
            font-size: 13px;
            color: #444;
        }

        .gender-options label {
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .gender-options input {
            accent-color: #4c6fff;
            cursor: pointer;
        }

        .terms {
            font-size: 12px;
            color: #666;
            margin: 4px 0 10px;
        }

        .terms input {
            accent-color: #4c6fff;
            margin-right: 6px;
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

        .btn-submit:active {
            transform: translateY(0);
            box-shadow: none;
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

        @media (max-width: 480px) {
            .container {
                margin: 0 15px;
                padding: 22px 18px 26px;
            }

            .title h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">
            <h2>Create Account</h2>
            <p>Register to continue to your dashboard</p>
        </div>

        <form action="#" method="post">
            <div class="form-group">
                <label for="name">Full name</label>
                <input type="text" id="name" name="name" placeholder="e.g. Ali Khan" required />
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" placeholder="you@example.com" required />
            </div>

            <div class="inline-group">
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="tel" id="phone" name="phone" placeholder="03xx-xxxxxxx" required />
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <select id="city" name="city" required>
                        <option value="">Select city</option>
                        <option>Sargodha</option>
                        <option>Lahore</option>
                        <option>Islamabad</option>
                        <option>Karachi</option>
                        <option>Faisalabad</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Gender</label>
                <div class="gender-options">
                    <label><input type="radio" name="gender" value="male" required /> Male</label>
                    <label><input type="radio" name="gender" value="female" /> Female</label>
                    <label><input type="radio" name="gender" value="other" /> Other</label>
                </div>
            </div>

            <div class="inline-group">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Create a password"
                        required
                    />
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm</label>
                    <input
                        type="password"
                        id="confirm-password"
                        name="confirm_password"
                        placeholder="Re-enter"
                        required
                    />
                </div>
            </div>

            <div class="terms">
                <label>
                    <input type="checkbox" required />
                    I agree to the Terms & Conditions.
                </label>
            </div>

            <button type="submit" class="btn-submit">Create account</button>

            <div class="bottom-text">
                Already have an account?
                <a href="../user_details/login.php">Login here</a>
            </div>
        </form>
    </div>
</body>
</html>