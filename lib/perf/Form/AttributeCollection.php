<?php

namespace perf\Form;

/**
 *
 *
 */
class AttributeCollection implements \IteratorAggregate
{

    /**
     *
     *
     * @var {string:mixed}
     */
    private $attributes = array();

    /**
     *
     *
     * @return \Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->attributes);
    }

    /**
     *
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /**
     *
     *
     * @param string $name
     * @return bool
     */
    public function has($name)
    {
        return array_key_exists($name, $this->attributes);
    }

    /**
     *
     *
     * @param string $name
     * @return mixed
     * @throws \DomainException
     */
    public function get($name)
    {
        if ($this->has($name)) {
            return $this->attributes[$name];
        }

        throw new \DomainException("No attribute with name '{$name}'.");
    }

    /**
     *
     *
     * @param string $name
     * @return void
     */
    public function remove($name)
    {
        unset($this->attributes[$name]);
    }

    /**
     *
     *
     * @return void
     */
    public function clear()
    {
        $this->attributes = array();
    }

    /**
     *
     *
     * @return {string:mixed}
     */
    public function toArray()
    {
        return $this->attributes;
    }
}
