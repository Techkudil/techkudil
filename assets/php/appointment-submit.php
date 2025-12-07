<?php
header('Content-Type: application/json');

// Simple validation
if (empty($_POST['service']) || empty($_POST['phone']) && empty($_POST['email'])) {
    echo json_encode(["status" => "error", "message" => "Missing fields"]);
    exit;
}

$name     = $_POST['name'] ?? '';
$email    = $_POST['email'] ?? '';
$phone    = $_POST['phone'] ?? '';
$service  = $_POST['service'] ?? '';
$date     = $_POST['date'] ?? '';

// RECEIVING EMAIL (your shop email)
$to = "mytechkudil@gmail.com";

// Email subject
$subject = "New Service Appointment - Techkudil";

// Email message
$message = "
New Appointment Request from Techkudil Website

Name: $name
Email: $email
Phone: $phone
Service: $service
Preferred Date: $date
";

// Headers
$headers  = "From: Techkudil <no-reply@techkudil.com>\r\n";
$headers .= "Reply-To: $email\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Mail failed"]);
}
