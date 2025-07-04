<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// process-form.php
// Handles all form submissions and sends email via SMTP

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'lib/PHPMailer/src/Exception.php';
require 'lib/PHPMailer/src/PHPMailer.php';
require 'lib/PHPMailer/src/SMTP.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = 'joshualotha@gmsafaris.co.tz';
    $subject = 'New Inquiry from GMSafaris Website';
    $fields = '';
    foreach ($_POST as $key => $value) {
        $fields .= ucfirst($key) . ": " . htmlspecialchars($value) . "\n";
    }
    $body = "You have received a new inquiry from the website:\n\n" . $fields;

    $mail = new PHPMailer(true);
    try {
        // SMTP config
        $mail->isSMTP();
        $mail->Host = 'mail.gmsafaris.co.tz';
        $mail->SMTPAuth = true;
        $mail->Username = 'joshualotha@gmsafaris.co.tz';
        $mail->Password = 'Mrrobot49.'; // <-- Updated with actual password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('no-reply@gmsafaris.co.tz', 'GMSafaris Website');
        $mail->addAddress('joshualotha@gmsafaris.co.tz');
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        echo json_encode(['success' => true, 'message' => 'Your inquiry has been sent successfully!']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Mailer Error: ' . $mail->ErrorInfo]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
} 