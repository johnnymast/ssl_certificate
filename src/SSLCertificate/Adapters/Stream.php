<?php

namespace JM\Validators\SSLCertificate\Adapters;

use JM\Validators\SSLCertificate\Host;

class Stream extends AdapterAbstract implements AdapterInterface
{
    /**
     * Interact with the given source and
     * grab the certificate.
     *
     * @param string $host
     * @param int $port
     * @return mixed
     */
    public function interact(Host $host)
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
        $client = @stream_socket_client('ssl://'.$host->host.':'.$host->port, $errorNumber, $errorDescription, $timeout = 180, STREAM_CLIENT_CONNECT, $streamContext);
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
