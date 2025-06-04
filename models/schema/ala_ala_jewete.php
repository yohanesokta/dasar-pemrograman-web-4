<?php
function generateJWT($username,$name): string {

    return  base64_encode($username). "." .base64_encode($name);
}

function verifyJWT($token): ?array {
    $parts = explode('.', $token);
    if (count($parts) !== 2) {
        return null; 
    }

    $username = base64_decode($parts[0]);
    $name = base64_decode($parts[1]);

    return [
        'username' => $username,
        'name' => $name,
    ];
}

function base64UrlDecode(string $data): ?string
{
    $urlUnsafeData = str_replace(['-', '_'], ['+', '/'], $data);
    $paddedData = str_pad($urlUnsafeData, strlen($urlUnsafeData) % 4, '=', STR_PAD_RIGHT);
    return base64_decode($paddedData);
}
function manualJwtDecode(string $jwt): ?array
{
    $parts = explode('.', $jwt);

    if (count($parts) !== 3) {
        
        return null;
    }

    $encodedHeader = $parts[0];
    $encodedPayload = $parts[1];
    $encodedSignature = $parts[2]; 

    
    $headerJson = base64UrlDecode($encodedHeader);
    $payloadJson = base64UrlDecode($encodedPayload);

    if ($headerJson === null || $payloadJson === null) {
        
        return null;
    }

    $header = json_decode($headerJson, true);
    $payload = json_decode($payloadJson, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        
        return null;
    }

    return [
        'header' => $header,
        'payload' => $payload,
        'signature' => $encodedSignature 
    ];
}

?>