<?php

namespace JM\Validators;

use JM\Validators\SSLCertificate\SourceFactory;
use JM\Validators\SSLCertificate\Sources\SourceInterface;

class Certificate
{

    /**
     * This is the source for the
     * certificate.
     *
     * @var SourceInterface|null
     */
    protected $source = null;


    /**
     * Construct the class with a source
     * to read the certificate from.
     *
     * @param SourceInterface $source
     */
    public function __construct(SourceInterface $source)
    {
        $this->source = $source;
    }


    /**
     * Get information about the Certificate.
     * @return mixed
     */
    public function getProvidedInformation()
    {
        return $this->source->load();
    }


    /**
     * Of as in Certificate of ..
     * Just pass a host / url to get the certificate
     * from.
     *
     * @param string $host
     *
     * @return mixed
     * @throws SSLCertificate\Exceptions\InvalidHostException
     * @throws SSLCertificate\Exceptions\UnknownSourceException
     */
    public static function of($host = '')
    {
        $source = SourceFactory::create($host);

        return (new Certificate($source))->getProvidedInformation();
    }
}
