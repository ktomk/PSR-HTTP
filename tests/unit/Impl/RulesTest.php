<?php


namespace Impl;


class RulesTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Rules
     */
    private $rules;

    function setUp() {
        $this->rules = new Rules();
    }

    /**
     * @test
     * @covers Impl\Rules
     */
    function creation() {
        $obj = new Rules();
        $this->assertInstanceOf(__NAMESPACE__ . '\Rules', $obj);
    }

    /**
     * @return array
     * @see isNotToken
     */
    function provideNonTokens() {
        return [
            [""], ["@"], ["\0"], [" "], ["\x7f"], ["foo:"], ["ä"]
        ];
    }

    /**
     * @return array
     * @see isToken
     */
    function provideTokens() {
        return [
            ["f"], ["foo"], ["0"]
        ];
    }

    /**
     * @test
     * @dataProvider provideTokens
     * @covers Impl\Rules::isToken
     * @covers Impl\Rules::isPattern
     */
    function isToken($token) {
        $this->assertTrue($this->rules->isToken($token));
    }

    /**
     * @test
     * @dataProvider provideNonTokens
     * @covers Impl\Rules::isToken
     * @covers Impl\Rules::isPattern
     */
    function isNotToken($nonToken) {
        $this->assertFalse($this->rules->isToken($nonToken));
    }

    /**
     * @return array
     * @see isFieldValue
     */
    function provideFieldValues() {
        return [
            ['Hallo World Of Abakan'],
            ["\r\n    this goes on! \\!"],
            ["\"now we really\\\0push this a gogo! \\!\""],
            ["it was the bla bla value\r\n \"of which\" there were \"now we really\\\0push this a gogo! \\!\""
            ."\r\n \"there is nothing mroe funny than LWS\""],
        ];
    }

    /**
     * @test
     * @dataProvider provideFieldValues
     * @covers Impl\Rules::isFieldValue
     * @covers Impl\Rules::isPattern
     */
    function isFieldValue($value) {
        $this->assertTrue($this->rules->isFieldValue($value));
    }

    /**
     * @test
     * @dataProvider provideFieldValues
     * @covers Impl\Rules::isFieldValue
     * @covers Impl\Rules::isPattern
     */
    function isNotFieldValue($value) {
        $value .= "\r\n";
        $this->assertFalse($this->rules->isFieldValue($value));
    }
}
