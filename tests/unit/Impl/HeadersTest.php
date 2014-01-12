<?php

namespace Impl;

class HeadersTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Message
     */
    private $message;

    /**
     * @var Headers
     */
    private $headers;

    function setUp() {
        $mock = $this->getMock('Psr\Http\HeaderFieldInterface');
        $mock->expects($this->any())
            ->method('getName')
            ->will($this->returnValue('Upgrade'));
        $mock->expects($this->any())
            ->method('getValue')
            ->will($this->returnValue('HTTP/2.0'));

        $headers = [
            new HeaderField('Content-Type', 'text/plain'),
            $mock,
            'User-Agent' => 'CERN-LineMode/2.15 libwww/2.17b3',
            'Set-Cookie' => 'name=value',
            ['Set-Cookie', 'name2=value2; Expires=Wed, 09 Jun 2021 10:18:14 GMT'],
        ];
        $this->headers = Headers::createFromArray($headers);
    }

    /**
     * @test
     * @covers Impl\Headers::__construct
     * @covers Impl\Headers::createFromArray
     */
    function creation() {
        $this->assertInstanceOf(__NAMESPACE__ . '\Headers', $this->headers);
    }

    /**
     * @test getNames
     * @covers Impl\Headers::getNames
     */
    function getNames() {
        $names = $this->headers->getNames();
        $this->assertEquals(['Content-Type', 'Upgrade', 'User-Agent', 'Set-Cookie'], $names);
    }

    /**
     * @test
     * @covers Impl\Headers::length()
     */
    function length() {
        $this->assertEquals(5, $this->headers->length());
    }

    /**
     * @test
     * @covers Impl\Headers::item
     */
    function item() {
        $field = $this->headers->item(0);
        $this->assertInstanceOf('Psr\Http\HeaderFieldInterface', $field);
        $this->assertEquals('Content-Type', $field->getName());
        $this->assertEquals('text/plain', $field->getValue());

        $this->assertNull($this->headers->item(-1));
        $this->assertNull($this->headers->item(99));
    }

    /**
     * @test
     * @covers Impl\Headers::getHeaderFieldsByName
     */
    function getHeaderFieldsByName() {
        $headers = $this->headers->getHeaderFieldsByName('set-cookie');
        $this->assertInstanceOf('Psr\Http\HeadersInterface', $headers);
        $this->assertInstanceOf('Impl\Headers', $headers);
        $this->assertSame(2, $headers->length());
        $this->assertEquals(['Set-Cookie'], $headers->getNames());
    }

    /**
     * @test
     * @covers Impl\Headers::getIterator
     */
    function iteratorAggregation() {
        $iterator = $this->headers->getIterator();
        $this->assertInstanceOf('Traversable', $iterator);
        $this->assertInstanceOf('Psr\Http\HeadersIterator', $iterator);
        $this->assertEquals(5, iterator_count($iterator));
    }
}
