<?php
session_start();

// Kalau sudah login, kirim JSON already
if (isset($_SESSION['user_id'])) {
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(200);
    echo json_encode([
        'already'  => true,
        'message'  => 'Kamu sudah login.',
        'redirect' => '../index.php'
    ]);
    exit;
}

// Untuk response AJAX JSON
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/vendor/autoload.php';
use Simplon\Mysql\PDOConnector;
use Simplon\Mysql\Mysql;

// —————— Koneksi database ——————
try {
    $connector = new PDOConnector(
        'localhost', // host
        'root',      // user
        '',          // pass
        'db_liipa'   // db
    );
    /** @var \PDO $pdo */
    $pdo = $connector->connect('utf8', []);
} catch (\Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error'   => 'Gagal koneksi database: ' . $e->getMessage()
    ], JSON_PRETTY_PRINT);
    exit;
}

// —————— Ambil & sanitasi input ——————
$username       = trim($_POST['username'] ?? '');
$email          = trim($_POST['email'] ?? '');
$password       = $_POST['password'] ?? '';
$repeatPassword = $_POST['repeat-password'] ?? '';

// —————— Validasi input dasar ——————
$errors = [];
if ($username === '') {
    $errors[] = 'Username harus diisi.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}
if (strlen($password) < 6) {
    $errors[] = 'Password harus 6 karakter atau lebih.';
}
if ($password !== $repeatPassword) {
    $errors[] = 'Password tidak sesuai.';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'errors' => $errors
    ], JSON_PRETTY_PRINT);
    exit;
}

// —————— Cek duplikasi username/email ——————
try {
    $stmt = $pdo->prepare('
        SELECT 1
        FROM tb_user
        WHERE username = :username OR email = :email
        LIMIT 1
    ');
    $stmt->execute([
        ':username' => $username,
        ':email'    => $email,
    ]);
    if ($stmt->fetch()) {
        http_response_code(409);
        echo json_encode([
            'duplicate' => true,
            'message'   => 'Username atau email sudah terdaftar.',
            'redirect'  => '../Login-SignUp-Liipa/login.php'
        ], JSON_PRETTY_PRINT);
        exit;
    }
} catch (\PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Gagal memeriksa duplikasi: ' . $e->getMessage()
    ], JSON_PRETTY_PRINT);
    exit;
}

// —————— Hash password dan simpan ——————
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare('
        INSERT INTO tb_user (username, password, email)
        VALUES (:username, :password, :email)
    ');
    $stmt->execute([
        ':username' => $username,
        ':password' => $hashedPassword,
        ':email'    => $email,
    ]);

    http_response_code(201);
    echo json_encode([
        'message'  => 'Berhasil membuat akun.',
        'redirect' => '../Login-SignUp-Liipa/login.php'
    ], JSON_PRETTY_PRINT);

} catch (\PDOException $e) {
    // Fallback kalau constraint DB terpicu
    if ($e->getCode() === '23000') {
        http_response_code(409);
        echo json_encode([
            'duplicate' => true,
            'message'   => 'Username atau email sudah terdaftar.',
            'redirect'  => '../Login-SignUp-Liipa/login.php'
        ], JSON_PRETTY_PRINT);
    } else {
        http_response_code(500);
        echo json_encode([
            'error' => 'DB Error: ' . $e->getMessage()
        ], JSON_PRETTY_PRINT);
    }
    exit;
}
