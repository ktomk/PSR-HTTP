<?php

namespace Impl;

use Psr\Http\HeadersInterface;
use Psr\Http\NamedHeaders;

class MessageHeaderIterator extends NamedHeaders implements HeadersInterface
{
    /**
     * @var Message
     */
    private $headers;

    public function __construct(HeadersInterface $headers, $name = null)
    {
        $this->headers = $headers;

        if ($name !== null) {
            $this->headers = $headers->getHeaderFieldsByName($name);
        }

        parent::__construct($this->headers);
    }
}
