<?php

use Psr\Http\MessageInterface;
use Psr\Http\StreamInterface;

class ConcreteFirstInterfaceImplementation implements MessageInterface
{

    /**
     * Returns the message as an HTTP string.
     *
     * @return string Message as an HTTP string.
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
     * Sets the HTTP protocol version.
     *
     * @param string $protocolVersion The HTTP protocol version.
     *
     * @return self Reference to the message.
     *
     * @throws \Psr\Http\Exception\InvalidArgumentException When the HTTP protocol version is not valid.
     */
    public function setProtocolVersion($protocolVersion)
    {
        // TODO: Implement setProtocolVersion() method.
    }

    /**
     * Gets a header.
     *
     * @param string $header Header name.
     *
     * @return string|null Header value, or null if not set.
     */
    public function getHeader($header)
    {
        // TODO: Implement getHeader() method.
    }

    /**
     * Gets all headers.
     *
     * The array keys are the header name, the values the header value.
     *
     * @return array Headers.
     */
    public function getHeaders()
    {
        // TODO: Implement getHeaders() method.
    }

    /**
     * Checks if a certain header is present.
     *
     * @param string $header Header name.
     *
     * @return bool If the header is present.
     */
    public function hasHeader($header)
    {
        // TODO: Implement hasHeader() method.
    }

    /**
     * Sets a header, replacing the existing header if has already been set.
     *
     * The header name and value MUST be a string, or an object that implement
     * the `__toString()` method. The value MAY also be an array, in which case
     * it MUST be converted to a comma-separated string; the ordering MUST be
     * maintained.
     *
     * A null value will remove the existing header.
     *
     * @param string $header Header name.
     * @param string $value Header value.
     *
     * @return self Reference to the message.
     *
     * @throws \Psr\Http\Exception\InvalidArgumentException When the header name or value is not valid.
     */
    public function setHeader($header, $value)
    {
        // TODO: Implement setHeader() method.
    }

    /**
     * Sets headers, removing any that have already been set.
     *
     * The array keys must the header name, the values the header value.
     *
     * The header names and values MUST strings, or objects that implement the
     * `__toString()` method. The values MAY also be arrays, in which case they
     * MUST be converted to comma-separated strings; the ordering MUST be
     * maintained.
     *
     * @param array $headers Headers to set.
     *
     * @return self Reference to the message.
     *
     * @throws \Psr\Http\Exception\InvalidArgumentException When part of the header set is not valid.
     */
    public function setHeaders(array $headers)
    {
        // TODO: Implement setHeaders() method.
    }

    /**
     * Adds headers, replacing those that are already set.
     *
     * The array keys must the header name, the values the header value.
     *
     * The header names and values MUST strings, or objects that implement the
     * `__toString()` method. The values MAY also be arrays, in which case they
     * MUST be converted to comma-separated strings; the ordering MUST be
     * maintained.
     *
     * Null values will remove existing headers.
     *
     * @param array $headers Headers to add.
     *
     * @return self Reference to the message.
     *
     * @throws \Psr\Http\Exception\InvalidArgumentException When part of the header set is not valid.
     */
    public function addHeaders(array $headers)
    {
        // TODO: Implement addHeaders() method.
    }

    /**
     * Gets the body.
     *
     * This returns the original form, in contrast to `getBodyAsString()`.
     *
     * @return mixed|null Body, or null if not set.
     *
     * @see getBodyAsString()
     */
    public function getBody()
    {
        // TODO: Implement getBody() method.
    }

    /**
     * Gets the body as a string.
     *
     * @return string|null Body as a string, or null if not set.
     */
    public function getBodyAsString()
    {
        // TODO: Implement getBodyAsString() method.
    }

    /**
     * Sets the body.
     *
     * The body SHOULD be a string, or an object that implements the
     * `__toString()` method.
     *
     * A null value will remove the existing body.
     *
     * An implementation MAY accept other types, but MUST reject anything that
     * it does not know how to turn into a string.
     *
     * @param mixed $body Body.
     *
     * @return self Reference to the message.
     *
     * @throws \Psr\Http\Exception\InvalidArgumentException When the body is not valid.
     */
    public function setBody(StreamInterface $body = NULL)
    {
        throw new InvalidArgumentException('The body is not valid');
        // TODO: Implement setBody() method.
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
}

