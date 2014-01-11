<?php

namespace Psr\Http;

/**
 * Message factory.
 */
interface MessageFactoryInterface
{
    /**
     * Create a new request based on the HTTP method.
     *
     * The URL MUST be a string or an object that implements the __toString()
     * method.
     *
     * Headers must be an array which maps header names to either a string, an
     * array of strings, or a HeaderValuesInterface object.
     *
     * Body MUST be either a StreamInterface, string, an object that implements
     * the __toString() method, or a resource as returned from PHP's fopen()
     * function.
     *
     * The $options array is a custom associative array of options that are
     * completely implementation specific options. These are options allow
     * implementations to be interoperable, while still providing the ability
     * to expose custom features.
     *
     * @param string $method  HTTP method (GET, POST, PUT, etc...)
     * @param string $url     URL to send the request to
     * @param array  $headers Request headers
     * @param mixed  $body    Body to send in the request
     * @param array  $options Array of options to apply to the request
     *
     * @return RequestInterface
     */
    public function createRequest(
        $method,
        $url,
        array $headers = array(),
        $body = null,
        array $options = array()
    );

    /**
     * Creates a response.
     *
     * Headers must be an array which maps header names to either a string, an
     * array of strings, or a HeaderValuesInterface object.
     *
     * Body MUST be either a StreamInterface, string, an object that implements
     * the __toString() method, or a resource as returned from PHP's fopen()
     * function.
     *
     * The $options array is a custom associative array of options that are
     * completely implementation specific options. These are options allow
     * implementations to be interoperable, while still providing the ability
     * to expose custom features.
     *
     * @param int   $statusCode HTTP status code
     * @param array $headers    Response headers
     * @param mixed $body       Response body
     * @param array $options    Array of options to apply to the response.
     *
     * @return ResponseInterface
     */
    public function createResponse(
        $statusCode,
        array $headers = array(),
        $body = null,
        array $options = array()
    );
}
