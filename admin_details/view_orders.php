    <?php
    session_start();
    include '../db.php'; // Database connection
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>View Orders</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Favicon -->
        <link rel="icon" href="../Pics/logo.png">
        <style>
            body { 
                background-color: #f4f6f9; 
                font-family: 'Poppins', sans-serif; 
            }
            .container { 
                margin-top: 50px; 
            }
            h2 { 
                color: #0d6efd; 
                font-weight: 700; 
                margin-bottom: 30px; 
            }
            .table-responsive {
                background: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            }
            .table thead th {
                background-color: #0d6efd;
                color: #fff;
                position: sticky;
                top: 0;
                z-index: 1;
                text-align: center;
            }
            .table tbody td {
                vertical-align: middle;
                text-align: center;
            }
            .table tbody tr:hover {
                background-color: #e7f1ff;
            }
            .btn-delete { 
                background-color: #dc3545; 
                color: #fff; 
                border: none; 
            }
            .btn-delete:hover { 
                background-color: #b52a37; 
            }
            .scrollable-table {
                max-height: 550px;
                overflow-y: auto;
            }
        </style>
    </head>
    <body>

    <div class="container">
        <h2 class="text-center">All Orders</h2>

        <div class="table-responsive scrollable-table">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Payment Method</th>
                        <th>Account Number</th>
                        <th>Issue</th>
                        <th>Expiry</th>
                        <th>CVV</th>
                        <th>Service Title</th>
                        <th>Package Title</th>
                        <th>Package Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM checkout_orders ORDER BY id";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0):
                    while ($order = mysqli_fetch_assoc($result)):
                ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['full_name']; ?></td>
                        <td><?php echo $order['email']; ?></td>
                        <td><?php echo $order['address']; ?></td>
                        <td><?php echo $order['phone']; ?></td>
                        <td><?php echo $order['payment_method']; ?></td>
                        <td><?php echo $order['account_number']; ?></td>
                        <td><?php echo $order['issue']; ?></td>
                        <td><?php echo $order['expiry']; ?></td>
                        <td><?php echo $order['cvv']; ?></td>
                        <td><?php echo $order['service_title']; ?></td>
                        <td><?php echo $order['package_title']; ?></td>
                        <td><?php echo $order['package_price']; ?> PKR</td>
                        <td>
                            <a href="delete_order.php?id=<?php echo $order['id']; ?>" 
                            class="btn btn-sm btn-delete"
                            onclick="return confirm('Are you sure you want to delete this order?')">
                            Delete
                            </a>
                        </td>
                    </tr>
                <?php
                    endwhile;
                else:
                ?>
                    <tr>
                        <td colspan="14" class="text-center">No orders found</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    </body>
    </html>
