<?php 
header("Content-Type: application/json");

use Simplon\Mysql\Mysql;
use Simplon\Mysql\PDOConnector;

require_once("vendor/autoload.php");

// Koneksi ke database
$pdo = new PDOConnector(
    'localhost', // server
    'root',      // user
    '',          // password
    'db_liipa'   // database
);

$pdoConn = $pdo->connect('utf8', []);
$dbConn = new Mysql($pdoConn);

// Ambil 12 data produk terbaru
$result = $dbConn->fetchRowMany("SELECT * FROM tb_produk ORDER BY id_produk DESC LIMIT 12");
$result_fix = [];

foreach ($result as $list) {
    $list = (object) $list;

    $list->detail_produk = $dbConn->fetchRow("SELECT * FROM tb_kategori WHERE id_kategori = $list->kategori_produk");

    $result_fix[] = $list;
}

// Output sebagai JSON
echo json_encode($result_fix, JSON_PRETTY_PRINT);
?>
