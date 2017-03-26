<?php

namespace JM\Validators;

use JM\Validators\SSLCertificate\SourceFactory;
use JM\Validators\SSLCertificate\Sources\Web;
use JM\Validators\SSLCertificate\Sources\SourceInterface;

class SSLCertificate
{
    protected $source = null;

    public function __construct(SourceInterface $source)
    {
        $this->source = $source;
    }

    public static function of($host = '')
    {
        $source = SourceFactory::create($host);
        return new SSLCertificate($source);
    }
}
