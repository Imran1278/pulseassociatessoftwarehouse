<?php
include '../db.php';
session_start();
if (!isset($_GET['id'])) {
    header("Location: ../admin_details/veiw_service.php");
    exit;
}

$id = intval($_GET['id']);
$deleted = false;

if (isset($_POST['confirm_delete'])) {
    $query = mysqli_query($conn, "DELETE FROM services WHERE id = $id");

    if ($query) {
        $deleted = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Service</title>
    <link rel="icon" href="../Pics/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
            font-family: 'Poppins', sans-serif;
        }
        .delete-box {
            max-width: 500px;
            margin: 120px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
        }
        .delete-box h3 {
            color: #dc3545;
            margin-bottom: 15px;
        }
        .delete-box p {
            color: #555;
            margin-bottom: 25px;
        }
        .btn-danger {
            padding: 10px 20px;
            border-radius: 8px;
        }
        .btn-secondary {
            padding: 10px 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="delete-box">
    <?php if ($deleted): ?>
        <h3>Service Deleted Successfully ✅</h3>
        <p>The service has been removed from the system.</p>
        <a href="../admin_details/veiw_service.php" class="btn btn-success">Back to Services</a>

    <?php else: ?>
        <h3>Delete This Service?</h3>
        <p>
            Are you sure you want to delete this service?<br>
            <strong>This action cannot be undone.</strong>
        </p>

        <form method="post">
            <button type="submit" name="confirm_delete" class="btn btn-danger">
                Yes, Delete
            </button>
            <a href="../admin_details/veiw_service.php" class="btn btn-secondary ms-2">
                Cancel
            </a>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
