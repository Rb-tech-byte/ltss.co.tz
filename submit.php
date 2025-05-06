<?php
// Include the DB connection
include 'config/db.php';

// Get form data
$name    = $_POST['name'];
$email   = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Insert into database
$sql = "INSERT INTO messages (name, email, subject, message)
        VALUES ('$name', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
