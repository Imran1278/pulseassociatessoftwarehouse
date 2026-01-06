-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2025 at 06:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mywebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `password`, `created_at`) VALUES
(1, 'Muhammad Saqlain Mushtaq', 'saqlainrajput@gmail.com', '03437887654', '$2y$10$oT/1rHwnYWdtE.BXf/BRdeHFwUffgMus4eamZ4v9zPfWlaKQ7aviG', '2025-12-27 05:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_orders`
--

CREATE TABLE `checkout_orders` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  `issue` varchar(50) DEFAULT NULL,
  `expiry` varchar(20) DEFAULT NULL,
  `cvv` varchar(10) DEFAULT NULL,
  `service_title` varchar(255) DEFAULT NULL,
  `package_title` varchar(255) DEFAULT NULL,
  `package_price` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout_orders`
--

INSERT INTO `checkout_orders` (`id`, `full_name`, `email`, `address`, `phone`, `payment_method`, `account_number`, `issue`, `expiry`, `cvv`, `service_title`, `package_title`, `package_price`, `created_at`) VALUES
(1, 'Imran Ali', 'imranalichohan5@gmail.com', 'Moqam E Hayat, Water Supply Road', '03046177024', 'Debit Card', '38403988728761', '12/09/2021', '12/09/2026', '135', 'Mobile App Development', 'Basic Package', '15000', '2025-12-27 07:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `full_name`, `email`, `phone`, `website`, `message`, `created_at`) VALUES
(1, 'Imran Ali', 'imranalichohan5@gmail.com', '03046177024', 'https://www.google.com/', 'good', '2025-12-27 05:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `services_title` varchar(255) DEFAULT NULL,
  `services_description` text DEFAULT NULL,
  `services_icon` varchar(100) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `services_title`, `services_description`, `services_icon`, `banner_image`, `created_at`) VALUES
(1, 'Mobile App Development', 'We build high-performance, intuitive mobile applications for both iOS and Android, ensuring excellent user experience and market readiness.', 'fas fa-mobile-alt', 'service1.png', '2025-12-27 07:01:52'),
(2, 'UI / UX Designing And Developing', 'We create engaging, user-centered digital interfaces that are both aesthetically pleasing and exceptionally easy to navigate. Users can easily design it.', 'fas fa-palette', 'service2.png', '2025-12-27 07:42:27'),
(3, 'Graphics Designing And Media Animation', 'Develop creative skills in Adobe Photoshop/Illustrator and learn basic motion graphics and video editing techniques.', 'fas fa-layer-group', 'service3.png', '2025-12-27 07:50:32'),
(4, 'AI-Power Data Science And ML With Python', 'Dive into data analysis, machine learning algorithms, and deep learning models using Python and its libraries (Pandas, TensorFlow).', 'fas fa-robot', 'service4.png', '2025-12-27 07:56:21'),
(5, 'Software Testing & Quality Assurance', 'Comprehensive testing services to ensure your software is bug-free, secure, reliable, and meets all performance and quality standards.', 'fas fa-star', 'service5.png', '2025-12-27 08:34:17'),
(6, 'Internet of Things (IoT) Solutions', 'Developing intelligent systems that connect, manage, and analyze data from smart devices for powerful automation and insights.', 'fas fa-wifi', 'service6.png', '2025-12-27 08:41:23'),
(7, 'Virtual Assistant Amazon', 'Gain expertise in FBA/FBM management, product sourcing, listing optimization, and customer service for Amazon selling.', 'fab fa-amazon', 'service7.png', '2025-12-27 08:49:26'),
(8, 'Web Designing And Development', 'Build dynamic, responsive websites using HTML, CSS, JavaScript, and popular frameworks like React or WordPress.', 'fas fa-globe', 'service8.png', '2025-12-27 08:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `service_curriculum`
--

CREATE TABLE `service_curriculum` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `topic_title` varchar(255) NOT NULL,
  `sub_topics` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_curriculum`
--

INSERT INTO `service_curriculum` (`id`, `service_id`, `topic_title`, `sub_topics`) VALUES
(13, 1, 'Native App Development', 'Swift, Kotlin, Java, C/C++'),
(14, 1, 'Cross-Platform App Development', 'Flutter, React Native, C#'),
(15, 1, 'Integrating', 'Database, APIs, Legacy App Migration, Modernization'),
(16, 1, 'Design', 'Mobile UX/UI, Wireframing and Prototyping, Accessibility Compliance'),
(20, 2, 'Research & Strategy', 'User Research and Analysis, Competitor Analysis, Information Architecture (IA)'),
(21, 2, 'Design and Prototyping', 'Wireframing, Interactive Prototyping, Visual Design (UI), Responsive Design'),
(22, 2, 'Testing and Handoff', 'Usability Testing, Design System Creation, Developer Handoff'),
(23, 3, 'Graphics Designing', 'Adobe Photoshop Fout, Adobe Illustrator Fout, Corel Draw Graphics Suit, Artificial Intelligence'),
(24, 3, 'Media Animation & Editing', 'Adobe PremierPro Fout, Adobe After Effects Fout, Inpage Urdu, Wondershare Filmora, Capcut'),
(25, 4, 'AI Service Details', 'Exploratory Analysis Mastery, Foundation / Introduction Of Python, Data Science & Analysis, Data Visualization, Machine Learning'),
(26, 5, 'Testing Methodologies', 'Functional Testing, Performance Testing, Security Testing, Usability Testing, Compatibility Testing'),
(27, 5, 'Tools and Processes', 'Test Automation, Defect Tracking and Management, Test Documentation, User Acceptance Testing (UAT) Support'),
(30, 6, 'Platform & Architecture', 'IoT Consulting and Strategy, IoT Device Programming (Firmware), Cloud Platform Integration, Edge Computing Solutions'),
(31, 6, 'Data and Applications', 'Custom IoT Application Development, Data Analytics and Visualization, Real-Time Monitoring Dashboards, Automation and Control Systems, IoT Security Implementation'),
(32, 7, 'Amazon Service', 'Introduction To E-Commerce, Amazon Virtual Assistant, Amazon FBA Wholesale, Daraz Seller Account Signup-Selling & Managing, Fiverr Signup / Management, Upwork Signup / Management'),
(33, 8, 'Website Development Service', 'Advance HTML, CSS, Bootstrap Framework, JavaScript / Jquery Frameworks, PHP / MySQL, SEO, UI/UX Designing, Cloud deployment');

-- --------------------------------------------------------

--
-- Table structure for table `service_pricing`
--

CREATE TABLE `service_pricing` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `features` text NOT NULL,
  `package_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_pricing`
--

INSERT INTO `service_pricing` (`id`, `service_id`, `plan_name`, `price`, `description`, `features`, `package_link`) VALUES
(10, 1, 'Basic Plan', '15K PKR', 'Focuses on a minimum viable product (MVP) for initial market testing and validation.', '1 Simple Mobile App (Android Only), 3-5 screens (Home+About+Contact+Login etc), Basic UI Design, Static Content, No Backend OR very basic backend (Firebase basic), Form submission, Local storage, Basic navigation', '../packages/mob-basic.php'),
(11, 1, 'Standard Plan', '40K PKR', 'Best for full-featured applications requiring robust cross-platform capability and custom design.', 'Android App (Sometimes iOS), 6-12 Screens, Better UI / UX, Admin Panel (Basic), Firebase Or Simple PHP Backend, Login / Signup, Database, API Integration', '../packages/mob-standard.php'),
(12, 1, 'Enterprise Plan', '1 Lakh PKR', 'Premium solution for highly scalable apps, requiring native optimization and advanced security.', 'Android & iSO (Hybrid:Flutter / React Native), 12-30 Screens, Professional UI /UX, Complete Backend (Node.js+Laravel+Firebase), Fully Functional Admin Panel, Payment Gateway, Live Tracking, Chat System, Advanced APi Integration', '../packages/mob-enterprise.php'),
(16, 2, 'UX Foundation', '5k PKR', 'Essential user flow mapping, wireframing, and information architecture for 5 screens.', '3-5 Basic Screens, Simple Layout Design, Basic Color Theme, Standard Icons, Basic Mobile UI Only, No Animations', '../packages/uiux-basic.php'),
(17, 2, 'Full Product Design', '20K PKR', 'Complete UI/UX design, high-fidelity prototypes, and design hand-off for a standard application.', '6-15 Screens, Full App or Webiste UI / UX Design, high-Fidelity Mockups (Figma+Adobe XD), Complete Color Theme + Typography, Buttons, Icons, Card Design, User Flow Diagram, Interactive Prototype Demo', '../packages/uiux-standard.php'),
(18, 2, 'Enterprise Design System', '45K PKR', 'Building a complete, scalable design system for large organizations and long-term product lines.', '20-50 Screens (Full Application), UI / UX For Both Mobile, Web Development, Complete Design System, Personas + User Journeys, Wireframes + High-Fidelity UI, Micro-Interactions (Animations)', '../packages/uiux-enterprise.php'),
(19, 3, 'Identity Starter', '3K PKR', 'Focuses on core brand assets including logo, color, and font selection.', 'Simple logo, Business card, Basic poster / flyer, Social media post (2–3 designs), Simple banner', '../packages/graphics-basic.php'),
(20, 3, 'Digital Campaign Pro', '12K PKR', 'Dedicated support for creating high-converting graphics and animations for digital campaigns.', '1 premium logo, Complete brand kit, 5–10 social media posts, Facebook/Instagram cover design, Professional poster/flyer, Basic animations (Logo reveal (simple), Animated social post, Text motion graphics)', '../packages/graphics-standard.php'),
(21, 3, 'Ultimate Media Suite', '30k PKR', 'A complete package for full corporate video production and exhaustive brand guideline development.', 'Full brand identity design, Brand guidelines book (PDF), 15–30 social media posts, Posters+brochures+product catalog, Packaging design, Advanced animation services', '../packages/graphics-enterprise.php'),
(22, 4, 'Data Exploration', '8K PKR', 'Initial phase of data cleaning, analysis, and visualization to identify key business opportunities.', 'Basic ML models (1–2) No deployment, Linear Regression, Logistic Regression, Small dataset (CSV/Excel), Data cleaning, Visualizations (Matplotlib/Seaborn), Python code (Jupyter Notebook)', '../packages/ai-basic.php'),
(23, 4, 'Predictive Model Dev', '25K PKR', 'Development and training of a custom machine learning model for specific business prediction tasks.', '3–6 ML Models Full documentation + presentation slides, Data cleaning + data transformation, Feature engineering, Visualizations + EDA (Exploratory Data Analysis), Model comparison & evaluation, Python scripts + Notebook + dashboards, Flask/Django API for ML Model', '../packages/ai-standard.php'),
(24, 4, 'Full AI Solution', '50K PKR', 'End-to-end development, containerization, and deployment of a fully scalable AI system on the cloud.', 'Advanced ML + AI models Full documentation + research paper style report, Deep Learning (Keras/TensorFlow/PyTorch), Time-series forecasting, SQL/NoSQL database integration, Admin dashboard (React / PHP), API deployment (Flask/FastAPI), NLP projects, Recommendation engine, Predictive analytics dashboard', '../packages/ai-enterprise.php'),
(25, 5, 'Functional Manual Audit', '5K PKR', 'Manual testing focused on core application functionality for small feature releases or MVPs.', 'Basic functional testing No performance testing, Manual testing only, 10–20 test cases, Bug report (Excel or PDF), Simple test plan, Small project (website/app), No automation', '../packages/testing-basic.php'),
(26, 5, 'Automation Setup', '15K PKR', 'Setting up a robust, scalable test automation framework for web or mobile applications.', 'Full manual testing Final QA document (professional format), Test plan + test strategy, 30–80 test cases, Functional testing, Usability testing, Regression testing, Bug & issue tracking report, Cross-device & cross-browser testing', '../packages/testing-standard.php'),
(27, 5, 'Enterprise QA Suite', '35K PKR', 'Continuous QA coverage including full automation, performance testing, and dedicated defect management.', 'Selenium / Cypress automation scripts, Full test plan, test strategy, test scenarios, Requirement analysis, Performance testing (JMeter), API testing (Postman), CI/CD integration, Professional QA documentation, Security testing (basic)', '../packages/testing-enterprise.php'),
(31, 6, 'IoT Proof of Concept (PoC)', '8K PKR', 'Focus on prototyping and validating a single use case with basic sensor and cloud integration.', 'Simple IoT prototype 1–2 sensors only, Microcontroller setup (Arduino / ESP32), Basic sensors (Temperature+Gas+Motion etc.), Data reading + serial monitoring, Simple mobile/web interface (basic), Basic wiring diagramProject report', '../packages/iot-basic.php'),
(32, 6, 'IoT Pilot Program', '25K PKR', 'Pilot deployment of a device fleet, focusing on data security, remote management, and analytics.', 'Full IoT system (3–6 sensors) Professional documentation, Microcontroller (ESP32/NodeMCU/Raspberry Pi), Cloud connectivity (Firebase, AWS IoT Core, Thingspeak), Mobile app/dashboard, Automation, PCB diagram (basic)', '../packages/iot-standard.php'),
(33, 6, 'Enterprise IoT Platform', '50K PKR', 'End-to-end development of a custom, highly scalable, and secure industrial IoT (IIoT) platform.', 'Large-scale IoT system, 8–20 sensors, Custom PCB design, Complete cloud ecosystem, Mobile + Web + Admin Dashboard, Advanced data analytics (Python), AI integration (predictive analytics), Security protocols (MQTT with TLS), Professional wiring + diagrams', '../packages/iot-enterprise.php'),
(34, 7, 'Product Launch', '10K PKR', 'One-time service to ensure your new product listing is fully optimized and compliant.', 'Product research (2–4 products), Keyword research (basic), Listing creation, Listing optimization (simple), Search Term optimization, Competitor analysis, Basic PPC guidance (no campaign running)', '../packages/vah-assistant-basic.php'),
(35, 7, 'Monthly Management', '35K PKR', 'Comprehensive ongoing management for an established single-product Amazon store (FBA or FBM).', 'Product research (5–10 products), Keyword research (advanced), Listing creation + optimization, PPC campaign setup, Inventory planning, Order management, Customer service, Competitor monitoring, Store health monitoring', '../packages/vah-assistant-standard.php'),
(36, 7, 'Brand Scaling Pro', '85K PKR', 'Full-service brand strategy, advanced PPC management, and multi-product scaling for private label sellers.', 'Complete A–Z Amazon store management, Advanced product research, Sourcing from Alibaba/Dropshipping vendors, Profit calculation sheets, Advanced PPC, Creative assets, Complete monthly analytics report', '../packages/vah-assistant-enterprise.php'),
(37, 8, 'Starter Website', '30K PKR', ' Ideal for basic business presence, portfolio sites, or small brochure websites (up to 5 pages).', '1–3 pages, Home + About + Contact, Basic UI/UX, Responsive layout (mobile-friendly), HTML, CSS, JavaScript, Basic animations, Basic SEO tags, Project documentation', '../packages/web-basic.php'),
(38, 8, 'Business CMS / E-commerce', '50K PKR', 'Full-featured website with content management system (CMS) or e-commerce capability.', '4–8 pages, Professional UI/UX design, Fully responsive website, Modern layout (animations+sliders+effects), Front-end + Back-end, PHP / Node.js / Python, Database integration (MySQL), Admin panel (basic), Contact form + email integration, Complete project documentation', '../packages/web-standard.php'),
(39, 8, 'Custom Web Application', '1 Lakh PKR', 'Development of complex web portals, SaaS platforms, or custom software solutions using modern frameworks.', 'Complete custom web design, UI/UX (Figma), Front-end: React / Vue / Angular, Back-end: Laravel / Node.js / Django, Database: MySQL / MongoDB / PostgreSQL, API integrations, 100% responsive + optimized, Cloud deployment (AWS / DigitalOcean), Professional documentation', '../packages/web-enterprise.php');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `city`, `gender`, `password`, `created_at`) VALUES
(1, 'Imran Ali', 'imranalichohan5@gmail.com', '03046177024', 'Sargodha', 'male', '$2y$10$Fd1tx.maawWSemrts1XIA.O.5wo2XbKjd6/AFLgBKHcQDr8P7M3jq', '2025-12-27 05:36:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `checkout_orders`
--
ALTER TABLE `checkout_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_curriculum`
--
ALTER TABLE `service_curriculum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `service_pricing`
--
ALTER TABLE `service_pricing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkout_orders`
--
ALTER TABLE `checkout_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_curriculum`
--
ALTER TABLE `service_curriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `service_pricing`
--
ALTER TABLE `service_pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_curriculum`
--
ALTER TABLE `service_curriculum`
  ADD CONSTRAINT `service_curriculum_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_pricing`
--
ALTER TABLE `service_pricing`
  ADD CONSTRAINT `service_pricing_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
