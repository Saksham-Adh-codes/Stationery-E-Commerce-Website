<?php
session_start();
include '../PHP/connection.php';

if (isset($_SESSION['user_email']) && isset($_POST['newEmail'])) {
    $currentEmail = $_SESSION['user_email'];
    $newEmail = $_POST['newEmail'];

    $checkQuery = "SELECT * FROM account WHERE email='$newEmail'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "Error: Email is already in use.";
        exit();
    }
    
    $query = "UPDATE account SET email='$newEmail' WHERE email='$currentEmail'";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION['user_email'] = $newEmail; 
        echo "Email updated successfully";
    } else {
        echo "Error updating email";
    }
} else {
    echo "Invalid request";
}
?>
