<?php

namespace Impl;

use Psr\Http\HeadersIterator;

class MessageHeaders extends Headers
{
    /**
     * @var Message
     */
    private $message;

    public function __construct(Message $message) {

        $this->message = $message;

        $fields = new HeadersIterator($this->message->getHeaders());

        foreach($fields as $field ) {
            if ($field instanceof HeaderField) {
                $this->headerFields[] = $field;
            }
        }
   }
}
