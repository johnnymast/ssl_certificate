<?php

namespace JM\Validators\SSLCertificate;

/**
 * Return information about a a
 * given url.
 *
 * @package JM\Validators
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
     * UrlParser constructor.
     *
     * @param string $url
     */
    public function __construct($url)
    {
        $this->url = $url;
        $this->information = parse_url($this->url);
    }


    /**
     * Validate the url could be parsed correctly.
     *
     * @return bool
     */
    public function isValid()
    {
        return ($this->information !== false
            && isset($this->information['scheme']) == true
            && empty($this->information['scheme']) == false);
    }


    /**
     * Return information about the url scheme.
     *
     * @return string
     */
    public function getType()
    {
        return (isset($this->information['scheme'])) ? $this->information['scheme'] : 'unknown';
    }
}