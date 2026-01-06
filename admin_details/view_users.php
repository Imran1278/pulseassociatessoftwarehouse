<?php
include '../db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Users</title>
    <link rel="icon" href="../Pics/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f8;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            margin-top: 60px;
            max-width: 1000px;
        }

        h2 {
            color: #0d6efd;
            font-weight: 700;
            margin-bottom: 40px;
            text-align: center;
        }

        table {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        th, td {
            text-align: center;
            vertical-align: middle;
            padding: 12px 15px;
        }

        th {
            background-color: #0d6efd;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background-color: #f1f3f5;
            transform: scale(1.01);
        }

        .btn-delete {
            padding: 6px 14px;
            font-size: 13px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-delete:hover {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .container {
                margin-top: 30px;
                padding: 0 15px;
            }

            table th, table td {
                padding: 10px 8px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Registered Users</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>location</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = mysqli_query($conn, "SELECT * FROM users ORDER BY id");
                if ($users && mysqli_num_rows($users) > 0):
                    while($user = mysqli_fetch_assoc($users)):
                ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['phone']); ?></td>
                    <td><?php echo htmlspecialchars($user['city']); ?></td>
                    <td><?php echo htmlspecialchars($user['gender']); ?></td>
                    <td>
                        <a href="delete_user.php?id=<?php echo $user['id']; ?>" 
                           class="btn btn-danger btn-sm btn-delete" 
                           onclick="return confirm('Are you sure you want to delete this user?')">
                            Delete
                        </a>
                    </td>
                </tr>
                <?php
                    endwhile;
                else:
                ?>
                <tr>
                    <td colspan="6">No users found!</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
