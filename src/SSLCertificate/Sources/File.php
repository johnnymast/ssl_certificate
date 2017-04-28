<?php

namespace JM\Validators\SSLCertificate\Sources;

use JM\Validators\SSLCertificate\CertInfo;
use JM\Validators\SSLCertificate\Host;

class File extends SourceAbstract implements SourceInterface
{
    /**
     * @var Host
     */
    private $host;


    /**
     * Construct the source with the source
     * location.
     *
     * @param string $source
     */
    public function __construct(Host $host)
    {
        $this->host = $host;
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
        if (file_exists($this->host->host)) {

            $content = file_get_contents($this->host->host);
            $info = json_decode($content);

            if (is_array($info) === true) {
                return new CertInfo($info);
            }
        }
        return new CertInfo;
    }

}