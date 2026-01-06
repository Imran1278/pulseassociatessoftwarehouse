<?php
include '../db.php';
session_start();
$service_id = intval($_GET['id']);

// FETCH SERVICE
$service = mysqli_fetch_assoc(mysqli_query(
    $conn, "SELECT * FROM services WHERE id=$service_id"
));

// FETCH CURRICULUM
$curriculums = mysqli_query(
    $conn, "SELECT * FROM service_curriculum WHERE service_id=$service_id"
);

// FETCH PRICING
$pricings = mysqli_query(
    $conn, "SELECT * FROM service_pricing WHERE service_id=$service_id"
);

// UPDATE
if(isset($_POST['update_service'])){

    $title  = mysqli_real_escape_string($conn,$_POST['services_title']);
    $desc   = mysqli_real_escape_string($conn,$_POST['services_description']);
    $banner = mysqli_real_escape_string($conn,$_POST['banner_image']);

    mysqli_query($conn,"UPDATE services SET 
        services_title='$title',
        services_description='$desc'
        WHERE id=$service_id
    ");

    // RESET CURRICULUM
    mysqli_query($conn,"DELETE FROM service_curriculum WHERE service_id=$service_id");
    foreach($_POST['topic_title'] as $i=>$topic){
        $subs = $_POST['sub_topics'][$i];
        mysqli_query($conn,"INSERT INTO service_curriculum 
        (service_id,topic_title,sub_topics)
        VALUES ($service_id,'$topic','$subs')");
    }

    // RESET PRICING
    mysqli_query($conn,"DELETE FROM service_pricing WHERE service_id=$service_id");
    foreach($_POST['plan_name'] as $i=>$plan){
        mysqli_query($conn,"INSERT INTO service_pricing
        (service_id,plan_name,price,description,features,package_link)
        VALUES (
            $service_id,
            '{$plan}',
            '{$_POST['price'][$i]}',
            '{$_POST['description'][$i]}',
            '{$_POST['features'][$i]}',
            '{$_POST['package_link'][$i]}'
        )");
    }

    echo "<script>alert('Service Updated Successfully');window.location='../admin_details/veiw_service.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Service</title>
<!-- Favicon -->
<link rel="icon" href="../Pics/logo.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{background:#f4f6f9}
.edit-box{background:#fff;padding:30px;border-radius:10px;box-shadow:0 5px 20px rgba(0,0,0,.1)}
.section-title{border-left:5px solid #0dcaf0;padding-left:10px;margin:20px 0}
.dynamic-box{background:#f8f9fa;padding:15px;border-radius:8px;margin-bottom:10px}
</style>
</head>
<body>

<div class="container mt-4">
<div class="edit-box w-75 m-auto">

<h2 class="text-center mb-4">Edit Service</h2>

<form method="post">

<input class="form-control mb-3" name="services_title"
value="<?= $service['services_title'] ?>" required>

<textarea class="form-control mb-3" name="services_description" required><?= $service['services_description'] ?></textarea>

<input class="form-control mb-3" name="banner_image" placeholder="service1.png">


<!-- CURRICULUM -->
<h4 class="section-title">Curriculum</h4>
<div id="curriculum-wrapper">
<?php while($c=mysqli_fetch_assoc($curriculums)): ?>
<div class="dynamic-box">
<input class="form-control mb-2" name="topic_title[]" value="<?= $c['topic_title'] ?>">
<input class="form-control mb-2" name="sub_topics[]" value="<?= $c['sub_topics'] ?>">
</div>
<?php endwhile; ?>
</div>
<button type="button" class="btn btn-secondary mb-3" onclick="addCurriculum()">Add More Curriculum</button>

<!-- PRICING -->
<h4 class="section-title">Pricing</h4>
<div id="pricing-wrapper">
<?php while($p=mysqli_fetch_assoc($pricings)): ?>
<div class="dynamic-box">
<input class="form-control mb-2" name="plan_name[]" value="<?= $p['plan_name'] ?>">
<input class="form-control mb-2" name="price[]" value="<?= $p['price'] ?>">
<input class="form-control mb-2" name="description[]" value="<?= $p['description'] ?>">
<input class="form-control mb-2" name="features[]" value="<?= $p['features'] ?>">
<input class="form-control mb-2" name="package_link[]" value="<?= $p['package_link'] ?>">
</div>
<?php endwhile; ?>
</div>
<button type="button" class="btn btn-secondary mb-3" onclick="addPricing()">Add More Pricing</button>

<button class="btn btn-info w-100" name="update_service">Update Service</button>

</form>
</div>
</div>

<script>
function addCurriculum(){
document.getElementById('curriculum-wrapper').innerHTML+=`
<div class="dynamic-box">
<input class="form-control mb-2" name="topic_title[]" placeholder="Topic">
<input class="form-control mb-2" name="sub_topics[]" placeholder="Sub topics">
</div>`;
}
function addPricing(){
document.getElementById('pricing-wrapper').innerHTML+=`
<div class="dynamic-box">
<input class="form-control mb-2" name="plan_name[]" placeholder="Plan">
<input class="form-control mb-2" name="price[]" placeholder="Price">
<input class="form-control mb-2" name="description[]" placeholder="Description">
<input class="form-control mb-2" name="features[]" placeholder="Features">
<input class="form-control mb-2" name="package_link[]" placeholder="Link">
</div>`;
}
</script>

</body>
</html>
