<?php

namespace spec\JM\Validators\SSLCertificate\Sources;

use JM\Validators\SSLCertificate\CertInfo;
use JM\Validators\SSLCertificate\Sources\File;
use PhpSpec\ObjectBehavior;

class FileSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType(File::class);
    }


    function it_should_return_instance_of_certificate_from_load()
    {
        $this->beConstructedWith('file://somefile');
        $this->load()->shouldReturnAnInstanceOf(CertInfo::class);
    }
}

