<?php

namespace JM\Validators\SSLCertificate\Sources;

use JM\Validators\SSLCertificate\CertInfo;

class File extends SourceAbstract implements SourceInterface
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
        $this->source = substr($source, 7);
    }


    /**
     * Load the Certificate from the given
     * source location.
     *
     * @return CertInfo
     * @internal param string $source
     */
    public function load()
    {
        if (file_exists($this->source)) {

            $content = file_get_contents($this->source);
            $info = json_decode($content);

            if (is_array($info) === true) {
                return new CertInfo($info);
            }
        }
        return new CertInfo;
    }

}