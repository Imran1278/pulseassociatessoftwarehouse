<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pulse Associates | Checkout</title>
    <link rel="stylesheet" href="../Project1/styles/style.css">
    <link rel="icon" href="../Pics/logo.png" />

<!-- ================= CSS START ================= -->
<style>
    :root {
        --primary: #2563eb;
        --primary-dark: #1e40af;
        --secondary: #facc15;
        --bg-main: #f1f5f9;
        --card-bg: #ffffff;
        --text-dark: #1e293b;
        --text-light: #64748b;
        --border: #e2e8f0;
    }

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: "Segoe UI", sans-serif;
        background: linear-gradient(135deg, #e0f2fe, #f8fafc);
        color: var(--text-dark);
    }

    /* ================= HEADER ================= */
    header {
        background: linear-gradient(90deg, var(--primary), var(--primary-dark));
        color: #fff;
        padding: 20px 10%;
        font-size: 1.4rem;
        font-weight: 800;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    /* ================= LAYOUT ================= */
    .container {
        max-width: 1200px;
        margin: 60px auto;
        padding: 20px;
    }

    .main-title {
        text-align: center;
        font-size: 2.8rem;
        font-weight: 900;
        margin-bottom: 55px;
        color: var(--primary-dark);
    }

    .checkout-grid {
        display: grid;
        grid-template-columns: 1.3fr 0.7fr;
        gap: 40px;
    }

    /* ================= CARDS ================= */
    .card {
        background: var(--card-bg);
        border-radius: 22px;
        padding: 35px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        transition: 0.3s ease;
    }

    .card:hover {
        transform: translateY(-6px);
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--primary);
        border-left: 6px solid var(--primary);
        padding-left: 14px;
        margin-bottom: 25px;
    }

    /* ================= ORDER SUMMARY ================= */
    .package-summary {
        background: linear-gradient(135deg, #eff6ff, #ffffff);
    }

    .price {
        font-size: 2.2rem;
        font-weight: 900;
        color: var(--secondary);
        margin: 18px 0 25px;
    }

    .features-list {
        list-style: none;
        padding: 0;
    }

    .features-list li {
        margin-bottom: 12px;
        font-size: 0.95rem;
    }

    .features-list li::before {
        content: "✔ ";
        color: var(--primary);
        font-weight: bold;
    }

    /* ================= FORMS ================= */
    .form-group {
        margin-bottom: 18px;
    }

    label {
        font-weight: 700;
        font-size: 0.9rem;
    }

    input {
        width: 100%;
        padding: 14px;
        margin-top: 6px;
        border-radius: 12px;
        border: 1px solid var(--border);
        font-size: 0.95rem;
        transition: 0.3s;
    }

    input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
    }

    .flex-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    /* ================= PAYMENT ================= */
    .payment-section {
        background: linear-gradient(180deg, #fffbeb, #ffffff);
    }

    .payment-methods {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
        margin-bottom: 28px;
    }

    .payment-method {
        border: 2px solid var(--border);
        border-radius: 16px;
        padding: 18px;
        text-align: center;
        font-weight: 700;
        cursor: pointer;
        background: #fff;
        transition: 0.35s ease;
        position: relative;
    }

    .payment-method input {
        display: none;
    }

    .payment-method:hover {
        border-color: var(--primary);
        transform: scale(1.05);
    }

    .payment-method span {
        font-size: 1rem;
    }

    /* SELECTED PAYMENT */
    .payment-method:has(input:checked) {
        border-color: var(--primary);
        background: linear-gradient(135deg, #eff6ff, #ffffff);
        box-shadow: 0 12px 25px rgba(37, 99, 235, 0.25);
    }

    /* ================= BUTTON ================= */
    .btn-pay {
        background: linear-gradient(135deg, var(--secondary), #fde047);
        color: #1e293b;
        border: none;
        width: 100%;
        padding: 20px;
        border-radius: 16px;
        font-size: 1.2rem;
        font-weight: 900;
        cursor: pointer;
        transition: 0.3s;
        box-shadow: 0 15px 30px rgba(250, 204, 21, 0.45);
    }

    .btn-pay:hover {
        transform: scale(1.05);
    }

    /* ================= FOOTER ================= */
    footer {
        background: #0f172a;
        color: #cbd5f5;
        text-align: center;
        padding: 28px;
        margin-top: 70px;
        font-size: 0.9rem;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 900px) {
        .checkout-grid {
            grid-template-columns: 1fr;
        }
    }
    /* Auth / User Info Area */
    .user-info {
        display: flex;
        align-items: center;
        gap: 12px;
        font-family: 'Segoe UI', sans-serif;
    }

    /* Welcome Text */
    .welcome-text {
        font-size: 15px;
        color: black;
    }

    /* Common Button Style */
    .auth-btn,
    .logout-btn {
        text-decoration: none;
        padding: 8px 18px;
        border-radius: 25px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    /* Login Button */
    .login-btn {
        background: black;
        color: #fff;
    }

    .login-btn:hover {
        background: #1e7e34;
    }

    /* Register Button */
    .register-btn {
        background: black;
        color: #fff;
    }

    .register-btn:hover {
        background: #1e7e34;
    }

    /* Logout Button */
    .logout-btn {
        background: black;
        color: #fff;
    }

    .logout-btn:hover {
        background: #1e7e34;
    }
</style>
<!-- ================= CSS END ================= -->

</head>

<body>

<header>Pulse Associates
    <!-- Auth Area -->
    <div class="user-info">
                <?php if (isset($_SESSION['user'])): ?>
                    <span class="welcome-text">
                        Welcome, <strong><?php echo $_SESSION['user']; ?></strong>
                    </span>
                    <a href="./user_details/logout.php" class="logout-btn">Logout</a>
                <?php else: ?>
                    <a href="./user_details/login.php" class="auth-btn login-btn">Login</a>
                    <a href="./user_details/register.php" class="auth-btn register-btn">Register</a>
                <?php endif; ?>
            </div>
</header>

<div class="container">
    <h1 class="main-title">Complete Your Order</h1>

<form action="../process_checkout.php" method="POST">
    <input type="hidden" name="service_title" value="Software Testing & Quality Assurance">
    <input type="hidden" name="package_title" value="Basic Package">
    <input type="hidden" name="package_price" value="15,000">
    <div class="checkout-grid">

        <!-- LEFT COLUMN -->
        <div>
            <div class="card package-summary">
                <span class="section-title">Order Summary</span>
                <h3>Software Testing & Quality Assurance – Standard Package</h3>
                <div class="price">15,000 PKR</div>
                <ul class="features-list">
                    <li>Full manual testing Final QA document (professional format)</li>
                    <li>Test plan + test strategy</li>
                    <li>30–80 test cases</li>
                    <li>Functional testing</li>
                    <li>Usability testing</li>
                    <li>Regression testing, Bug & issue tracking report</li>
                </ul>
            </div>

            <div class="card">
                <span class="section-title">Customer Information</span>
                <div class="flex-row">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="full_name" placeholder="Your Name" required />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="you@email.com" required />
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" placeholder="Your Address" required />
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" placeholder="0300XXXXXXX" required />
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div>
            <div class="card payment-section">
                <span class="section-title">Payment Method</span>

                <div class="payment-methods">
                    <label class="payment-method"><input type="radio" name="payment_method" value="Credit Card" required /><span>💳 Credit Card</span></label>
                    <label class="payment-method"><input type="radio" name="payment_method" value="Debit Card" /><span>💳 Debit Card</span></label>
                    <label class="payment-method"><input type="radio" name="payment_method" value="PayPal" /><span>🅿️ PayPal</span></label>
                    <label class="payment-method"><input type="radio" name="payment_method" value="Easypaisa" /><span>📱 Easypaisa</span></label>
                    <label class="payment-method"><input type="radio" name="payment_method" value="JazzCash" /><span>📲 JazzCash</span></label>
                    <label class="payment-method"><input type="radio" name="payment_method" value="RAAST" /><span>🏦 RAAST</span></label>
                </div>

                <div class="form-group">
                    <label>Account / Card Number</label>
                    <input type="text" name="account_number" placeholder="0000 0000 0000 0000" required />
                </div>
                <div class="flex-row">
                    <div class="form-group">
                        <label>Issue Date</label>
                        <input type="text" name="issue" placeholder="DD/MM/YY" required/>
                    </div>
                    <div class="form-group">
                        <label>Expiry Date</label>
                        <input type="text" name="expiry" placeholder="DD/MM/YY" required />
                    </div>
                    <div class="form-group">
                        <label>CVV</label>
                        <input type="password" name="cvv" placeholder="123" required />
                    </div>
                </div>

                <button class="btn-pay">Pay & Start Project</button>
            </div>
        </div>

    </div>
</form>

</div>

<footer>
    © 2025 Pulse Associates • Secure Payments • Privacy Policy
</footer>

</body>
</html>
