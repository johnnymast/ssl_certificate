<?php

namespace JM\Validators\SSLCertificate;

use JM\Validators\SSLCertificate\Exceptions\InvalidHostException;
use JM\Validators\SSLCertificate\Exceptions\UnknownSourceException;
use JM\Validators\SSLCertificate\Sources\File;
use JM\Validators\SSLCertificate\Sources\SourceInterface;
use JM\Validators\SSLCertificate\Sources\Web;

class SourceFactory
{

    /**
     * @var array
     */
    protected static $map = [
        'http'  => Web::class,
        'https' => Web::class,
        'file'  => File::class,
    ];


    /**
     * @param string $url
     * @param null   $of_type
     *
     * @return mixed
     * @throws InvalidHostException
     * @throws UnknownSourceException
     */
    public static function create($url = '', $of_type = null)
    {
        $parser = new UrlParser($url);
        $sourceType = $parser->getType();

        if ($of_type != null) {
            $sourceType = $of_type;
        } else {
            if ( ! $parser->isValid()) {
                throw new InvalidHostException('Protocol for '.$url.' could not be determined');
            }
        }

        $source = self::getMapping($sourceType);

        if ( ! $source) {
            throw new UnknownSourceException('Unknown source type for '.$sourceType);
        }

        $instance = new $source($url);

        if ( ! $instance instanceof SourceInterface) {
            throw new UnknownSourceException('Source '.$source.' did not implement SourceInterface');
        }

        return $instance;
    }


    /**
     * Add a new Custom mapping to the factory. This can be used
     * to add your own custom sources.
     *
     * @param string $scheme
     * @param string $source
     */
    public static function addMapping($scheme = '', $source = '')
    {
        self::$map[$scheme] = $source;
    }


    /**
     * Return a source for a scheme.
     *
     * @param string $scheme
     *
     * @return bool|mixed
     */
    public static function getMapping($scheme = '')
    {
        return (isset(self::$map[$scheme])) ? self::$map[$scheme] : false;
    }
}
