<?php

namespace Psr\Http;

/**
 * Interface HeaderFieldInterface
 *
 * Header Field
 *
 * @package Psr\Http
 */
interface HeaderFieldInterface
{
    /**
     * @param string $name token (header field-name)
     */
    public function setName($name);

    /**
     * @return string token
     */
    public function getName();

    /**
     * @parem string $value any combination of zero or more field-content or LWS (header field-value)
     */
    public function setValue($value);

    /**
     * @return string ny combination of zero or more field-content or LWS
     */
    public function getValue();
}
