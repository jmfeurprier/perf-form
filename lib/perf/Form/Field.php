<?php

namespace perf\Form;

use perf\Form\Filtering\Filter;

/**
 *
 *
 */
abstract class Field
{

    /**
     *
     *
     * @var string
     */
    private $name;

    /**
     *
     *
     * @var mixed
     */
    private $initialValue = '';

    /**
     *
     *
     * @var null|mixed
     */
    private $submittedValue = null;

    /**
     *
     *
     * @var bool
     */
    private $submitted = false;

    /**
     *
     *
     * @var Filter[]
     */
    private $filters = array();

    /**
     *
     *
     * @var string
     */
    private $label = '';

    /**
     *
     *
     * @var AttributeCollection
     */
    private $attributes;

    /**
     * Constructor.
     * To be called by subclasses.
     *
     * @param string $name
     * @return void
     */
    public function __construct($name)
    {
        $this->name = (string) $name;

        $this->attributes = new AttributeCollection();
    }

    /**
     *
     *
     * @param mixed $value
     * @return Field Fluent return.
     */
    public function setInitialValue($value)
    {
        $this->initialValue = $value;

        return $this;
    }

    /**
     *
     *
     * @param Filter $filter
     * @return Field Fluent return.
     */
    public function addFilter(Filter $filter)
    {
        $this->filters[] = $filter;

        return $this;
    }

    /**
     *
     *
     * @param string $label
     * @return Field Fluent return.
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     *
     *
     * @param string $key
     * @param mixed $value
     * @return Field Fluent return.
     */
    public function setAttribute($key, $value)
    {
        $this->attributes->set($key, $value);

        return $this;
    }

    /**
     *
     *
     * @param mixed $value
     * @return void
     */
    public function submitValue($value)
    {
        foreach ($this->filters as $filter) {
            $value = $filter->apply($value);
        }

        $this->submittedValue = $value;
        $this->submitted      = true;
    }

    /**
     *
     *
     * @return void
     */
    public function submitNoValue()
    {
        $this->submittedValue = $this->getEmptyValue();
        $this->submitted      = true;
    }

    /**
     *
     *
     * @return void
     */
    public function reset()
    {
        $this->submittedValue = null;
        $this->submitted      = false;
    }

    /**
     *
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     *
     * @return mixed
     */
    public function getValue()
    {
        if ($this->submitted) {
            return $this->submittedValue;
        }

        return $this->initialValue;
    }

    /**
     *
     *
     * @return bool
     */
    protected function isSubmitted()
    {
        return $this->submitted;
    }

    /**
     *
     * Default implementation.
     *
     * @return mixed
     */
    protected function getEmptyValue()
    {
        return '';
    }

    /**
     *
     *
     * @return string
     */
    public function getFieldTypeId()
    {
        return static::FIELD_TYPE_ID;
    }

    /**
     *
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     *
     *
     * @param string $name
     * @return bool
     */
    public function hasAttribute($name)
    {
        return $this->attributes->has($name);
    }

    /**
     *
     *
     * @param string $name
     * @return mixed
     */
    public function getAttribute($name)
    {
        return $this->attributes->get($name);
    }

    /**
     *
     *
     * @return {string:mixed}
     */
    public function getAttributes()
    {
        return $this->attributes->toArray();
    }
}
