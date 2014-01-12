<?php

namespace Psr\Http;

use IteratorIterator;

class NamedHeadersIterator extends IteratorIterator
{
    /**
     * @var HeadersInterface
     */
    private $headers;

    /**
     * @var HeadersIterator
     */
    private $iterator;

    /**
     * @var HeaderFieldInterface
     */
    private $field;

    public function __construct(HeadersInterface $headers)
    {
        $this->headers  = $headers;
        $this->iterator = new HeadersIterator($this->headers);
        parent::__construct($this->iterator);
    }

    public function current()
    {
        $this->field = parent::current();

        return $this->field->getValue();
    }

    public function key()
    {
        return $this->field->getName();
    }
}
