<?php

echo "=============================================\n";
echo "        SETUP SCHEMA SCRIPT\n";
echo "=============================================\n";
echo "Warning! Skrip ini akan menghapus semua tabel jika database sudah ada.\n";

require_once(__DIR__."/libs/autoload.php");

$db_host = $_ENV['DB_HOST'] ?? "localhost";
$db_username = $_ENV['DB_USERNAME'] ?? "root";
$db_password = $_ENV["DB_PASSWORD"] ?? "";
$db_database = $_ENV["DB_DATABASE"] ?? "dpw";

$conn = new mysqli($db_host, $db_username, $db_password);
if ($conn->connect_error) {
    die("Koneksi GAGAL: " . $conn->connect_error . ". Pastikan konfigurasi .env sudah benar dan server MySQL berjalan.\n");
}
echo "Koneksi ke server MySQL berhasil.\n";

if ($conn->select_db($db_database)) {
    echo "Database '{$db_database}' ditemukan. Memulai proses penghapusan semua tabel...\n";
    
    $conn->query("SET FOREIGN_KEY_CHECKS = 0");

    $result = $conn->query("SHOW TABLES");
    $tables = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $tables[] = $row[0];
        }

        foreach ($tables as $table) {
            echo "Menghapus tabel '{$table}'...";
            if ($conn->query("DROP TABLE `{$table}`")) {
                echo " [OK]\n";
            } else {
                echo " [GAGAL: " . $conn->error . "]\n";
            }
        }
        echo "Semua tabel berhasil dihapus.\n";
    } else {
        echo "Database '{$db_database}' kosong, tidak ada tabel untuk dihapus.\n";
    }
    
    $conn->query("SET FOREIGN_KEY_CHECKS = 1");

} else {
    echo "Database '{$db_database}' tidak ditemukan. Membuat database baru...\n";
    
    $sql_create_db = "CREATE DATABASE `{$db_database}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    
    if ($conn->query($sql_create_db) === TRUE) {
        echo "Database '{$db_database}' berhasil dibuat.\n";
    } else {
        echo "GAGAL membuat database: " . $conn->error . "\n";
    }
}

$conn->close();
echo "=============================================\n";

echo "Migrating Schema Database\n";

require_once(__DIR__."/libs/schema/index.php");

echo "=============================================\n";
echo "Proses setup selesai.\n";
echo "=============================================\n";

?>