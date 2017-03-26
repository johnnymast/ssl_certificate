<?php

namespace spec\JM\Validators\SSLCertificate;

use JM\Validators\SSLCertificate\CertInfo;
use PhpSpec\ObjectBehavior;

class CertInfoSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType(CertInfo::class);
    }

    function is_should_have_isvalid() {
        $this->isValid();
    }
}
