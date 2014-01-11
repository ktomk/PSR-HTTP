<?php

namespace Impl;

use Psr\Http\NamedHeaders;
use ConcreteSecondHeadersInterfaceImplementation;

class MessageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Message
     */
    private $message;

    function setUp() {
        $this->message = new Message();
    }

    /**
     * @test
     * @covers Impl\Message
     */
    function creation() {
        $this->assertInstanceOf(__NAMESPACE__ . '\Message', $this->message);
    }

    /**
     * @test
     */
    function headersDocblockExample() {
        $message = $this->message;

        // Represent headers as a string
        $buffer = '';
        foreach ($message->getHeaders() as $name => $value) {
            $buffer .= "$name: $value\r\n";
        }

        $this->assertGreaterThan(24, strlen($buffer));
    }

    /**
     * @test
     * @covers Impl\Message::setHeaders
     */
    function setHeaders() {
        $message = $this->message;

        // eat your own dogfood
        $message->setHeaders($message->getHeaders());

        require_once __DIR__ . '/../../fixtures/ConcreteSecondHeadersInterfaceImplementation.php';
        $headers = new ConcreteSecondHeadersInterfaceImplementation();

        $this->assertNotSame(1, $message->getHeaders()->length());
        $message->setHeaders($headers);
        $this->assertSame(1, $message->getHeaders()->length());
    }

    /**
     * @test
     * @covers Impl\Message::getBody
     * @covers Impl\Message::setBody
     * @covers Impl\Message::getProtocolVersion
     */
    function coverage() {
        $this->message->setBody(null);
        $this->assertNull($this->message->getBody());
        $this->assertSame('1.1', $this->message->getProtocolVersion());
    }
}
