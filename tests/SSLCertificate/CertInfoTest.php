<?php

namespace JM\Validators\Tests\SSLCertificate;

use JM\Validators\SSLCertificate\CertInfo;

class CertInfoTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test that CertInfo is not valid by default.
     */
    function test_it_should_not_be_valid_by_default() {
        $cert = new CertInfo([]);
        $this->assertFalse($cert->isValid());
    }
}
