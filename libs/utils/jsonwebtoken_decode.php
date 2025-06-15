<?php
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