<?php
// api/filter_products.php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *"); // kalau perlu CORS

use Simplon\Mysql\Mysql;
use Simplon\Mysql\PDOConnector;

require_once("vendor/autoload.php");

// 1) Ambil parameter category_id (INT), default null artinya semua
$categoryId = isset($_GET['category_id']) && is_numeric($_GET['category_id'])
    ? (int) $_GET['category_id']
    : null;

// 2) Koneksi ke database
try {
    $pdoConnector = new PDOConnector(
        'localhost',  // host
        'root',       // user
        '',           // password
        'db_liipa'    // schema
    );
    $pdoConn = $pdoConnector->connect('utf8', []);
    $dbConn  = new Mysql($pdoConn);
} catch (\Exception $e) {
    http_response_code(500);
    echo json_encode([
      'error'   => 'Database connection failed',
      'message' => $e->getMessage()
    ]);
    exit;
}

// 3) Build SQL dengan JOIN ke tb_kategori
try {
    if ($categoryId === null) {
        // Semua produk
        $sql    = "
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
          FROM tb_produk AS p
          JOIN tb_kategori AS k
            ON p.kategori_produk = k.id_kategori
          ORDER BY p.id_produk DESC
        ";
        $params = [];
    } else {
        // Hanya produk di kategori tertentu
        $sql    = "
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
          FROM tb_produk AS p
          JOIN tb_kategori AS k
            ON p.kategori_produk = k.id_kategori
          WHERE p.kategori_produk = :catId
          ORDER BY p.id_produk DESC
        ";
        $params = ['catId' => $categoryId];
    }

    $products = $dbConn->fetchRowMany($sql, $params);

    // 4) Kirim hasil
    echo json_encode($products);

} catch (\Exception $e) {
    http_response_code(500);
    echo json_encode([
      'error'   => 'Query error',
      'message' => $e->getMessage()
    ]), JSON_PRETTY_PRINT;
    exit;
}
