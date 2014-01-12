<?php

namespace Psr\Http;

use ConcreteFirstHeadersInterfaceImplementation;

class NamedHeadersIteratorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var HeadersInterface
     */
    private $headers;

    /**
     * @var NamedHeadersIterator
     */
    private $iterator;

    function setUp() {
        require_once __DIR__ . '/../../fixtures/ConcreteFirstHeadersInterfaceImplementation.php';

        $this->headers  = new ConcreteFirstHeadersInterfaceImplementation();
        $this->iterator = new NamedHeadersIterator($this->headers);
    }

    /**
     * @test
     * @covers Psr\Http\NamedHeadersIterator::__construct
     */
    function creation() {
        $this->assertInstanceOf(__NAMESPACE__ . '\NamedHeadersIterator', $this->iterator);
    }
}
