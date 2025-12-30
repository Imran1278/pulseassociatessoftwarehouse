    <?php
    session_start();
    include 'db.php';

        $search = "";
        if (isset($_GET['search'])) {
            $search = mysqli_real_escape_string($conn, $_GET['search']);
        }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pulse Associates</title>

        <!-- Favicon -->
        <link rel="icon" href="Pics/logo.png">

        <!-- CSS Stylesheets -->
        <link rel="stylesheet" href="../Project1/styles/style.css">
        <link rel="stylesheet" href="../Project1/styles/contact.css">
        <link rel="stylesheet" href="../Project1/styles/footer.css">

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
        /* General button styles */
        <style>
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
        

        <!-- ================= HEADER SECTION ================= -->
        <header class="navbar">
            <div class="logo">
                <img src="Pics/logo.png" alt="Pulse Logo">
                <span class="logo-text">Pulse</span>
            </div>
            <nav class="nav-links">
                <a href="index.php">Home</a>
                <a href="./admin_details/admin_panel.php" target="_blank">Admin</a>
                <a href="#about-section">About</a>
                <a href="#service-section">Services</a>
                <a href="#contact-section">Contact</a>
                <!-- <a href="#projects-section">Projects</a> -->
                
            </nav>
            <form class="search-box" method="GET" action="index.php">
                <i class="fas fa-search"></i>
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Enter Here" 
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                >
            </form>
            <!-- Auth Area -->
            <div class="user-info">
                <?php if (isset($_SESSION['user'])): ?>
                <span class="welcome-text">
                    Welcome, <strong><?php echo $_SESSION['user']; ?></strong>
                </span>
                <a href="./user_details/logout.php" class="logout-btn">Logout</a>
            <?php else: ?>
        <!-- Login Dropdown -->
        <div class="auth-dropdown">
            <a href="#" class="auth-btn login-btn">Login</a>
            <div class="dropdown-menu">
                <a href="./user_details/login.php">As User</a>
                <a href="./admin_details/login.php">As Admin</a>
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

        <!-- ================= HERO SECTION ================= -->
        <section class="hero-section">
            <div class="hero-content">
                <h1 class="main-heading-top">
                    <span class="heading-icon"></span>
                    Innovating the <span class="digital-bold"> Digital </span>
                </h1>
                <h1 class="main-heading">
                    Future with <span class="smart">Smart</span>
                    <span class="software">Software</span> & <span class="talent">Skilled Talent</span>
                </h1>
                <p class="description">
                    Pulse Associates is a PSEB-registered software house 
                    delivering smart digital solutions and industry-focused IT training.
                </p>
                <div class="hero-buttons">
                    <a href="#service-section" class="explore-btn">Explore Our Services</a>
                </div>
            </div>
            <div class="hero-image-container">
                <img src="Pics/teamwork.jpeg" alt="Team working in an office">
            </div>
        </section>

        <!-- ================= ABOUT SECTION ================= -->
        <section id="about-section" class="about-section-container">
            <div class="about-illustration-container">
                <img src="Pics/about.jpeg" alt="Illustration of digital services and team">
            </div>
            <div class="about-content">
                <div class="about-us-tag-wrapper">
                    <span class="about-us-tag">About Us</span>
                </div>
                <h2 class="about-main-heading">
                    Building Technology, Skills & Digital Success <span class="since-year">Since 1997</span>
                </h2>
                <p class="about-description-text">
                    Pulse Associates is a trusted software house registered with 
                    <span style="color:slateblue"><b>PSEB</b></span>. For over two decades, we have been delivering 
                    software solutions, digital services, and real-world IT training to empower individuals and 
                    businesses in Pakistan's evolving tech landscape. We work side-by-side with universities and 
                    industry partners to create career-ready talent and develop software solutions that solve real 
                    business problems.
                </p>
                <a href="../Project1/aboutpage/about_details.php" class="learn-more-btn-v2">
                    Learn More <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </section>

        <!-- ================= SERVICES SECTION ================= -->
        <section id="service-section" class="services-section-container">
            <div class="services-header">
                <h2 class="section-heading-services">Our Services</h2>
                <p class="section-subtitle">
                    Tailored Solutions For Your Success, Elevate Your Experience With Our 
                    Exceptional And Comprehensive Services Today
                </p>
            </div>

            <!-- Services Grid -->
<div class="services-grid">
<?php
    // $get_services = mysqli_query($conn, "SELECT * FROM services");
    // if ($get_services && mysqli_num_rows($get_services) > 0):
    // while ($row = mysqli_fetch_assoc($get_services)):

    $search = '';
    if (isset($_GET['search'])) {
        $search = mysqli_real_escape_string($conn, $_GET['search']);
    }

    // query
    if (!empty($search)) {
        $get_services = mysqli_query(
            $conn,
            "SELECT * FROM services 
             WHERE services_title LIKE '%$search%' 
             OR services_description LIKE '%$search%'"
        );
    } else {
        $get_services = mysqli_query($conn, "SELECT * FROM services");
    }

    if ($get_services && mysqli_num_rows($get_services) > 0):
        while ($row = mysqli_fetch_assoc($get_services)):
?>
    <div class="service-card-item">
        <div class="card-icon-wrapper color-green">
            <i class="<?php echo $row['services_icon']; ?>"></i>
        </div>

        <h3 class="card-title">
            <?php echo $row['services_title']; ?>
        </h3>

        <p class="card-description">
            <?php echo substr($row['services_description'], 0); ?>
        </p>

        <a href="services details/service_details.php?id=<?php echo $row['id']; ?>" 
           class="view-more-btn">
           View More
        </a>
    </div>

<?php
        endwhile;
    endif;
?>
</div>

            <!-- Slider Navigation (Optional) -->
            <div class="slider-container">
                <button id="prev-slide-btn" class="slide-control-btn prev-btn" disabled>
                    <i class="fas fa-arrow-left"></i>
                </button>
                <button id="next-slide-btn" class="slide-control-btn next-btn">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </section>

        

        <!-- ================= CONTACT SECTION ================= -->
        <section id="contact-section" class="contact-section-container">
            <div class="contact-section">
                <h1>Get In Touch With Us</h1>
                <p>We're ready to help you! Say hello or contact us for any inquiry.</p>
            </div>

            <div class="contact-container">

                <!-- Contact Info -->
                <div class="contact-info">
                    <h2>Contact Information</h2>
                    <p>We value your time and look forward to hearing from you. Find the best way to reach us below.</p>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="info-details">
                            <strong>Our Location</strong>
                            Club Road, Shama Chowk, Sargodha
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-envelope"></i></div>
                        <div class="info-details">
                            <strong>Email Address</strong>
                            pulse@logix.edu.pk.com
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="info-details">
                            <strong>Phone Number</strong>
                            +92 346 8665800
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-globe"></i></div>
                        <div class="info-details">
                            <strong>Website</strong>
                            www.pulseassociates.com
                        </div>
                    </div>
                </div>

                <div class="contact-form">
        <h2>Send Us A Message</h2>
        <form method="POST" action="user_details/send_msg.php">

            <div class="form-group">
                <label for="fullName">Full Name *</label>
                <input type="text" id="fullName" name="fullName" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number *</label>
                <input type="tel" id="phone" name="phone">
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="url" id="website" name="website">
            </div>

            <div class="form-group full-width">
                <label for="message">Your Message *</label>
                <textarea id="message" name="message" required></textarea>
            </div>

            <button type="submit" class="submit-btn">
                Send Message <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>

            </div>
        </section>


        <!-- ================= PROJECTS SECTION ================= -->
        

        
<!-- Include footer -->
  <?php
  include("footer.php")
  ?>

        <!-- ================= SCRIPT ================= -->
        <script src="../Project1/js/script.js"></script>

    </body>
    </html>
