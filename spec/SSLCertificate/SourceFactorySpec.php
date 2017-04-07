<?php

namespace spec\JM\Validators\SSLCertificate;

use JM\Validators\SSLCertificate\SourceFactory;
use JM\Validators\SSLCertificate\Sources\SourceInterface;
use JM\Validators\SSLCertificate\Sources\Web;
use PhpSpec\ObjectBehavior;

class SourceFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SourceFactory::class);
    }

    function it_should_throw_en_exception_on_invalid_url()
    {
        $this->shouldThrow('JM\Validators\SSLCertificate\Exceptions\InvalidHostException')->duringCreate('unknown');
    }

    function it_should_not_throw_en_exception_on_valid_url()
    {
        $this->shouldNotThrow('JM\Validators\SSLCertificate\Exceptions\InvalidHostException')->duringCreate('http://www.google.com');
    }

    function it_should_throw_en_exception_on_invalid_mapping()
    {
        $this->shouldThrow('JM\Validators\SSLCertificate\Exceptions\UnknownSourceException')->duringCreate('unknown://www.google.com', 'unknown');
    }

    function it_should_throw_en_exception_on_invalid_custom_mapping()
    {
        $this->addMapping('unknown', \stdClass::class);
        $this->shouldThrow('JM\Validators\SSLCertificate\Exceptions\UnknownSourceException')->duringCreate('unknown://www.google.com', 'unknown');
    }

    function it_should_map_to_source_interface()
    {
        $this->create('http://www.google.com')->shouldReturnAnInstanceOf(SourceInterface::class);
    }

    function it_should_be_able_to_accept_new_mappings()
    {
        $this->addMapping('unknown', Web::class);
        $this->getMapping('unknown')->shouldBe(Web::class);
    }
}
