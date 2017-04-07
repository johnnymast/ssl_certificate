<?php

namespace JM\Validators\SSLCertificate\Sources;

interface SourceInterface
{
    /**
     * Construct the source with the source
     * location.
     *
     * @param string $source
     */
    public function __construct($source = '');

    /**
     * Load the Certificate from the given
     * source location.
     *
     * @return mixed
     */
    public function load();
}