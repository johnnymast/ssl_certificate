<?php

namespace JM\Validators\SSLCertificate\Sources;
use JM\Validators\SSLCertificate\Host;

interface SourceInterface
{
    /**
     * Construct the source with the source
     * location.
     *
     * @param string $source
     */
    public function __construct(Host $host);

    /**
     * Load the Certificate from the given
     * source location.
     *
     * @return mixed
     */
    public function load();
}