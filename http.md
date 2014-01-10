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

[File `RequestInterface.php`](src/Psr/Http/RequestInterface.php)

### 3.3 `Psr\Http\ResponseInterface`

[File `ResponseInterface.php`](src/Psr/Http/ResponseInterface.php)
