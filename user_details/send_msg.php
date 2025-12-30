<?php
include("../db.php"); // correct path

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
    $website  = mysqli_real_escape_string($conn, $_POST['website']);
    $message  = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_messages 
            (full_name, email, phone, website, message) 
            VALUES 
            ('$fullName', '$email', '$phone', '$website', '$message')";

    if (mysqli_query($conn, $sql)) {

        echo "<script>
                alert('Thank you for sending your message!');
                window.location.href = '../index.php';
              </script>";
        exit();

    } else {
        // Debugging: show real SQL error
        echo "SQL Error: " . mysqli_error($conn);
        exit();
    }
}
?>