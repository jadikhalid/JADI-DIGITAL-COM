<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/env.php';
require __DIR__ . '/phpmailer/src/Exception.php';
require __DIR__ . '/phpmailer/src/SMTP.php';
require __DIR__ . '/phpmailer/src/PHPMailer.php';

load_env(__DIR__ . '/.env');

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'invalid']);
    exit;
}

$smtpHost = env('SMTP_HOST');
$smtpUser = env('SMTP_USER');
$smtpPass = env('SMTP_PASS');
$smtpFrom = env('SMTP_FROM', $smtpUser);
$smtpTo = env('SMTP_TO', $smtpFrom);
$smtpFromName = env('SMTP_FROM_NAME', 'JADI DIGITAL');
$smtpPort = (int) env('SMTP_PORT', '587');

if ($smtpHost === null || $smtpUser === null || $smtpPass === null || $smtpFrom === null || $smtpTo === null) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'mail_config']);
    exit;
}

$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$company = trim((string) ($_POST['company'] ?? ''));
$subject = trim((string) ($_POST['subject'] ?? 'Contact'));
$message = trim((string) ($_POST['message'] ?? ''));

if ($name === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    echo json_encode(['status' => 'error', 'message' => 'validation']);
    exit;
}

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUser;
    $mail->Password = $smtpPass;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $smtpPort;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom($smtpFrom, $smtpFromName);
    $mail->addAddress($smtpTo);
    $mail->addReplyTo($email, $name);

    $mail->isHTML(true);
    $mail->Subject = 'Nouveau contact : ' . $subject;
    $mail->Body =
        '<h3>Nouveau message de ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</h3>' .
        '<p><strong>Email :</strong> ' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '</p>' .
        '<p><strong>Entreprise :</strong> ' . htmlspecialchars($company !== '' ? $company : '—', ENT_QUOTES, 'UTF-8') . '</p>' .
        '<p><strong>Message :</strong><br>' . nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')) . '</p>';
    $mail->AltBody =
        "Nouveau message de {$name}\nEmail: {$email}\nEntreprise: " .
        ($company !== '' ? $company : '—') .
        "\n\n{$message}";

    $mail->send();
    echo json_encode(['status' => 'success']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error']);
}
