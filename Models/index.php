<?php
require_once('../vendor/autoload.php');

try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__); 
    $dotenv->load();
   } catch (Dotenv\Exception\InvalidPathException $e) {
    die("Could not find .env file: " . $e->getMessage());
} catch (Dotenv\Exception\ValidationException $e) {
    die("Environment variable validation failed: " . $e->getMessage());
}

$conn = new mysqli($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_NAME"]);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
