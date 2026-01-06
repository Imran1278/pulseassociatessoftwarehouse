<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pulse Associates | Admin Dashboard</title>
<!-- Favicon -->
<link rel="icon" href="../Pics/logo.png">

<style>
/* ================= GLOBAL ================= */
body {
    margin: 0;
    font-family: "Segoe UI", sans-serif;
    background: #f1f5f9;
}

/* ================= ADMIN HEADER ================= */
.admin-header {
    background: linear-gradient(135deg, #1e3a8a, #2563eb);
    color: #ffffff;
    padding: 16px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 8px 25px rgba(37, 99, 235, 0.35);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.admin-logo {
    font-size: 22px;
    font-weight: 800;
    letter-spacing: 1px;
    color: #facc15;
}

.admin-user {
    display: flex;
    align-items: center;
    gap: 18px;
    font-size: 15px;
}

.logout-btn {
    text-decoration: none;
    padding: 8px 20px;
    border-radius: 30px;
    background: linear-gradient(135deg, #facc15, #fde047);
    color: #1e293b;
    font-size: 14px;
    font-weight: 700;
    transition: 0.3s;
}

.logout-btn:hover {
    transform: scale(1.05);
}

/* ================= DASHBOARD ================= */
.dashboard {
    padding: 50px 40px;
}

.dashboard-title {
    font-size: 28px;
    font-weight: 800;
    color: #1e3a8a;
    margin-bottom: 40px;
}

/* ================= CARDS GRID ================= */
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 30px;
}

/* ================= DASHBOARD CARD ================= */
.dashboard-card {
    background: white;
    border-radius: 18px;
    padding: 35px 25px;
    text-align: center;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    transition: 0.3s;
    cursor: pointer;
    border-top: 6px solid #facc15;
}

.dashboard-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(37, 99, 235, 0.3);
}

.dashboard-card h3 {
    margin: 0;
    font-size: 18px;
    color: #1e3a8a;
    font-weight: 800;
}

.dashboard-card p {
    font-size: 14px;
    color: #64748b;
    margin-top: 8px;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 768px) {
    .admin-header {
        padding: 14px 20px;
    }
    .dashboard {
        padding: 30px 20px;
    }
}

</style>
</head>

<body>

<header class="admin-header">
    <div class="admin-logo">Admin Panel</div>

    <div class="admin-user">
        <?php if (isset($_SESSION['admin_name'])): ?>
            <span>Welcome, <strong><?php echo $_SESSION['admin_name']; ?></strong></span>
            <a href="../admin_details/logout.php" class="logout-btn">Logout</a>
        <?php else: ?>
            <a href="../admin_details/login.php" class="logout-btn">Login</a>
            <a href="../admin_details/register.php" class="logout-btn">Register</a>
        <?php endif; ?>
    </div>
</header>


<!-- DASHBOARD -->
<?php if (isset($_SESSION['admin_name'])): ?>
<section class="dashboard">

    <div class="dashboard-grid">
    <section class="dashboard">
    <div class="dashboard-title">Dashboard</div>

    <div class="dashboard-grid">

        <div class="dashboard-card" onclick="location.href='add_service.php'">
            <h3>Add Services</h3>
            <p>Create new services & packages</p>
        </div>

        <div class="dashboard-card" onclick="location.href='veiw_service.php'">
            <h3>View Services</h3>
            <p>Manage existing services</p>
        </div>

        <div class="dashboard-card" onclick="location.href='view_users.php'">
            <h3>View Users</h3>
            <p>Registered users list</p>
        </div>

        <div class="dashboard-card" onclick="location.href='view_orders.php'">
            <h3>View Orders</h3>
            <p>Customer orders & payments</p>
        </div>

    </div>
</section>
    </div>
</section>
<?php else: ?>
<section class="dashboard">
    <div class="dashboard-title">Admin Access Required</div>
    <p style="color:#475569;font-size:16px;">
        Please login as admin to access the dashboard.
    </p>
</section>
<?php endif; ?>



</body>
</html>
