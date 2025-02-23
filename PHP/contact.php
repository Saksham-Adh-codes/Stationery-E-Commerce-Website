<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (!empty($name) && !empty($email) && !empty($message)) {
        $query = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";
        if (mysqli_query($conn, $query)) {
            echo "<script>window.location.href = '../contact.html'; alert('Message sent successfully!');</script>";
        } else {
            echo "<script>window.location.href = '../contact.html'; alert('Error sending message!');</script>";
        }
    } else {
        echo "<script>window.location.href = '../contact.html'; alert('All fields are required!');</script>";
    }
}
?>
