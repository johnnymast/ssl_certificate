<?php

namespace JM\Validators\SSLCertificate\Sources;

use JM\Validators\SSLCertificate\CertInfo;

class Web implements SourceInterface
{

    private $source = null;


    public function __construct($source = '')
    {
        $this->source = $source;
    }


    public function load()
    {
        // Step 1: downloading the certificate from the site
        $streamContext = stream_context_create([
            'ssl' => [
                'capture_peer_cert' => true,
            ],
        ]);

        $client = stream_socket_client($this->source.':443', $errorNumber, $errorDescription, $timeout = 180,
            STREAM_CLIENT_CONNECT, $streamContext);

        $response = stream_context_get_params($client);
        $certificateProperties = openssl_x509_parse($response['options']['ssl']['peer_certificate']);
        print_r($certificateProperties);
        return new CertInfo($certificateProperties);
    }

}
