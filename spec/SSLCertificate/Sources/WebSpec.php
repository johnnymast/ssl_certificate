<?php

namespace spec\JM\Validators\SSLCertificate\Sources;

use JM\Validators\SSLCertificate\Sources\Web;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WebSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Web::class);
    }


}
