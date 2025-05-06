<?php
include(__DIR__ . '/../config/db.php'); // Connect to DB

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO messages (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    $stmt->execute();
    $stmt->close();

    // Send Email
    $to = "info@ltss.co.tz";
    $email_subject = "New Message from Contact Form: $subject";
    $email_body = "You have received a new message from your website contact form:\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message\n";

    $headers = "From: no-reply@ltss.co.tz\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "There was an error sending your message.";
    }
}
?>
