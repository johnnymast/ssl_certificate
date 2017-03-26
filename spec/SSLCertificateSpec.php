<?php

namespace spec\JM\Validators;

use JM\Validators\SSLCertificate\Sources\Web;
use JM\Validators\SSLCertificate;
use PhpSpec\Exception\Exception;
use PhpSpec\ObjectBehavior;
use JM\Validators\SSLCertificate\Exceptions\InvalidHostException;

class SSLCertificateSpec extends ObjectBehavior
{

    function Let()
    {
        $this->beConstructedWith(new Web('google.com'));
    }


    function it_is_initializable()
    {
        $this->shouldHaveType(SSLCertificate::class);
    }

    function it_should_return_it_self_on_function_of() {
        $this->of('http://www.google.com')
            ->shouldReturnAnInstanceOf(SSLCertificate::class);
    }

    //function it_initializes_with_source_interface() {
    //    $this->fromTheWeb('google.com')
    //        ->shouldReturnAnInstanceOf(SourceInterface::class);
    //}
}
