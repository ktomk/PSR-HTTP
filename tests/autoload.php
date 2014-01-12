<?php
/**
 * autoloader for all tests
 */

require __DIR__ . '/../src/Psr/Http/HeaderFieldInterface.php';
require __DIR__ . '/../src/Psr/Http/HeadersInterface.php';
require __DIR__ . '/../src/Psr/Http/HeadersIterator.php';
require __DIR__ . '/../src/Psr/Http/NamedHeadersIterator.php';
require __DIR__ . '/../src/Psr/Http/NamedHeaders.php';
require __DIR__ . '/../src/Psr/Http/StreamInterface.php';
require __DIR__ . '/../src/Psr/Http/MessageInterface.php';
require __DIR__ . '/../src/Psr/Http/RequestInterface.php';
require __DIR__ . '/../src/Psr/Http/ResponseInterface.php';

require __DIR__ . '/../src/Impl/Rules.php';
require __DIR__ . '/../src/Impl/HeaderField.php';
require __DIR__ . '/../src/Impl/Headers.php';
require __DIR__ . '/../src/Impl/Message.php';
require __DIR__ . '/../src/Impl/MessageHeaderIterator.php';
require __DIR__ . '/../src/Impl/MessageHeaders.php';
