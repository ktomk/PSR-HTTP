<?php

namespace Impl;

use InvalidArgumentException;

class HeaderFieldTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var HeaderField
     */
    private $field;

    function setUp() {
        $this->field = new HeaderField('Content-Type', 'text/plain');
    }

    /**
     * @test
     * @covers Impl\HeaderField::__construct
     * @covers Impl\HeaderField::setName
     */
    function creation() {
        $this->assertInstanceOf(__NAMESPACE__ . '\HeaderField', $this->field);
    }

    /**
     * @test
     * @covers Impl\HeaderField::setName
     * @expectedException InvalidArgumentException
     */
    function testSetName() {
        $subject = new HeaderField(':', "");
    }

    /**
     * @test
     * @covers Impl\HeaderField::toString
     */
    function toString() {
        $result = $this->field->toString();
        $this->assertInternalType('string', $result);
        $this->assertEquals('Content-Type: text/plain', $result);
    }

    /**
     * @test
     * @covers Impl\HeaderField::getName
     * @covers Impl\HeaderField::getValue
     */
    function getting() {
        $this->assertSame('Content-Type', $this->field->getName());
        $this->assertSame('text/plain', $this->field->getValue());
    }

    /**
     * @test
     * @covers Impl\HeaderField::isSameName
     */
    function comparingNames() {
        $this->assertTrue($this->field->isSameName($this->field->getName()));
        $this->assertTrue($this->field->isSameName(clone $this->field));
        $this->assertTrue($this->field->isSameName('CONTENT-TYPE'));
        $this->assertFalse($this->field->isSameName('CONTENT_TYPE'));
    }

    /**
     * @test
     * @covers Impl\HeaderField::isSameName
     */
    function comparingNamesHandlesStringsAndErrors() {
        $string = new \SplFileInfo('Content-Type');
        $this->assertTrue($this->field->isSameName($string));
    }

    /**
     * @test
     * @covers Impl\HeaderField::isSameName
     * @expectedException InvalidArgumentException
     */
    function comparingToStringConversionThrowsExceptionOnNonName()
    {
        $string = new \SplFileInfo('Cöntent-Type');
        $this->field->isSameName($string);
    }

    /**
     * @test
     * @covers Impl\HeaderField::isSameName
     * @expectedException InvalidArgumentException
     */
    function comparingWithNonToStringObjectThrowsException()
    {
        $object = new \stdClass();
        $this->field->isSameName($object);
    }

    /**
     * @test
     * @covers Impl\HeaderField::setValue
     * @expectedException InvalidArgumentException
     */
    function nonValueThrowsException() {
        $this->field->setValue("I th\0ught th\1s works");
    }
}
