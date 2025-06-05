<?php

// HANYA PROJECT BIASA BIARIN KELIHATAN
// KHUSUS XAMPP SUDAH SAMA

$db_host = "localhost";
$db_username = "root";
$db_password = "root123";
$db_database = "dpw";

$app_url = "http://localhost/dasar-pemrograman-web-4";

$conn = new mysqli($db_host, $db_username, $db_password, $db_database);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

function redirect_url($url = ""){
  global $app_url;
   echo "<script>location.href='" . $app_url . $url . "';</script>"; 
}
