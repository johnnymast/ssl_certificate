<?php

namespace spec\JM\Validators\SSLCertificate\Adapters;

use JM\Validators\SSLCertificate\Adapters\AdapterAbstract;
use PhpSpec\ObjectBehavior;

class AdapterAbstractSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(AdapterAbstract::class);
    }
}
