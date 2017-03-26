<?php

namespace JM\Validators\SSLCertificate\Sources;

use JM\Validators\SSLCertificate\CertInfo;

class File implements SourceInterface
{

    private $source;


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
     * Load the Certificate from the given
     * source location.
     * @return CertInfo
     * @internal param string $source
     */
    public function load()
    {
        $content = '';
        if (file_exists($this->source)) {
            $content = file_get_contents($content);
            $info = json_decode($content);

            if (is_array($info) == true) {
                return new CertInfo($info);
            }
        }

        return new CertInfo;
    }

}