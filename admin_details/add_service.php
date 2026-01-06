<?php
session_start();
include '../db.php';

if (isset($_POST['add_services'])) {

    $icon  = mysqli_real_escape_string($conn, $_POST['services_icon']);
    $title = mysqli_real_escape_string($conn, $_POST['services_title']);
    $desc  = mysqli_real_escape_string($conn, $_POST['services_description']);
    $banner = mysqli_real_escape_string($conn, $_POST['banner_image']); 

    // Insert main service
    $insert = "INSERT INTO services 
            (services_icon, services_title, services_description, banner_image)
            VALUES 
            ('$icon', '$title', '$desc', '$banner')";

    if (mysqli_query($conn, $insert)) {
        $service_id = mysqli_insert_id($conn); // get the inserted service id

        // Insert Curriculum
        if(isset($_POST['topic_title']) && isset($_POST['sub_topics'])) {
            foreach($_POST['topic_title'] as $index => $topic){
                $topic = mysqli_real_escape_string($conn, $topic);
                $subs  = mysqli_real_escape_string($conn, $_POST['sub_topics'][$index]);
                mysqli_query($conn, "INSERT INTO service_curriculum (service_id, topic_title, sub_topics)
                                    VALUES ('$service_id', '$topic', '$subs')");
            }
        }

        // Insert Pricing
        if(isset($_POST['plan_name']) && isset($_POST['price'])) {
            foreach($_POST['plan_name'] as $index => $plan){
                $plan = mysqli_real_escape_string($conn, $plan);
                $price = mysqli_real_escape_string($conn, $_POST['price'][$index]);
                $desc_price = mysqli_real_escape_string($conn, $_POST['price_description'][$index]);
                $features = mysqli_real_escape_string($conn, $_POST['features'][$index]);
                $link = mysqli_real_escape_string($conn, $_POST['package_link'][$index]);

                mysqli_query($conn, "INSERT INTO service_pricing 
                    (service_id, plan_name, price, description, features, package_link)
                    VALUES ('$service_id', '$plan', '$price', '$desc_price', '$features', '$link')");
            }
        }

        echo "<script>
                alert('Service Added Successfully');
                window.location='admin_panel.php';
              </script>";
    } else {
        echo "<script>alert('Database Error');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../Pics/logo.png">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h2 class="text-center mb-4">Add Service</h2>

    <form method="post" class="w-75 m-auto">
        <input class="form-control mb-3" name="services_icon" placeholder="fa-solid fa-code" required>
        <input class="form-control mb-3" name="services_title" placeholder="Service Title" required>
        <textarea class="form-control mb-3" name="services_description" placeholder="Service Description" required></textarea>
        <input class="form-control mb-3" name="banner_image" placeholder="Banner Image Filename (service1.png)" required>

        <h4>Curriculum</h4>
        <div id="curriculum-wrapper">
            <input class="form-control mb-2" name="topic_title[]" placeholder="Topic Title" required>
            <input class="form-control mb-2" name="sub_topics[]" placeholder="Sub Topics (comma separated)" required>
        </div>
        <button type="button" class="btn btn-secondary mb-3" onclick="addCurriculum()">Add More Curriculum</button>
        


        <h4>Pricing</h4>
        <div id="pricing-wrapper">
            <input class="form-control mb-2" name="plan_name[]" placeholder="Plan Name" required>
            <input class="form-control mb-2" name="price[]" placeholder="Price" required>
            <input class="form-control mb-2" name="price_description[]" placeholder="Price Description" required>
            <input class="form-control mb-2" name="features[]" placeholder="Features (comma separated)" required>
            <input class="form-control mb-2" name="package_link[]" placeholder="Package Link" required>
        </div>
        <button type="button" class="btn btn-secondary mb-3" onclick="addPricing()">Add More Pricing</button>

        <button class="btn btn-info w-100" type="submit" name="add_services">Add Service</button>
    </form>
</div>

<script>
function addCurriculum(){
    let wrapper = document.getElementById('curriculum-wrapper');
    wrapper.insertAdjacentHTML('beforeend', `
        <input class="form-control mb-2" name="topic_title[]" placeholder="Topic Title" required>
        <input class="form-control mb-2" name="sub_topics[]" placeholder="Sub Topics (comma separated)" required>
    `);
}

function addPricing(){
    let wrapper = document.getElementById('pricing-wrapper');
    wrapper.insertAdjacentHTML('beforeend', `
        <input class="form-control mb-2" name="plan_name[]" placeholder="Plan Name" required>
        <input class="form-control mb-2" name="price[]" placeholder="Price" required>
        <input class="form-control mb-2" name="price_description[]" placeholder="Price Description" required>
        <input class="form-control mb-2" name="features[]" placeholder="Features (comma separated)" required>
        <input class="form-control mb-2" name="package_link[]" placeholder="Package Link" required>
    `);
}
</script>

</body>
</html>
