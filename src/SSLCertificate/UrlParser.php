<?php

namespace JM\Validators\SSLCertificate;

/**
 * Return information about a a
 * given url.
 *
 * @package JM\Validators
 */

/**
 * Class UrlParser
 * @package JM\Validators\SSLCertificate
 */
class UrlParser
{

    /**
     * Parsed information about the url.
     *
     * @var mixed|null
     */
    protected $information = null;

    /**
     * @var string
     */
    protected $type = '';

    /**
     * The parsed host
     * @var Host
     */
    protected $host = null;


    /**
     * UrlParser constructor.
     *
     * @param string $url
     */
    public function __construct($url)
    {
        // Make sure we have a schema ..

        $this->url = $url;
        $this->host = new Host(parse_url($this->url));
    }


    /**
     * Validate the url could be parsed correctly.
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->host->isValid();
    }


    /**
     * Return information about the url scheme.
     *
     * @return string
     */
    public function getType()
    {
        return $this->host->scheme ? $this->host->scheme : 'unknown';
    }


    /**
     * @return Host
     */
    public function getHost()
    {
        return $this->host;
    }
}