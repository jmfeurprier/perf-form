<?php

namespace perf\Form;

use ArrayIterator;
use IteratorAggregate;
use perf\Form\Exception\FormException;

class AttributeCollection implements IteratorAggregate
{
    /**
     * @var {string:mixed}
     */
    private $attributes = [];

    /**
     * {@inheritDoc}
     */
    public function getIterator()
    {
        return new ArrayIterator($this->attributes);
    }

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @return void
     */
    public function set(string $name, $value): void
    {
        $this->attributes[$name] = $value;
    }

    public function has(string $name): bool
    {
        return array_key_exists($name, $this->attributes);
    }

    /**
     * @param string $name
     *
     * @return mixed
     *
     * @throws FormException
     */
    public function get(string $name)
    {
        if ($this->has($name)) {
            return $this->attributes[$name];
        }

        throw new FormException("No attribute with name '{$name}'.");
    }

    public function remove(string $name): void
    {
        unset($this->attributes[$name]);
    }

    public function clear(): void
    {
        $this->attributes = [];
    }

    /**
     * @return {string:mixed}
     */
    public function toArray()
    {
        return $this->attributes;
    }
}
