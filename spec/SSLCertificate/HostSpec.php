<?php

namespace spec\JM\Validators\SSLCertificate;

use JM\Validators\SSLCertificate\Host;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HostSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Host::class);
    }

    function it_implements_isValid() {
        $this->isValid();
    }

    function it_should_be_invalid_by_default() {
        $this->isValid()->shouldReturn(false);
    }
}
