

<?php
session_start();

// Destroy admin session
unset($_SESSION['admin_name']);
session_destroy();

// Redirect back to admin panel
header("Location: ../admin_details/admin_panel.php");
exit;
?>
