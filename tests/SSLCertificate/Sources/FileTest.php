<?php

namespace JM\Validators\Tests\SSLCertificate\Sources;


use JM\Validators\SSLCertificate\CertInfo;
use JM\Validators\SSLCertificate\Sources\File;

class FileTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_return_an_certificate() {
        $file = new File('somefile');
        $this->assertInstanceOf(CertInfo::class,  $file->load());
    }

    public function test_it_should_return_an_invalid_certificate_on_bogus_certificate() {
        $file = new File('somefile');
    }
}
