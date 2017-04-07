<?php

namespace JM\Validators\SSLCertificate\Adapters;

class Curl extends AdapterAbstract implements AdapterInterface
{
    /**
     * Interact with the given source and
     * grab the certificate.
     *
     * @param string $host
     * @param int $port
     * @return mixed
     */
    public function interact($host = '', $port = 0)
    {
        // TODO: Implement interact() method.
    }
}
