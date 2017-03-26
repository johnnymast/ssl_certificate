<?php

namespace JM\Validators;

use JM\Validators\SSLCertificate\SourceFactory;
use JM\Validators\SSLCertificate\Sources\SourceInterface;

class Certificate
{

    protected $source = null;


    public function __construct(SourceInterface $source)
    {
        $this->source = $source;
    }


    public function getProvidedInformation()
    {
        return $this->source->load();
    }


    public static function of($host = '')
    {
        $source = SourceFactory::create($host);

        return (new Certificate($source))->getProvidedInformation();
    }
}
