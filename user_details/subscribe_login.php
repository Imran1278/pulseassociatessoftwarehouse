    <?php
    session_start();
    include("../db.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!isset($_POST['emailSubscribe']) || empty($_POST['emailSubscribe'])) {
            echo "<script>alert('Email is required'); window.location.href='../index.php';</script>";
            exit();
        }

        $email = mysqli_real_escape_string($conn, $_POST['emailSubscribe']);

        // ONLY check registered users
        $query = mysqli_query($conn, "SELECT name FROM users WHERE email='$email' LIMIT 1");

        if ($query && mysqli_num_rows($query) == 1) {

            $user = mysqli_fetch_assoc($query);
            $_SESSION['user'] = $user['name'];

            echo "<script>
                    alert('Welcome back, {$user['name']}!');
                    window.location.href = '../index.php';
                </script>";
            exit();

        } else {

            echo "<script>
                    alert('This email is not registered. Please register first.');
                    window.location.href = '../index.php';
                </script>";
            exit();
        }
    }

    header("Location: ../index.php");
    exit();
    ?>
