<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Portfolio";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Prepare and execute SQL query using prepared statements
$stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $subject, $message);

if ($stmt->execute()) {
    echo "Message submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();
?>
