<?php
// contact.php — API JSON untuk menerima dan mengirim email

// Hanya izinkan POST method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    header('Content-Type: text/plain');
    echo 'Method Not Allowed';
    exit;
}

// Pastikan Content-Type: application/json
if (stripos($_SERVER['CONTENT_TYPE'] ?? '', 'application/json') === false) {
    http_response_code(400);
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'error' => 'Content-Type harus application/json'
    ]);
    exit;
}

// Set header JSON output
header('Content-Type: application/json; charset=UTF-8');

// Ambil dan decode JSON body
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error'   => 'Payload bukan JSON valid.'
    ]);
    exit;
}

// Extract & validasi
$nama    = trim($data['nama']    ?? '');
$email   = trim($data['email']   ?? '');
$phone   = trim($data['phone']   ?? '');
$alamat  = trim($data['alamat']  ?? '');
$message = trim($data['message'] ?? '');

if (!$nama || !$email || !$phone || !$alamat || !$message) {
    http_response_code(422);
    echo json_encode([
        'success' => false,
        'error'   => 'Semua field (nama, email, phone, alamat, message) wajib diisi.'
    ]);
    exit;
}

// Load PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once("vendor/autoload.php");

$mail = new PHPMailer(true);
try {
    // Konfigurasi Gmail SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'kainpercaid@gmail.com';         // Ganti
    $mail->Password   = 'qwhl jncb jemp nsgk';           // App Password, bukan password biasa
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('kainpercaid@gmail.com', 'Kain Perca ID');
    $mail->addAddress('partnerships@yourcompany.com', 'Partnerships Dept.');

    $mail->isHTML(true);
    $mail->Subject = 'Permintaan Kemitraan Baru dari ' . htmlspecialchars($nama);
    $mail->Body    = "
        <h2>Permintaan Kemitraan Baru</h2>
        <p><strong>Nama:</strong> " . htmlspecialchars($nama) . "</p>
        <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
        <p><strong>No. HP:</strong> " . htmlspecialchars($phone) . "</p>
        <p><strong>Alamat:</strong> " . htmlspecialchars($alamat) . "</p>
        <p><strong>Pesan:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
    ";

    $mail->send();

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error'   => 'Mailer Error: ' . $mail->ErrorInfo
    ]);
}
