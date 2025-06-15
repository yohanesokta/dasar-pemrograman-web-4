<?php
require_once(__DIR__."/autoload.php");


// HANYA PROJECT BIASA BIARIN KELIHATAN
// KHUSUS XAMPP SUDAH SAMA

$db_host = $_ENV['DB_HOST'] ?? "localhost";
$db_username = $_ENV['DB_USERNAME'] ?? "root";
$db_password = $_ENV["DB_PASSWORD"] ?? "";
$db_database = $_ENV["DB_DATABASE"] ?? "dpw";

$app_url = $_ENV["APP_URL"];

$conn = new mysqli($db_host, $db_username, $db_password, $db_database);

if ($conn->connect_error) {
  die("Koneksi gagal: setting .env dengan benar woy!" . $conn->connect_error);
} else {
  
}

function redirect_url($url = ""){
  global $app_url;
   echo "<script>location.href='" . $app_url . $url . "';</script>"; 
}
