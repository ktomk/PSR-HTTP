<?php

namespace Psr\Http;

use Iterator;

/**
 * Class HeadersIterator
 *
 * HeadersInterface Iterator
 *
 * @package Http
 */
class HeadersIterator implements Iterator
{
    /**
     * @var int
     */
    private $index = 0;

    /**
     * @var HeadersInterface
     */
    private $headers;

    public function __construct(HeadersInterface $headers)
    {
        $this->headers = $headers;
    }

    public function current()
    {
        return $this->headers->item($this->index);
    }

    public function next()
    {
        $this->index++;
    }

    public function key()
    {
        return $this->valid() ? $this->index : null;
    }

    public function valid()
    {
        return $this->index < $this->headers->length();
    }

    public function rewind()
    {
        $this->index = 0;
    }
}
