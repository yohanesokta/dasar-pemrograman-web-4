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

echo $_ENV['API_KEY'];