<?php
session_start();
include '../db.php';

// Check if order id is provided
if (isset($_GET['id'])) {
    $order_id = intval($_GET['id']); // sanitize input

    // Delete query
    $delete_query = "DELETE FROM checkout_orders WHERE id = '$order_id'";
    if (mysqli_query($conn, $delete_query)) {
        echo "<script>
                alert('Order deleted successfully!');
                window.location.href='view_orders.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting order!');
                window.location.href='view_orders.php';
              </script>";
    }
} else {
    // If no id provided
    echo "<script>
            alert('No order selected!');
            window.location.href='view_orders.php';
          </script>";
}
?>
