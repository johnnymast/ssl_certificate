<?php

namespace JM\Validators\Tests\SSLCertificate\Sources;
use JM\Validators\SSLCertificate\CertInfo;
use JM\Validators\SSLCertificate\Sources\Web;

class WebTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test that loading from the Web source returns
     * a CertInfo object.
     */
    public function test_it_should_return_an_certificate()
    {
        $web = new Web('somefile');
        $this->assertInstanceOf(CertInfo::class, $web->load());
    }

    /**
     * Test that loading from a File source returns a certificate, even if this
     * certificate is not valid.
     */
    public function test_it_should_return_an_invalid_certificate_on_bogus_certificate()
    {
        $web = new Web('somesource');
        $cert = $web->load();
        $this->assertInstanceOf(CertInfo::class, $cert);
    }


    /**
     * Test that the default instance of an empty certificate states that it
     * is in fact invalid.
     *
     */
    public function test_an_invalid_source_location_returns_an_invalid_certificate()
    {
        $web = new Web('somesource');
        $cert = $web->load();
        $this->assertFalse($cert->isValid());
    }

}
