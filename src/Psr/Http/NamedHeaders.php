<?php

namespace Psr\Http;

class NamedHeaders extends NamedHeadersIterator implements HeadersInterface
{
    /**
     * @var HeadersInterface
     */
    private $headers;

    public function __construct(HeadersInterface $headers) {
        $this->headers = $headers;
        parent::__construct($headers);
    }

    /**
     * @param string $name
     * @return HeadersInterface
     */
    public function getHeaderFieldsByName($name)
    {
        return $this->headers->getHeaderFieldsByName($name);
    }

    /**
     * @return string[]
     */
    public function getNames()
    {
        return $this->headers->getNames();
    }

    /**
     * @return int number of items
     */
    public function length()
    {
        return $this->headers->length();
    }

    /**
     * @param int $index zero based
     * @return HeaderFieldInterface|null
     */
    public function item($index)
    {
        return $this->headers->item($index);
    }
}
