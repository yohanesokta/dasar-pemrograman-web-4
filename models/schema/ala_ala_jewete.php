<?php
function generateJWT(){
    // This function generates a JWT token for demonstration purposes.
    // In a real application, you should use a library to handle JWT creation and validation.
    // This is a simple example and does not include error handling or validation.
    $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
    $payload = json_encode(['iss' => 'contoh aja', 'exp' => time() + 3600, 'sub' => time()]);
    $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
    $signature = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", 'your-secret-key', true);
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
    return "$base64UrlHeader.$base64UrlPayload.$base64UrlSignature";
}