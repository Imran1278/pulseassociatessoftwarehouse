<?php
include '../db.php';
session_start(); // database connection

if(!isset($_GET['id'])) {
    echo "Service not found.";
    exit;
}

$service_id = intval($_GET['id']);

// Fetch service
$service_query = mysqli_query($conn, "SELECT * FROM services WHERE id='$service_id'");
if(mysqli_num_rows($service_query) == 0){
    echo "Service not found.";
    exit;
}
$service = mysqli_fetch_assoc($service_query);

// Fetch curriculum
$curriculum_query = mysqli_query($conn, "SELECT * FROM service_curriculum WHERE service_id='$service_id'");

// Fetch pricing
$pricing_query = mysqli_query($conn, "SELECT * FROM service_pricing WHERE service_id='$service_id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $service['services_title']; ?> | Pulse Associates</title>
    <link rel="icon" href="../Pics/logo.png">
    <link rel="stylesheet" href="../styles/services.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
    /* Auth / User Info Area */
    .user-info {
        display: flex;
        align-items: center;
        gap: 12px;
        font-family: 'Segoe UI', sans-serif;
    }
    /* Curriculum Section */
.curriculum-section h3 {
    font-size: 1.8em;
    font-weight: 700;
    color: black;
    margin-top: 40px;
    margin-bottom: 20px;
    border-bottom: 2px solid var(--light-yellow);
    padding-bottom: 10px;
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
    /* Dropdown */
    /* Dropdown Wrapper */
.auth-dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Box */
.dropdown-menu {
    display: none;
    position: absolute;
    top: 110%;
    left: 0;
    min-width: 170px;
    background: #ffffff;
    border-radius: 10px;
    padding: 6px 0;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    z-index: 999;
    animation: fadeSlide 0.25s ease;
}

/* Dropdown Items */
.dropdown-menu a {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    font-size: 14px;
    color: #333;
    text-decoration: none;
    transition: background 0.2s ease, color 0.2s ease;
}

/* Hover Effect */
.dropdown-menu a:hover {
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: #fff;
}

/* Show Dropdown */
.auth-dropdown:hover .dropdown-menu {
    display: block;
}

/* Smooth Animation */
@keyframes fadeSlide {
    from {
        opacity: 0;
        transform: translateY(-8px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
    </style>
</head>
<body>
<header class="navbar">
<div class="logo">
                <img src="../Pics/logo.png" alt="Pulse Logo">
                <span class="logo-text">Pulse</span>
            </div>
            <nav class="nav-links">
                <a href="../index.php">Home</a>
                <a href="../admin_details/admin_panel.php" target="_blank">Admin</a>
                <a href="#about-section">About</a>
                <a href="#service-section">Services</a>
                <a href="#contact-section">Contact</a>
                
            </nav>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Enter Here">
            </div>
            <!-- Auth Area -->
            <div class="user-info">
                <?php if (isset($_SESSION['user'])): ?>
                <span class="welcome-text">
                    Welcome, <strong><?php echo $_SESSION['user']; ?></strong>
                </span>
                <a href="../user_details/logout.php" class="logout-btn">Logout</a>
            <?php else: ?>
        <!-- Login Dropdown -->
        <div class="auth-dropdown">
            <a href="#" class="auth-btn login-btn">Login</a>
            <div class="dropdown-menu">
                <a href="../user_details/login.php">As User</a>
                <a href="../admin_details/login.php">As Admin</a>
            </div>
        </div>

        <!-- Register Dropdown -->
        <div class="auth-dropdown">
            <a href="#" class="auth-btn register-btn">Register</a>
            <div class="dropdown-menu">
                <a href="./user_details/register.php">As User</a>
                <a href="./admin_details/register.php">As Admin</a>
            </div>
        </div>

    <?php endif; ?>
</div>
</header>

<section class="service-details-page-container">
    <div class="service-hero-banner">
        <div class="hero-overlay">
            <h1 class="banner-heading"><?php echo $service['services_title']; ?></h1>
        </div>
        <img src="../Pics/<?php echo $service['banner_image']; ?>" alt="Service Banner Image" class="banner-image">
    </div>

    <div class="details-content-wrapper">
        <div class="main-details-content">
            <p class="service-category">Service</p>
            <h2 class="service-main-title"><?php echo $service['services_title']; ?></h2>
            <p class="service-description">
                <?php echo $service['services_description']; ?>
            </p>

            <div class="curriculum-section">
                <h3>Service Curriculum</h3>
                <?php while($row = mysqli_fetch_assoc($curriculum_query)): ?>
                    <div class="topic-item">
                        <div class="topic-header">
                            <i class="fas fa-play-circle topic-icon"></i>
                            <h4><?php echo $row['topic_title']; ?></h4>
                            <i class="fas fa-check-circle completed-icon"></i>
                        </div>
                        <ul class="sub-topics">
                            <?php 
                            $subs = explode(",", $row['sub_topics']);
                            foreach($subs as $sub){ echo "<li>".trim($sub)."</li>"; }
                            ?>
                        </ul>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <aside class="consultation-sidebar">
    <div class="consultation-block">
        <h3>Need Any Consultation</h3>
        <div class="contact-info">
            <a href="../index.php#contact-section" class="btn-contact-us">Contact Us <i class="fas fa-arrow-right"></i></a>
            <p class="phone-number">+92 346 8665800</p>
            <p class="phone-number">048 3220901</p>
        </div>
    </div>
</aside>
    </div>

    <div class="pricing-section">
        <div class="pricing-cards-container">
            <?php while($pricing = mysqli_fetch_assoc($pricing_query)): ?>
                <div class="price-card <?php echo ($pricing['plan_name'] == 'Standard') ? 'standard-card' : ''; ?>">
                    <h3><?php echo $pricing['plan_name']; ?></h3>
                    <p class="price-tag"><?php echo $pricing['price']; ?></p>
                    <p class="price-description"><?php echo $pricing['description']; ?></p>
                    <a href="<?php echo $pricing['package_link']; ?>" target="_blank" class="btn-package">Choose Package →</a>
                    <ul class="features-list">
                        <?php 
                        $features = explode(",", $pricing['features']);
                        foreach($features as $feat){ echo "<li><i class='fas fa-check-circle'></i> ".trim($feat)."</li>"; }
                        ?>
                    </ul>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<script src="../js/script.js"></script>
</body>
</html>
