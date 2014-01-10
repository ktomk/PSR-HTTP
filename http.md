HTTP message interfaces
=======================

This document describes common interfaces for representing HTTP messages.

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD",
"SHOULD NOT", "RECOMMENDED", "MAY", and "OPTIONAL" in this document are to be
interpreted as described in [RFC 2119][].

[RFC 2119]: http://tools.ietf.org/html/rfc2119

1. Specification
----------------

### 1.1 Basics

HTTP messages consist of requests from client to server and responses from
server to client. These are represented by `Psr\Http\RequestInterface` and
`Psr\Http\ResponseInterface` respectively.

Both message types extend `Psr\Http\MessageInterface`, which MUST not be
implemented directly.

2. Package
----------

The interfaces and classes described as well as relevant exception classes and
a test suite to verify your implementation are provided as part of the
[psr/http](https://packagist.org/packages/psr/http) package.

3. Interfaces
-------------

### 3.1 `Psr\Http\MessageInterface`

[File `MessageInterface.php`](src/Psr/Http/MessageInterface.php)

### 3.2 `Psr\Http\RequestInterface`

```php
<?php

namespace Psr\Http;

use Psr\Http\Exception\InvalidArgumentException;

/**
 * A request message from a client to a server.
 */
interface RequestInterface extends MessageInterface
{
    /**
     * Gets the method.
     *
     * @return string Method.
     */
    public function getMethod();

    /**
     * Sets the method.
     *
     * @param string $method Method.
     *
     * @return self Reference to the request.
     */
    public function setMethod($method);

    /**
     * Gets the absolute URL.
     *
     * @return string URL.
     */
    public function getUrl();

    /**
     * Sets the absolute URL.
     *
     * @param string $url URL.
     *
     * @return self Reference to the request.
     *
     * @throws InvalidArgumentException If the URL is invalid.
     */
    public function setUrl($url);
}
```

### 3.3 `Psr\Http\ResponseInterface`

```php
<?php

namespace Psr\Http;

use Psr\Http\Exception\InvalidArgumentException;

/**
 * A request message from a server to a client.
 */
interface ResponseInterface extends MessageInterface
{
    /**
     * Gets the response status code.
     *
     * @return integer Status code.
     */
    public function getStatusCode();

    /**
     * Sets the response status code.
     *
     * @param integer $statusCode Status code.
     *
     * @return self Reference to the response.
     *
     * @throws InvalidArgumentException When the status code is not valid.
     */
    public function setStatusCode($statusCode);

    /**
     * Gets the response reason phrase.
     *
     * If it has not been explicitly set using `setReasonPhrase()` it SHOULD
     * return the RFC 2616 recommended reason phrase.
     *
     * @return string|null Reason phrase, or null if unknown.
     */
    public function getReasonPhrase();

    /**
     * Sets the response reason phrase.
     *
     * @param string $reasonPhrase Reason phrase.
     *
     * @return self Reference to the response.
     */
    public function setReasonPhrase($reasonPhrase);
}
```
