<?php

namespace spec\JM\Validators\SSLCertificate\Adapters;

use JM\Validators\SSLCertificate\Adapters\Stream;
use PhpSpec\ObjectBehavior;

class StreamSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Stream::class);
        $this->shouldImplement('JM\Validators\SSLCertificate\Adapters\AdapterInterface');
    }
}
