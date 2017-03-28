<?php

namespace JM\Validators\SSLCertificate\Adapters;

class Stream extends AdapterAbstract implements AdapterInterface
{

    public function interact($host = '', $port = 0)
    {
        $streamContext = stream_context_create([
            'ssl' => [
                'capture_peer_cert' => true,
            ],
        ]);

        $client = stream_socket_client($host,
            $errorNumber,
            $errorDescription,
            $timeout = 180,
            STREAM_CLIENT_CONNECT,
            $streamContext);

        $response = stream_context_get_params($client);
        $certificateProperties = openssl_x509_parse($response['options']['ssl']['peer_certificate']);

        return $certificateProperties;
    }
}
