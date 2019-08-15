<?php
//Chave da aplicação
$key = '';

//Cabeçalho
$header = [
    'typ' => 'JWT',
    'alg' => 'HS256'
];

//Conteúdo - Payload
$payload = [
    'exp' => (new DateTime("now"))->getTimestamp(),
    'uid' => 1,
    'email' => 'foo@bar.com'
];

//JSON
$header = json_encode($header);
$payload = json_encode($payload);

//Base64
$header = base64_encode($header);
$payload = base64_encode($payload);

//Sign
$sign = hash_hmac('sha256', $header . "." . $payload, $key, true);
$sign = base64_encode($sign);

$token = $header . '.' . $payload . '.' . $sign;

print $token;