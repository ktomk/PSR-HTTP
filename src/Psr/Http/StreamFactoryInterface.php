<?php

namespace Psr\Http\StreamFactoryInterface;

/**
 * Describes a stream factory instance that is used to create
 * StreamFactoryInterface objects.
 */
interface StreamFactoryInterface
{
    /**
     * Creates an {@see StreamInterface} object from various input formats. The
     * following input types SHOULD be supported, and implementations MAY add
     * additional creational behavior if necessary.
     *
     * 1. Pass a string or object that implements __toString() to create a
     *    stream object that contains a string of data. The created stream MUST
     *    be readable and writable.
     * 2. Pass a PHP resource returned from fopen() to create a stream that
     *    wraps a PHP stream resource.
     * 3. Pass NULL or omit the argument to create an empty StreamInterface
     *    object that is readable and writable.
     * 4. Implementations MAY choose to expose additional creational behavior
     *    as necessary.
     *
     * @param string|resource|object $data Stream data to use when creating the
     *                                     StreamInterface object.
     * @return StreamInterface
     */
    public function create($data = null);
}
