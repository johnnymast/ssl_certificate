<?php

namespace JM\Validators\SSLCertificate\Sources;

use JM\Validators\SSLCertificate\CertInfo;

class Web extends SourceAbstract implements SourceInterface
{

    private $source = null;

    public function __construct($source = '')
    {
        $this->source = $source;
    }

    public function load()
    {
        $adapter = $this->adapter();
        $info = $adapter->interact($this->source);
        return new CertInfo($info);
    }

}
