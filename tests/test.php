<?php
/**
 * Simple Testcase
 */

require __DIR__ . '/autoload.php';

require __DIR__ . '/fixtures/ConcreteFirstInterfaceImplementation.php';

$obj = new ConcreteFirstInterfaceImplementation();

try {
    $obj->setBody(NULL);
} catch (\Psr\Http\Exception\InvalidArgumentException $exception) {
    
}

