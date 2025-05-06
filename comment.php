<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "contact_form"); // Change if needed

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email     = $_POST['email'];
$message   = $_POST['message'];

// Insert into comments table
$sql = "INSERT INTO comment (name, email, message)
        VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "Comment submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>
