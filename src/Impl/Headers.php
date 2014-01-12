<?php

namespace Impl;

use Psr\Http\HeaderFieldInterface;
use Psr\Http\HeadersInterface;
use Psr\Http\HeadersIterator;
use IteratorAggregate;

/**
 * Class Headers
 *
 * @package Impl
 */
class Headers implements HeadersInterface, IteratorAggregate
{
    /**
     * @var HeaderField[]
     */
    protected $headerFields = [];

    public function __construct()
    {
    }

    public static function createFromArray(array $array = [])
    {
        $headers = new static();

        foreach ($array as $name => $value) {
            // same type
            if ($value instanceof HeaderField) {
                $headers->headerFields[] = clone $value;
                continue;
            }

            // known interface
            if ($value instanceof HeaderFieldInterface) {
                $name  = $value->getName();
                $value = $value->getValue();
            }

            // s-expression
            if (is_array($value) && count($value) === 2) {
                list($value, $name) = array_reverse($value);
            }

            if (is_string($name) && is_string($value)) {
                $headers->headerFields[] = new HeaderField($name, $value);
                continue;
            }
        }

        return $headers;
    }

    /**
     * @param string $name
     * @return HeadersInterface
     */
    public function getHeaderFieldsByName($name)
    {
        $fields = [];

        foreach ($this as $headerField) {
            /* @var $headerField HeaderField */
            if (!$headerField->isSameName($name)) {
                continue;
            }

            $fields[] = $headerField;
        }

        return static::createFromArray($fields);
    }

    /**
     * @return string[]
     */
    public function getNames()
    {
        $names = [];

        foreach ($this as $headerField) {
            /* @var $headerField HeaderField */
            $names[$headerField->getName()] = NULL;
        }

        return array_keys($names);
    }

    /**
     * @return int number of items
     */
    public function length()
    {
        return count($this->headerFields);
    }

    /**
     * @param int $index zero based
     * @return HeaderFieldInterface|null
     */
    public function item($index)
    {
        $index = (int)$index;

        if (!isset($this->headerFields[$index])) {
            return null;
        }

        return $this->headerFields[$index];
    }

    /**
     * @return HeadersIterator|HeaderField[]
     */
    public function getIterator()
    {
        return new HeadersIterator($this);
    }
}
