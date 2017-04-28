<?php

namespace spec\JM\Validators;

use JM\Validators\Certificate;
use JM\Validators\SSLCertificate\CertInfo;
use JM\Validators\SSLCertificate\Host;
use JM\Validators\SSLCertificate\Sources\File;
use PhpSpec\ObjectBehavior;

class CertificateSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(new File(new Host()));
        $this->shouldHaveType(Certificate::class);
    }

    function it_getProvidedInformation_should_return_cert_info()
    {
        $this->beConstructedWith(new File(new Host()));
        $this->getProvidedInformation()->shouldReturnAnInstanceOf(CertInfo::class);
    }

    function it_should_return_certificate_information_from_the_function_named_of()
    {
        $this->beConstructedWith(new File(new Host()));
        $this->of('file://somefile')->shouldReturnAnInstanceOf(CertInfo::class);
    }

    //function it_can_load_the_certificate()
    //function it_should_return_it_self_on_function_of() {
    //    $this->of('http://www.google.com')
    //        ->shouldReturnAnInstanceOf(SSLCertificate::class);
    //}
    //
    //function it_initializes_with_source_interface() {
    //    $this->of('google.com')
    //        ->shouldReturnAnInstanceOf(SourceInterface::class);
    //}
}
