<?php
include 'connection.php'; 

$sql_account = "CREATE TABLE IF NOT EXISTS account (
    id INT(4) AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(20) NOT NULL,
    lastname VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    confirm_password VARCHAR(50) NOT NULL,
    purchased_amount DECIMAL(10, 2) DEFAULT 0.00
)";

if ($conn->query($sql_account) === TRUE) {
    echo "Table 'account' created successfully!<br>";
} else {
    echo "Error creating account table: " . $conn->error;
}

$sql_feedback = "CREATE TABLE IF NOT EXISTS feedback (
    id INT(4) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    message TEXT NOT NULL
)";

if ($conn->query($sql_feedback) === TRUE) {
    echo "Table 'feedback' created successfully!<br>";
} else {
    echo "Error creating feedback table: " . $conn->error;
}

$conn->close(); 
?>
