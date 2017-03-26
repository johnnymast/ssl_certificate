<?php

namespace JM\Validators\Tests\SSLCertificate;

use JM\Validators\SSLCertificate\SourceFactory;
use JM\Validators\SSLCertificate\Sources\Web;
use SourceFactoryTest;

class Test extends \PHPUnit_Framework_TestCase
{

    /**
     * Test that an InvalidHostException will be thrown if the parser could not
     * extract the scheme from the url.
     *
     * @expectedException JM\Validators\SSLCertificate\Exceptions\InvalidHostException
     */
    public function test_it_throws_invalid_host_exception_on_invalid_url()
    {
        SourceFactory::create('unknownhost.com');
    }


    /**
     * Returns that the factory throws an UnknownSourceException if the parsed
     * scheme does not match any known type.
     *
     * @expectedException JM\Validators\SSLCertificate\Exceptions\UnknownSourceException
     */
    public function test_it_throws_unknown_source_exception_on_unknown_source_mapping()
    {
        SourceFactory::create('unknownhost.com', 'bleep');
    }


    /**
     * Test that create returns an instance of Web for the https
     * schema.
     */
    public function test_it_returns_web_source_on_http()
    {
        $actual = SourceFactory::create('http://www.google.com');
        $this->assertInstanceOf(Web::class, $actual);
    }


    /**
     * Test that create returns an instance of Web for the http
     * schema.
     */
    public function test_it_returns_web_source_on_https()
    {
        $actual = SourceFactory::create('http://www.google.com');
        $this->assertInstanceOf(Web::class, $actual);
    }
}
