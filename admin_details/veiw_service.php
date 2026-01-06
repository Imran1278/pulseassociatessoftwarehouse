<?php
include '../db.php';
$services_q = mysqli_query($conn, "SELECT * FROM services ORDER BY id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" href="../Pics/logo.png">

    <style>
        body{
            background:#f5f7fa;
        }
        .page-title{
            font-weight:700;
            color:#333;
        }
        table{
            background:white;
            border-radius:10px;
            overflow:hidden;
        }
        thead{
            background:#0d6efd;
            color:white;
        }
        td, th{
            vertical-align: middle;
        }
        .service-icon{
            font-size:22px;
            color:#0d6efd;
        }
        .desc{
            max-width:350px;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <h2 class="text-center page-title mb-4">All Services</h2>

    <div class="table-responsive shadow">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $count = 1;
            while($service = mysqli_fetch_assoc($services_q)):
            ?>
                <tr>
                    <td><?php echo $count++; ?></td>

                    <td>
                        <i class="<?php echo $service['services_icon']; ?> service-icon"></i>
                    </td>

                    <td>
                        <strong><?php echo $service['services_title']; ?></strong>
                    </td>

                    <td class="desc">
                        <?php echo substr($service['services_description'], 0); ?>
                    </td>

                        <td>
                            <a href="../services details/service_details.php?id=<?php echo $service['id']; ?>"
                            class="btn btn-sm btn-primary">
                            <i class="fa fa-eye"></i>
                            </a>

                            <a href="../services details/edit_services.php?id=<?php echo $service['id']; ?>"
                            class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i>
                            </a>

                            <a href="../services details/delete_services.php?id=<?php echo $service['id']; ?>"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure?')">
                            <i class="fa fa-trash"></i>
                            </a>
                        </td>
                </tr>
            <?php endwhile; ?>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>
