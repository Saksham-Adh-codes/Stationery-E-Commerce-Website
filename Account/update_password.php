<?php
session_start();
include '../PHP/connection.php';

if (isset($_SESSION['user_email']) && isset($_POST['currentPassword']) && isset($_POST['newPassword'])) {
    $email = $_SESSION['user_email'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];

    $checkQuery = "SELECT * FROM account WHERE email='$email' AND password='$currentPassword' AND confirm_password='$currentPassword'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $updateQuery = "UPDATE account SET password='$newPassword', confirm_password='$newPassword' WHERE email='$email'";
        if (mysqli_query($conn, $updateQuery)) {
            echo "Password updated successfully";
        } else {
            echo "Error updating password";
        }
    } else {
        echo "Incorrect current password";
    }
} else {
    echo "Invalid request";
}
?>