<?php

namespace Psr\Http;

/**
 * Represents a collection of header values.
 *
 * When implementing the methods required for ArrayAccess, implementations MUST
 * return null when accessing an index that does not exist and MAY NOT emit a
 * warning.
 *
 * When implementing the Countable interface, implementations MUST return the
 * number of values in the list of header values.
 */
interface HeaderValuesInterface extends \Countable, \Traversable, \ArrayAccess
{
    /**
     * Convert the header values to a string, concatenating multiple values
     * using a comma.
     *
     * @return string
     */
    public function __toString();
}
