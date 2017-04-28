<?php

namespace JM\Validators\SSLCertificate\Adapters;

use JM\Validators\SSLCertificate\Host;

interface AdapterInterface
{
    /**
     * Interact with the given source and
     * grab the certificate.
     *
     * @param string $host
     * @param int $port
     * @return mixed
     */
    public function interact(Host $host);
}