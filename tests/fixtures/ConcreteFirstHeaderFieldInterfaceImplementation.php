<?php

use Psr\Http\HeaderFieldInterface;

class ConcreteFirstHeaderFieldInterfaceImplementation implements HeaderFieldInterface
{
    private $name  = 'X-Foo';
    private $value = 'Bar';

    /**
     * @param string $name token (header field-name)
     */
    public function setName($name)
    {
        $this->name = (string) $name;
    }

    /**
     * @return string token
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @parem string $value any combination of zero or more field-content or LWS (header field-value)
     */
    public function setValue($value)
    {
        $this->value = (string) $value;
    }

    /**
     * @return string ny combination of zero or more field-content or LWS
     */
    public function getValue()
    {
        return $this->value;
    }
}
