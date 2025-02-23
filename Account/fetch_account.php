<?php
session_start();
include '../PHP/connection.php';

if (isset($_SESSION['user_email'])) {
    $email = $_SESSION['user_email'];
    $query = "SELECT firstname, email,purchased_amount FROM account WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode(["firstname" => $row["firstname"], "email" => $row["email"], "purchased_amount" => $row["purchased_amount"]]);
    } else {
        echo json_encode(["error" => "User not found"]);
    }
} else {
    echo json_encode(["error" => "Not logged in"]);
}
?>
