<?php
session_start();

// Jika sudah login, kembalikan JSON, jangan redirect
if (isset($_SESSION['user_id'])) {
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(200);
    echo json_encode([
        'already' => true,
        'message' => 'Kamu sudah login.'
    ]);
    exit;
}

// Hanya endpoint login—kita kirim JSON
header('Content-Type: application/json; charset=utf-8');

// —————— Konfigurasi database ——————
$dbHost = 'localhost';
$dbName = 'db_liipa';
$dbUser = 'root';
$dbPass = '';

try {
    $pdo = new PDO(
        "mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4",
        $dbUser,
        $dbPass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'DB Connection failed: ' . $e->getMessage()]);
    exit;
}

// —————— Ambil data POST ——————
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// —————— Validasi input ——————
$errors = [];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}
if ($password === '') {
    $errors[] = 'Masukkan password Anda.';
}
if ($errors) {
    http_response_code(400);
    echo json_encode(['errors' => $errors]);
    exit;
}

// —————— Cari user dan verifikasi ——————
try {
    $stmt = $pdo->prepare('SELECT id_user, username, password FROM tb_user WHERE email = :email');
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($password, $user['password'])) {
        http_response_code(401);
        echo json_encode(['error' => 'Email atau password salah.']);
        exit;
    }

    // Login sukses
    $_SESSION['user_id']  = $user['id_user'];
    $_SESSION['username'] = $user['username'];

    http_response_code(200);
    echo json_encode([
        'message'  => 'Login Berhasil.',
        'user_id'  => $user['id_user'],
        'username' => $user['username']
    ]);
    exit;

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    exit;
}
