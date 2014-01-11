<?php

namespace Psr\Http;

/**
 * Interface HeadersInterface
 *
 * Zero, one or multiple HTTP message header-field(s)
 *
 * @package Psr\Http
 */
interface HeadersInterface
{
    /**
     * @param string $name
     * @return HeadersInterface
     */
    public function getHeaderFieldsByName($name);

    /**
     * @return string[]
     */
    public function getNames();

    /**
     * @return int number of items
     */
    public function length();

    /**
     * @param int $index zero based
     * @return HeaderFieldInterface|null
     */
    public function item($index);
}
