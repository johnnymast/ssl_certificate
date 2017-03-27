<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

// Step 1: downloading the certificate from the site
$streamContext = stream_context_create([
    'ssl' => [
        'capture_peer_cert' => true,
    ],
]);

$client = stream_socket_client(
    "ssl://imap.gmail.com:993",
    $errorNumber,
    $errorDescription,
    $timeout= 180,
    STREAM_CLIENT_CONNECT,
    $streamContext);

$response = stream_context_get_params($client);

$certificateProperties = openssl_x509_parse($response['options']['ssl']['peer_certificate']);

print_r($certificateProperties);

$json = json_encode($certificateProperties);
file_put_contents('cert.json', $json);