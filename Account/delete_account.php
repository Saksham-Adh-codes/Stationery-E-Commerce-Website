<?php
session_start();
include '../PHP/connection.php';

if (isset($_SESSION['user_email'])) {
    $email = $_SESSION['user_email'];

    $query = "DELETE FROM account WHERE email='$email'";

    if (mysqli_query($conn, $query)) {
        session_destroy(); 
        echo "Account deleted successfully";
    } else {
        echo "Error deleting account";
    }
} else {
    echo "You are not logged in";
}
?>
