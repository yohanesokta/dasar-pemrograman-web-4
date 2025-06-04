<?php
function generateJWT($username,$name): string {

    return  base64_encode($username). "." .base64_encode($name);
}

function verifyJWT($token): ?array {
    $parts = explode('.', $token);
    if (count($parts) !== 2) {
        return null; // Invalid token format
    }

    $username = base64_decode($parts[0]);
    $name = base64_decode($parts[1]);

    return [
        'username' => $username,
        'name' => $name,
    ];
}
    