<?php

namespace JM\Validators\Tests\SSLCertificate;

use Faker;
use JM\Validators\SSLCertificate\SourceFactory;
use JM\Validators\SSLCertificate\Sources\File;
use JM\Validators\SSLCertificate\Sources\SourceInterface;
use JM\Validators\SSLCertificate\Sources\Web;

class SourceFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * We use this function to test the mappings.
     * @see test_it_should_not_throw_en_exception_on_valid_url
     * @return array
     */
    public function availableMappings()
    {
        $faker = Faker\Factory::create();

        return [
            [$faker->url, Web::class],
            [$faker->url, Web::class],
            ['file://myfile', File::class],
        ];
    }


    /**
     * Test that InvalidHostException is thrown for any unknown host.
     * @expectedException JM\Validators\SSLCertificate\Exceptions\InvalidHostException
     */
    public function test_it_should_throw_an_exception_on_invalid_url()
    {
        SourceFactory::create('unknown');
    }


    /**
     * Test that the create function returns an instance of SourceInterface on a valid
     * mapping.
     */
    public function test_function_create_returns_an_instance_of_source_interface()
    {
        $actual = SourceFactory::create('file://some/local/file');
        $this->assertInstanceOf(SourceInterface::class, $actual);
    }


    /**
     * Test that UnknownSourceException will be thrown if no valid mapping was found. This
     * means that there is no Source found for the url.
     * @expectedException JM\Validators\SSLCertificate\Exceptions\UnknownSourceException
     */
    public function test_it_should_throw_an_exception_on_invalid_mapping()
    {
        SourceFactory::create('unknown://www.google.com');
    }


    /**
     * Test that a source is returned on a vali
     * @dataProvider availableMappings
     *
     * @param string $url
     * @param string $expected
     */
    public function test_it_should_not_throw_en_exception_on_valid_url($url = '', $expected = '')
    {
        $actual = SourceFactory::create($url);
        $this->assertInstanceOf($expected, $actual);
    }


    /**
     * Test that getMapping returns what addMapping has added.
     */
    public function test_add_and_get_mapping_work_as_expected()
    {
        $expected = Web::class;

        SourceFactory::addMapping('unknown', Web::class);
        $actual = SourceFactory::getMapping('unknown');

        $this->assertEquals($expected, $actual);
    }

}
