<?php
header("Content-Type: application/json; charset=UTF-8");
// tampilkan error saat development
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("vendor/autoload.php");

use Simplon\Mysql\Mysql;
use Simplon\Mysql\PDOConnector;

try {
    // 1) koneksi database
    $pdoConnector = new PDOConnector(
        'localhost', // host
        'root',      // user
        '',          // pass
        'db_liipa'   // db
    );
    $pdo = $pdoConnector->connect('utf8', []);
    $db  = new Mysql($pdo);
} catch (\Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'msg'    => 'Gagal koneksi database: ' . $e->getMessage()
    ], JSON_PRETTY_PRINT);
    exit;
}

// ambil parameter search
$searchRaw = isset($_GET['search']) ? trim($_GET['search']) : '';
if ($searchRaw === '') {
    http_response_code(400);
    echo json_encode([
        'status' => false,
        'msg'    => 'Parameter search kosong atau tidak valid'
    ], JSON_PRETTY_PRINT);
    exit;
}

// query
$sql = "
    SELECT
      p.id_produk,
      p.nama_produk,
      p.deskripsi_produk,
      p.gambar_produk,
      p.harga_produk,
      p.rating,
      p.jumlah_varian_warna,
      k.id_kategori   AS kategori_produk,
      k.nama_kategori
    FROM tb_produk p
    LEFT JOIN tb_kategori k
      ON p.kategori_produk = k.id_kategori
    WHERE p.nama_produk LIKE :search 
    ORDER BY p.id_produk DESC
";
$params = [ 'search' => '%' . $searchRaw . '%' ];

// eksekusi & fetch
try {
    $rows = $db->fetchRowMany($sql, $params);
    // pastikan $rows selalu array
    if (!is_array($rows)) {
        $rows = [];
    }
} catch (\Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'msg'    => 'Query error: ' . $e->getMessage()
    ], JSON_PRETTY_PRINT);
    exit;
}

// bentuk response
if (!empty($rows)) {   // <-- ganti count() dengan !empty()
    $result = array_map(function($r){
        return [
            'id_produk'           => $r['id_produk'],
            'nama_produk'         => $r['nama_produk'],
            'deskripsi_produk'    => $r['deskripsi_produk'],
            'gambar_produk'       => $r['gambar_produk'],
            'harga_produk'        => $r['harga_produk'],
            'rating'              => $r['rating'],
            'jumlah_varian_warna' => $r['jumlah_varian_warna'],
            'detail_produk'       => [
                'kategori_produk'   => $r['kategori_produk'],
                'nama_kategori'     => $r['nama_kategori'],
            ],
        ];
    }, $rows);

    echo json_encode([
        'status' => true,
        'result' => $result
    ], JSON_PRETTY_PRINT);
} else {
    echo json_encode([
        'status' => false,
        'msg'    => 'Tidak ditemukan produk dengan kata “' . $searchRaw . '”'
    ], JSON_PRETTY_PRINT);
}