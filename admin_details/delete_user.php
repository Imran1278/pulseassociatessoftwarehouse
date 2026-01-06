<?php
include '../db.php';
session_start(); // database connection

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']); // user ID safe conversion

    // Delete query
    $delete = "DELETE FROM users WHERE id = $user_id";
    if (mysqli_query($conn, $delete)) {
        echo "<script>
                alert('User deleted successfully');
                window.location='view_users.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting user');
                window.location='view_users.php';
              </script>";
    }
} else {
    // Agar ID na mile
    echo "<script>
            alert('Invalid request');
            window.location='view_users.php';
          </script>";
}
?>
