<?php

namespace JM\Validators\Tests\SSLCertificate;

use JM\Validators\SSLCertificate\UrlParser;

class UrlParserTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test that URLParser parses the right Schema.
     */
    public function test_it_returns_the_right_schema() {
        $parser = new UrlParser('ssl://google.com');
        $expected = 'ssl';
        $actual = $parser->getType();
        $this->assertEquals($expected, $actual);
    }


    /**
     * Test that URLParser returns true on isValid and
     * false on invalid urls.
     */
    public function test_it_tells_the_truth_about_is_valid() {
        $parser = new UrlParser('ssl://google.com');
        $this->assertTrue($parser->isValid());

        $parser = new UrlParser('google.com');
        $this->assertFalse($parser->isValid());
    }
}
