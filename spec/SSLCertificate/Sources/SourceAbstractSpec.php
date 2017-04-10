<?php

namespace spec\JM\Validators\SSLCertificate\Sources;

use JM\Validators\SSLCertificate\Sources\SourceAbstract;
use PhpSpec\ObjectBehavior;

class SourceAbstractSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SourceAbstract::class);
    }

    function it_should_have_function_adapter()
    {
       // $this->adapter()->shouldBe(null);
    }
}
