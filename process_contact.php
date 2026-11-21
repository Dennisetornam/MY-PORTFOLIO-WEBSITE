<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once __DIR__ . '/includes/config.php';

header('Content-Type: application/json');

// Check if the request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';


    // Validate inputs
    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(['success' => false, 'message' => 'Please fill all required fields']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email format']);
        exit;
    }

    // Email configuration
    $to = "etor2004.dennis@gmail.com";
    $subject = "New Contact Form Submission from Portfolio";

    // Prepare email content
    $email_content = "You have received a new message from your portfolio website.\n\n";
    $email_content .= "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // If PHPMailer (Composer) is available, use it. Otherwise fall back to mail().
    if (file_exists(__DIR__ . '/vendor/autoload.php')) {
        require __DIR__ . '/vendor/autoload.php';

        $mail = new PHPMailer(true);
        try {
            if (defined('MAILER_SMTP_HOST') && MAILER_SMTP_HOST) {
                $mail->isSMTP();
                $mail->Host = MAILER_SMTP_HOST;
                $mail->Port = MAILER_SMTP_PORT;
                $mail->SMTPAuth = !empty(MAILER_SMTP_USER);
                if ($mail->SMTPAuth) {
                    $mail->Username = MAILER_SMTP_USER;
                    $mail->Password = MAILER_SMTP_PASS;
                }
                // Set encryption if provided
                if (defined('MAILER_SMTP_SECURE') && MAILER_SMTP_SECURE === 'ssl') {
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                } elseif (defined('MAILER_SMTP_SECURE') && MAILER_SMTP_SECURE === 'tls') {
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                }
            }

            // Use site-controlled From address and set Reply-To to the user
            $fromEmail = defined('MAIL_FROM') ? MAIL_FROM : 'no-reply@yourdomain.com';
            $fromName = defined('MAIL_FROM_NAME') ? MAIL_FROM_NAME : 'Portfolio';

            $mail->setFrom($fromEmail, $fromName);
            $mail->addAddress($to);
            $mail->addReplyTo($email, $name);

            $mail->Subject = $subject;
            $mail->Body = $email_content;

            $mail->send();
            echo json_encode(['success' => true, 'message' => 'Message sent successfully']);
        } catch (Exception $e) {
            error_log('PHPMailer error: ' . $mail->ErrorInfo);
            echo json_encode(['success' => false, 'message' => 'Failed to send message. Please try again later.']);
        }
    } else {
        // Fallback to PHP mail() using a safe From header (site address)
        $headers = "From: no-reply@yourdomain.com\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        if (mail($to, $subject, $email_content, $headers)) {
            echo json_encode(['success' => true, 'message' => 'Message sent (mail)']);
        } else {
            error_log('mail() failed and PHPMailer not available');
            echo json_encode(['success' => false, 'message' => 'Mailer not configured on server']);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
