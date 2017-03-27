<?php

namespace spec\JM\Validators\SSLCertificate\Adapters;

use JM\Validators\SSLCertificate\Adapters\Curl;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CurlSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Curl::class);
        $this->shouldImplement('JM\Validators\SSLCertificate\Adapters\AdapterInterface');
    }
}
