<?php

use Psr\Http\HeadersInterface;
use Psr\Http\HeaderFieldInterface;

require_once __DIR__ . '\ConcreteFirstHeaderFieldInterfaceImplementation.php';

class ConcreteSecondHeadersInterfaceImplementation implements HeadersInterface
{
    /**
     * @param string $name
     * @throws RuntimeException
     * @return HeadersInterface
     */
    public function getHeaderFieldsByName($name)
    {
        if ($name !== 'X-Foo') {
            throw new RuntimeException('Internal Error, operation not possible for Name, sorry');
        }

        return $this;
    }

    /**
     * @return string[]
     */
    public function getNames()
    {
        return ['X-Foo'];
    }

    /**
     * @return int number of items
     */
    public function length()
    {
        return 1;
    }

    /**
     * @param int $index zero based
     * @return HeaderFieldInterface|null
     */
    public function item($index)
    {
        if ($index === 0) {
            return new ConcreteFirstHeaderFieldInterfaceImplementation();
        }

        return null;
    }
}
