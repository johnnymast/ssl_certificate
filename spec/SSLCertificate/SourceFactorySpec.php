<?php

namespace spec\JM\Validators\SSLCertificate;

use JM\Validators\SSLCertificate\SourceFactory;
use PhpSpec\ObjectBehavior;

class SourceFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SourceFactory::class);
    }

    function it_should_throw_en_exception_on_invalid_url() {
        $this->shouldThrow('JM\Validators\SSLCertificate\Exceptions\InvalidHostException')->duringCreate('unknown');
    }

    function it_should_not_throw_en_exception_on_valid_url() {
        $this->shouldNotThrow('JM\Validators\SSLCertificate\Exceptions\InvalidHostException')->duringCreate('http://www.google.com');
    }

    function it_should_throw_en_exception_on_invalid_mapping() {
        $this->shouldThrow('JM\Validators\SSLCertificate\Exceptions\UnknownSourceException')->duringCreate('unknown://www.google.com', 'unknown');
    }

}
