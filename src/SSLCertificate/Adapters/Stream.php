<?php

namespace JM\Validators\SSLCertificate\Adapters;

class Stream extends AdapterAbstract implements AdapterInterface
{

    public function interact($host = '', $port = 0)
    {
        $streamContext = stream_context_create([
            'ssl' => [
                'capture_peer_cert' => true,
                'verify_peer' => false,
            ],
        ]);
        if (! $streamContext) {
            return false;
        }

        // creates errors
        $client = @stream_socket_client($host,
            $errorNumber,
            $errorDescription,
            $timeout = 180,
            STREAM_CLIENT_CONNECT,
            $streamContext);
        if (! $client) {
            return false;
        }
        $response = @stream_context_get_params($client);
        if (! $response) {
            return false;
        }

        return openssl_x509_parse($response['options']['ssl']['peer_certificate']);
    }
}
