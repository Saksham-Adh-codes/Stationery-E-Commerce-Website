<?php
include 'server.php'; 

$dbname = "stationery_ecommerce";
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully!<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close(); 
?>
