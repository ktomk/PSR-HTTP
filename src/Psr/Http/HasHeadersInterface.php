<?php

namespace Psr\Http;

/**
 * Represents an object that contains an array of HTTP headers.
 *
 * This interface is extended by RequestInterface and ResponseInterface. This
 * interface MAY be implemented directly as needed.
 */
interface HasHeadersInterface
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
    public function getHeaders();

    /**
     * Checks if a header exists by the given case-insensitive name.
     *
     * @param string $header Case-insensitive header name.
     *
     * @return bool Returns true if any header names match the given header
     *              name using a case-insensitive string comparison. Returns
     *              false if no matching header name is found in the message.
     */
    public function hasHeader($header);

    /**
     * Retrieve a header by name.
     *
     * @param string $header Header name.
     *
     * @return HeaderValuesInterface|null Returns the header values or or null
     *                                    if not set.
     */
    public function getHeader($header);

    /**
     * Sets a header, replacing any existing values of any headers with the
     * same case-insensitive name.
     *
     * The header values MUST be a string, an array of strings, or a
     * HeaderValuesInterface object.
     *
     * @param string                             $header Header name
     * @param string|array|HeaderValuesInterface $value  Header value(s)
     *
     * @return self Returns the message.
     */
    public function setHeader($header, $value);

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
    public function setHeaders(array $headers);

    /**
     * Appends a header value to any existing values associated with the
     * given header name.
     *
     * @param string $header Header name to add
     * @param string $value  Value of the header
     *
     * @return self
     */
    public function addHeader($header, $value);

    /**
     * Remove a specific header by case-insensitive name.
     *
     * @param string $header HTTP header to remove
     *
     * @return self
     */
    public function removeHeader($header);
}