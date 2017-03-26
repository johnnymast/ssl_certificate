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

    function it_should_have_is_valid_and_returns_false_by_default() {

        $this->isValid()->shouldReturn(false);
    }

    function it_has_isExpired() {
        $this->isExpired();
    }
}
