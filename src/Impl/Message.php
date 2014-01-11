<?php

namespace Impl;

use Psr\Http\HeadersInterface;
use Psr\Http\HeadersIterator;
use Psr\Http\MessageInterface;
use Psr\Http\StreamInterface As BodyInterface;

class Message implements MessageInterface
{
    /**
     * @var BodyInterface|null
     */
    private $body;

    /**
     * @var Headers;
     */
    private $headers;

    public function __construct()
    {
        $this->headers = Headers::createFromArray(
            [
                'Content-Type' => 'text/plain',
                'Upgrade'      => 'HTTP/2.0',
                'User-Agent'   => 'CERN-LineMode/2.15 libwww/2.17b3',
                'Set-Cookie'   => 'name=value',
                ['Set-Cookie', 'name2=value2; Expires=Wed, 09 Jun 2021 10:18:14 GMT'],
            ]
        );
    }

    /**
     * Gets the HTTP protocol version.
     *
     * @return string HTTP protocol version.
     */
    public function getProtocolVersion()
    {
        return '1.1';
    }

    /**
     * Gets the body of the message.
     *
     * @return BodyInterface|null Returns the body, or null if not set.
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Sets the body of the message.
     *
     * The body MUST be a StreamInterface object. Setting the body to null MUST
     * remove the existing body.
     *
     * @param BodyInterface|\Psr\Http\StreamInterface $body Body.
     *
     * @return self Returns the message.
     */
    public function setBody(BodyInterface $body = null)
    {
        $this->body = $body;
    }

    /**
     * Get all headers or all of a specific name
     *
     * Each header is represented as a HeaderFieldInterface.
     *
     * The keys in the returned Traversable are such header-fields field-name and accordingly the
     * values the field-value of that header-field.
     *
     *     // Represent headers as a string
     *     $headers = '';
     *     foreach ($message->getHeaders() as $name => $value) {
     *         $headers .= "$name: $value\r\n";
     *     }
     *
     * @param string $name (optional) providing a name returns header fields by that name
     * @return HeadersInterface the message's header fields
     */
    public function getHeaders($name = NULL)
    {
        return new MessageHeaderIterator($this->headers, $name);
    }

    /**
     * Set all headers
     *
     * @param HeadersInterface $headers
     */
    public function setHeaders(HeadersInterface $headers)
    {
        $array = [];

        foreach (new HeadersIterator($headers) as $field) {
            if ($field instanceof HeaderField) {
                $field = clone $field;
            } else {
                $field = new HeaderField($field->getName(), $field->getValue());
            }
            $array[] = $field;
        }

        $transposed = Headers::createFromArray($array);

        $this->headers = $transposed;
    }
}
