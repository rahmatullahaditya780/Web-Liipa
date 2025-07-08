<?php
// Autoload & import harus di atas
require_once("vendor/autoload.php");

use Simplon\Mysql\PdoConnector;
use Simplon\Mysql\Mysql;

// Kirim header JSON
header('Content-Type: application/json');

try {
    // 1) Koneksi database
    $pdoConnector = new PdoConnector(
        'localhost', // host
        'root',      // user
        '',          // pass
        'db_liipa'   // db
    );

    // 2) Buat PDO + Mysql instance
    $pdo = $pdoConnector->connect('utf8', []);
    $db  = new Mysql($pdo);

} catch (\Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'msg'    => 'Gagal koneksi database: ' . $e->getMessage(),
    ], JSON_PRETTY_PRINT);
    exit;
}

// Tangkap parameter kategori (jika ada)
$kategori = $_GET['kategori'] ?? null;

try {
    // 3) Bangun query
    $sql = "
        SELECT 
            p.id_produk, 
            p.nama_produk,
            p.deskripsi_produk,
            p.gambar_produk,
            p.harga_produk,
            p.rating,
            p.jumlah_varian_warna,
            k.id_kategori,
            k.nama_kategori
        FROM tb_produk p
        JOIN tb_kategori k ON p.kategori_produk = k.id_kategori
    ";
    $params = [];

    if (!empty($kategori)) {
        $sql .= " WHERE k.nama_kategori = :kategori";
        $params['kategori'] = $kategori;
    }

    // 4) Eksekusi dan fetch
    $rows = $db->fetchRowMany($sql, $params);

    // 5) Format hasil
    $result = array_map(function ($r) {
        return [
            'id_produk'           => $r['id_produk'],
            'nama_produk'         => $r['nama_produk'],
            'deskripsi_produk'    => $r['deskripsi_produk'],
            'gambar_produk'       => $r['gambar_produk'],
            'harga_produk'        => $r['harga_produk'],
            'rating'              => $r['rating'],
            'jumlah_varian_warna' => $r['jumlah_varian_warna'],
            'detail_produk'       => [
                'id_kategori'   => $r['id_kategori'],
                'nama_kategori' => $r['nama_kategori'],
            ],
        ];
    }, $rows);

    // 6) Output JSON
    echo json_encode([
        'status' => true,
        'result' => $result,
    ], JSON_PRETTY_PRINT);

} catch (\Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'msg'    => 'Terjadi kesalahan: ' . $e->getMessage(),
    ], JSON_PRETTY_PRINT);
}
