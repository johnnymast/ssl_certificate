<?php

namespace JM\Validators\SSLCertificate\Sources;

use JM\Validators\SSLCertificate\CertInfo;
use JM\Validators\SSLCertificate\Host;

class Web extends SourceAbstract implements SourceInterface
{
    /**
     * @var null|string
     */
    private $host = null;

    /**
     * Construct the source with the source
     * location.
     *
     * @param Host $host
     */
    public function __construct(Host $host)
    {
        $this->host = $host;
    }

    /**
     * Load the information off the internet.
     *
     * @return \JM\Validators\SSLCertificate\CertInfo
     */
    public function load()
    {
        $adapter = $this->adapter();
        $info = $adapter->interact($this->host);

        return new CertInfo($info);
    }
}
