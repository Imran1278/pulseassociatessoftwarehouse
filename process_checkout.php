<?php
$conn = new mysqli("localhost", "root", "", "mywebsite");

if ($conn->connect_error) {
    die("Database connection failed");
}

// Receive form data safely
$full_name       = $_POST['full_name'] ?? '';
$email           = $_POST['email'] ?? '';
$address         = $_POST['address'] ?? '';
$phone           = $_POST['phone'] ?? '';
$payment_method  = $_POST['payment_method'] ?? '';
$account_number  = $_POST['account_number'] ?? '';
$issue           = $_POST['issue'] ?? '';
$expiry          = $_POST['expiry'] ?? '';
$cvv             = $_POST['cvv'] ?? '';
$service_title = $_POST['service_title'] ?? '';
$package_title = $_POST['package_title'] ?? '';
$package_price = $_POST['package_price'] ?? '';


// SQL query
$sql = "INSERT INTO checkout_orders 
(service_title, package_title, package_price, full_name, email, address, phone,payment_method, account_number, issue, expiry, cvv)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssssssssssss",
    $service_title,
    $package_title,
    $package_price,
    $full_name,
    $email,
    $address,
    $phone,
    $payment_method,
    $account_number,
    $issue,
    $expiry,
    $cvv
);


if ($stmt->execute()) {
    echo "<script>
        alert('Thanks for payment');
        window.location.href='index.php';
    </script>";
} else {
    echo "Error: Data not saved";
}

$stmt->close();
$conn->close();
?>
