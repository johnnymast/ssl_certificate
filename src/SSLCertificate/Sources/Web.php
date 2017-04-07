<?php

namespace JM\Validators\SSLCertificate\Sources;

use JM\Validators\SSLCertificate\CertInfo;

class Web extends SourceAbstract implements SourceInterface
{
    /**
     * @var null|string
     */
    private $source = null;

    /**
     * Construct the source with the source
     * location.
     *
     * @param string $source
     */
    public function __construct($source = '')
    {
        $this->source = $source;
    }

    /**
     * Load the information off the internet.
     *
     * @return \JM\Validators\SSLCertificate\CertInfo
     */
    public function load()
    {
        $adapter = $this->adapter();
        $info = $adapter->interact($this->source);

        return new CertInfo($info);
    }
}
