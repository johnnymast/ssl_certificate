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
        // TODO: Implement load() method.
        return new CertInfo();
    }

}
