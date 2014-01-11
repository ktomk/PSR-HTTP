<?php

use Psr\Http\MessageInterface;
use Psr\Http\StreamInterface;

class ConcreteFirstInterfaceImplementation implements MessageInterface
{
    /**
     * Gets all headers.
     *
     * The keys of the returned array represents the header name as it will be
     * sent over the wire, and each value is a HeaderValuesInterface object that
     * can be used like an array or cast to a string.
     *
     *     // Represent the headers as a string
     *     foreach ($message->getHeaders() as $name => $values) {
     *         echo "{$name}: {$values}\r\n";
     *     }
     *
     * @return array Returns an associative array of the message's headers
     */
    public function getHeaders()
    {
        // TODO: Implement getHeaders() method.
    }

    /**
     * Checks if a header exists by the given case-insensitive name.
     *
     * @param string $header Case-insensitive header name.
     *
     * @return bool Returns true if any header names match the given header
     *              name using a case-insensitive string comparison. Returns
     *              false if no matching header name is found in the message.
     */
    public function hasHeader($header)
    {
        // TODO: Implement hasHeader() method.
    }

    /**
     * Retrieve a header by name.
     *
     * @param string $header Header name.
     *
     * @return \Psr\Http\HeaderValuesInterface|null Returns the header values or or null
     *                                    if not set.
     */
    public function getHeader($header)
    {
        // TODO: Implement getHeader() method.
    }

    /**
     * Sets a header, replacing any existing values of any headers with the
     * same case-insensitive name.
     *
     * The header values MUST be a string, an array of strings, or a
     * HeaderValuesInterface object.
     *
     * @param string $header Header name
     * @param string|array|\Psr\Http\HeaderValuesInterface $value Header value(s)
     *
     * @return self Returns the message.
     */
    public function setHeader($header, $value)
    {
        // TODO: Implement setHeader() method.
    }

    /**
     * Sets headers, replacing any headers that have already been set on the
     * message.
     *
     * The array keys MUST be a string. The array values must be either a
     * string, array of strings, or a HeaderValuesInterface object.
     *
     * @param array $headers Headers to set.
     *
     * @return self Returns the message.
     */
    public function setHeaders(array $headers)
    {
        // TODO: Implement setHeaders() method.
    }

    /**
     * Appends a header value to any existing values associated with the
     * given header name.
     *
     * @param string $header Header name to add
     * @param string $value Value of the header
     *
     * @return self
     */
    public function addHeader($header, $value)
    {
        // TODO: Implement addHeader() method.
    }

    /**
     * Remove a specific header by case-insensitive name.
     *
     * @param string $header HTTP header to remove
     *
     * @return self
     */
    public function removeHeader($header)
    {
        // TODO: Implement removeHeader() method.
    }

    /**
     * Returns a string representation of the HTTP message.
     *
     * @return string Message as a string.
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

    /**
     * Gets the HTTP protocol version.
     *
     * @return string HTTP protocol version.
     */
    public function getProtocolVersion()
    {
        // TODO: Implement getProtocolVersion() method.
    }

    /**
     * Gets the body of the message.
     *
     * @return StreamInterface|null Returns the body, or null if not set.
     */
    public function getBody()
    {
        // TODO: Implement getBody() method.
    }

    /**
     * Sets the body of the message.
     *
     * The body MUST be a StreamInterface object. Setting the body to null MUST
     * remove the existing body.
     *
     * @param StreamInterface|null $body Body.
     *
     * @return self Returns the message.
     *
     * @throws \InvalidArgumentException When the body is not valid.
     */
    public function setBody(StreamInterface $body = null)
    {
        throw new InvalidArgumentException('The body is not valid');
        // TODO: Implement setBody() method.
    }
}

