<?php

namespace Impl;

class MessageHeaderIteratorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Message
     */
    private $message;

    /**
     * @var MessageHeaderIterator
     */
    private $iterator;

    function setUp() {
        $this->message  = new Message();
        $this->iterator = new MessageHeaderIterator($this->message->getHeaders());
    }

    /**
     * @test
     * @covers Impl\MessageHeaderIterator::__construct
     */
    function creation() {
        $this->assertInstanceOf(__NAMESPACE__ . '\MessageHeaderIterator', $this->iterator);
    }

    /**
     * @test
     * @covers Impl\MessageHeaderIterator::__construct
     */
    function createNamed() {
        $iterator = new MessageHeaderIterator($this->message->getHeaders(), 'set-cookie');
        $this->assertInstanceOf(__NAMESPACE__ . '\MessageHeaderIterator', $iterator);
    }
}
