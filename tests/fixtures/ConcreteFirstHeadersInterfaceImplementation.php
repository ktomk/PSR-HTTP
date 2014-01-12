<?php

use Psr\Http\HeadersInterface;

class ConcreteFirstHeadersInterfaceImplementation implements HeadersInterface
{
    /**
     * @param $name
     * @return HeadersInterface
     */
    public function getHeaderFieldsByName($name)
    {
        return $this;
    }

    /**
     * @return string[]
     */
    public function getNames()
    {
        return [];
    }

    /**
     * @return int number of items
     */
    public function length()
    {
        return 0;
    }

    /**
     * @param int $index zero based
     * @return \Psr\Http\HeaderFieldInterface|null
     */
    public function item($index)
    {
        return null;
    }
}
