<?php
include 'connection.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM account WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_name'] = $row['firstname'];
        $_SESSION['user_id']= $row['id'];
        echo "success:" . $row['firstname'];
    } else {
        echo "error";
    }
}
?>
