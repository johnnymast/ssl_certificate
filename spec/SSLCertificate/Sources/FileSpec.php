<?php

namespace spec\JM\Validators\SSLCertificate\Sources;

use JM\Validators\SSLCertificate\CertInfo;
use JM\Validators\SSLCertificate\Host;
use JM\Validators\SSLCertificate\Sources\File;
use PhpSpec\ObjectBehavior;

class FileSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(new Host());
        $this->shouldHaveType(File::class);
        $this->shouldImplement('JM\Validators\SSLCertificate\Sources\SourceInterface');
    }

    function it_should_return_instance_of_certificate_from_load()
    {
        $this->beConstructedWith(new Host());
        $this->load()->shouldReturnAnInstanceOf(CertInfo::class);
    }
}

