<?php

// HANYA PROJECT BIASA BIARIN KELIHATAN
// KHUSUS XAMPP SUDAH SAMA

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_database = "dpw";

$conn = new mysqli($db_host, $db_username, $db_password, $db_database);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
