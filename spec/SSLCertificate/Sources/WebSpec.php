<?php

namespace spec\JM\Validators\SSLCertificate\Sources;

use JM\Validators\SSLCertificate\CertInfo;
use JM\Validators\SSLCertificate\Sources\Web;
use PhpSpec\ObjectBehavior;

class WebSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType(Web::class);
        $this->shouldImplement('JM\Validators\SSLCertificate\Sources\SourceInterface');

    }


    function it_should_return_instance_of_certificate_from_load()
    {
        $this->beConstructedWith('https://www.google.com');
        $this->load()->shouldReturnAnInstanceOf(CertInfo::class);
    }
}
