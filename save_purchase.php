<?php
session_start();
include 'PHP/connection.php';

if (!isset($_POST['totalAmount'])) {
    echo "No total amount received.";
    exit();
}

$email = mysqli_real_escape_string($conn, $_SESSION['user_email']);
$totalAmount = floatval($_POST['totalAmount']);

if ($totalAmount <= 0) {
    echo "Invalid purchase amount.";
    exit();
}

$query = "UPDATE account SET purchased_amount = purchased_amount + $totalAmount WHERE email = '$email'";

if (mysqli_query($conn, $query)) {
    echo "success";
} else {
    echo "Error updating purchase amount: " . mysqli_error($conn);
}
?>
