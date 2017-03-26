<?php

namespace JM\Validators;

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
        // TODO: write logic here
        return new SSLCertificate(new Web($host));
    }
}
