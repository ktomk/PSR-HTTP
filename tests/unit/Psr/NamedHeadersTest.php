<?php

namespace Psr\Http;

use ConcreteSecondHeadersInterfaceImplementation;

class NamedHeadersTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var HeadersInterface
     */
    private $headers;

    /**
     * @var NamedHeaders
     */
    private $named;

    function setUp() {
        require_once __DIR__ . '\..\..\fixtures\ConcreteSecondHeadersInterfaceImplementation.php';

        $this->headers = new ConcreteSecondHeadersInterfaceImplementation();
        $this->named   = new NamedHeaders($this->headers);
    }

    /**
     * @test
     * @covers Psr\Http\NamedHeaders::__construct
     */
    function creation() {
        $this->assertInstanceOf(__NAMESPACE__ . '\NamedHeaders', $this->named);
    }

    /**
     * @test
     * @covers Psr\Http\NamedHeaders
     */
    function coverage() {
        $named = $this->named;
        $this->assertInstanceOf('Psr\Http\HeadersInterface', $named->getHeaderFieldsByName('X-Foo'));
        $this->assertEquals(['X-Foo'], $named->getNames());
        $this->assertEquals(1, $named->length());
        $this->assertInstanceOf('Psr\Http\HeaderFieldInterface', $named->item(0));
    }
}
