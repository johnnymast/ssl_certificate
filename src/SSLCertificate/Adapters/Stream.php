<?php

namespace JM\Validators\SSLCertificate\Adapters;

use JM\Validators\SSLCertificate\Host;
use PhpSpec\Exception\Exception;

class Stream extends AdapterAbstract implements AdapterInterface
{
    /**
     * Interact with the given source and
     * grab the certificate.
     *
     * @param Host $host
     * @return mixed
     */
    public function interact(Host $host)
    {
        $contextOptions = [
            'capture_peer_cert' => true,
            'verify_peer' => true,
            'allow_self_signed' => true,

        ];

        // SINI ?
        if ($this->verificationMethod == self::VERIFY_COMMON_NAME_AND_MATCHES_HOST) {
            $contextOptions['verify_peer_name'] = true;
        }

       $streamContext = stream_context_create([
            'ssl' => $contextOptions,
        ]);

        if (! $streamContext) {
            return false;
        }

        $client = @stream_socket_client('ssl://'.$host->host.':'.$host->port, $errno, $errstr, $this->timeout, STREAM_CLIENT_CONNECT, $streamContext);


        if (! $client) {
            return false;
        }

        // if client
        $response = stream_context_get_params($client);

        if (is_array($response))
            return openssl_x509_parse($response['options']['ssl']['peer_certificate']);

        return false;
    }
}
