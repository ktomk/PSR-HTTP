<?php

namespace Psr\Http;

use ConcreteFirstHeadersInterfaceImplementation;

class HeadersIteratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ConcreteFirstHeadersInterfaceImplementation
     */
    private $headers;

    /**
     * @var HeadersIterator
     */
    private $iterator;

    function setUp() {
        require_once __DIR__ . '/../../fixtures/ConcreteFirstHeadersInterfaceImplementation.php';

        $this->headers  = new ConcreteFirstHeadersInterfaceImplementation();
        $this->iterator = new HeadersIterator($this->headers);
    }

    /**
     * @test
     * @covers Psr\Http\HeadersIterator::__construct
     */
    function creation() {
        $this->assertInstanceOf(__NAMESPACE__ . '\HeadersIterator', $this->iterator);
    }

    /**
     * @test
     * @covers Psr\Http\HeadersIterator::rewind
     * @covers Psr\Http\HeadersIterator::valid
     * @covers Psr\Http\HeadersIterator::current
     * @covers Psr\Http\HeadersIterator::key
     * @covers Psr\Http\HeadersIterator::next
     */
    function iteration() {

        $iterator = $this->iterator;

        $this->assertInstanceOf('Traversable', $iterator);
        $this->assertInstanceOf('Iterator', $iterator);

        $iterator->rewind();

        $this->assertFalse($iterator->valid());
        $this->assertNull($iterator->current());
        $this->assertNull($iterator->key());

        $iterator->next();
        $this->assertFalse($iterator->valid());
    }
}
