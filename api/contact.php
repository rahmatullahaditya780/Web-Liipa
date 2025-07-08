<?php
// Set header agar merespons dalam format JSON
header('Content-Type: application/json');

// Autoload PHPMailer (gunakan Composer)
require_once("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Ambil dan decode JSON dari request body
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

// Validasi data
if (
    !isset($data['name']) || empty(trim($data['name'])) ||
    !isset($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL) ||
    !isset($data['subject']) || empty(trim($data['subject'])) ||
    !isset($data['message']) || empty(trim($data['message']))
) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Data tidak lengkap atau email tidak valid.']);
    exit;
}

// Siapkan data
$name = htmlspecialchars(trim($data['name']));
$email = htmlspecialchars(trim($data['email']));
$subject = htmlspecialchars(trim($data['subject']));
$message = nl2br(htmlspecialchars(trim($data['message'])));

$mail = new PHPMailer(true);

try {
    // Konfigurasi SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;
    $mail->Username   = 'kainpercaid@gmail.com'; 
    $mail->Password   = 'qwhl jncb jemp nsgk';   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Pengirim & Penerima
    $mail->setFrom($email, $name);
    $mail->addAddress('kainpercaid@gmail.com', 'Admin Liipa'); // Ganti dengan penerima email

    // Konten email
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = "
        <strong>Nama:</strong> {$name}<br>
        <strong>Email:</strong> {$email}<br>
        <strong>Pesan:</strong><br>{$message}
    ";
    $mail->AltBody = strip_tags("Nama: $name\nEmail: $email\nPesan:\n$message");

    // Kirim email
    $mail->send();

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => "Pesan tidak terkirim. Mailer Error: {$mail->ErrorInfo}"]);
}
