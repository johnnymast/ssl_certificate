<?php

namespace spec\JM\Validators\SSLCertificate;

use JM\Validators\SSLCertificate\UrlParser;
use PhpSpec\ObjectBehavior;

class UrlParserSpec extends ObjectBehavior
{

    private $example_domain = 'google.com';


    function it_is_initializable()
    {
        $this->beConstructedWith($this->example_domain);
        $this->shouldHaveType(UrlParser::class);
    }


    function it_implements_isvalid()
    {
        $this->beConstructedWith($this->example_domain);
        $this->isValid();
    }


    function it_implements_gettype()
    {
        $this->beConstructedWith($this->example_domain);
        $this->getType();
    }

}
