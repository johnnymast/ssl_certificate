<?php

namespace JM\Validators\SSLCertificate;

use JM\Validators\SSLCertificate\Exceptions\InvalidHostException;
use JM\Validators\SSLCertificate\Exceptions\UnknownSourceException;
use JM\Validators\SSLCertificate\Sources\Web;

class SourceFactory
{

    /**
     * @var array
     */
    protected static $map = [
        'http' => Web::class,
        'https' => Web::class,
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

        if ( ! isset(self::$map[$sourceType])) {
            throw new UnknownSourceException('Unknown source type for '.$sourceType);
        }

        return new self::$map[$sourceType];
    }
}
