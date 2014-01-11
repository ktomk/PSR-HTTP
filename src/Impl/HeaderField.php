<?php

namespace Impl;

use InvalidArgumentException;

class HeaderField
{
    /**
     * @var string header field-name
     */
    private $name;

    /**
     * @var string header field-value
     */
    private $value;

    /**
     * @var Rules
     */
    private $rules;

    function __construct($name, $value, Rules $rules = NULL)
    {
        $this->rules = $rules ?: new Rules();
        $this->setName($name);
        $this->setValue($value);
    }

    /**
     * @param string $name token
     * @throws \InvalidArgumentException
     */
    public function setName($name)
    {
        if (!$this->rules->isToken($name)) {
            throw new InvalidArgumentException(
                sprintf("'%s' (%s) is not a valid name", $name, var_export($name, true))
            );
        }

        $this->name = (string) $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @param string|HeaderField|object $name
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function isSameName($name) {
        if (!is_object($name)) {
            $object = new HeaderField($name, '', $this->rules);
        } else {
            $object = $name;
        }

        if ($object instanceof HeaderField) {
            $string = $object->name;
        } elseif (method_exists($object, '__toString')) {
            $string = (new HeaderField($object, '', $this->rules))->getName() ;
        } else {
            throw new InvalidArgumentException(
                sprintf('Object must have __toString(), %s given', get_class($name))
            );
        }

        return 0 === strcasecmp($this->name, $string);
    }

    /**
     * @param string $value field-content
     * @throws \InvalidArgumentException
     */
    public function setValue($value)
    {
        if (!$this->rules->isFieldValue($value)) {
            throw new InvalidArgumentException(
                sprintf("'%s' (%s) is not a field value", $value, var_export($value, true))
            );
        }

        $this->value = (string) $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function toString() {
        return "$this->name: $this->value";
    }
}

