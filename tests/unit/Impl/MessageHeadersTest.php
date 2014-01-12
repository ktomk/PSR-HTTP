<?php

namespace Impl;

class MessageHeadersTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Message
     */
    private $message;

    /**
     * @var MessageHeaders
     */
    private $headers;

    function setUp() {
        $this->message = new Message();
        $this->headers = new MessageHeaders($this->message);
    }

    /**
     * @test
     * @covers Impl\MessageHeaders::__construct
     */
    function creation() {
        $this->assertInstanceOf(__NAMESPACE__ . '\MessageHeaders', $this->headers);
    }

    /**
     * @test getNames
     * @covers Impl\MessageHeaders::getNames
     */
    function getNames() {
        $names = $this->headers->getNames();
        $this->assertEquals(['Content-Type', 'Upgrade', 'User-Agent', 'Set-Cookie'], $names);
    }

    /**
     * @test
     * @covers Impl\MessageHeaders::length()
     */
    function length() {
        $this->assertEquals(5, $this->headers->length());
    }

    /**
     * @test
     * @covers Impl\MessageHeaders::item
     */
    function item() {
        $field = $this->headers->item(0);
        $this->assertInstanceOf('Psr\Http\HeaderFieldInterface', $field);
        $this->assertEquals('Content-Type', $field->getName());
        $this->assertEquals('text/plain', $field->getValue());

        $this->assertNull($this->headers->item(-1));
        $this->assertNull($this->headers->item(99));
    }
}
