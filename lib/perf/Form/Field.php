<?php

namespace perf\Form;

use perf\Form\Filtering\Filter;

/**
 *
 *
 */
interface Field
{
    /**
     *
     *
     * @param mixed $value
     * @return Field Fluent return.
     */
    public function setInitialValue($value);

    /**
     *
     *
     * @param Filter $filter
     * @return Field Fluent return.
     */
    public function addFilter(Filter $filter);

    /**
     *
     *
     * @param string $label
     * @return Field Fluent return.
     */
    public function setLabel($label);

    /**
     *
     *
     * @param string $key
     * @param mixed $value
     * @return Field Fluent return.
     */
    public function setAttribute($key, $value);

    /**
     *
     *
     * @param mixed $value
     * @return void
     */
    public function submitValue($value);

    /**
     *
     *
     * @return void
     */
    public function submitNoValue();

    /**
     *
     *
     * @return void
     */
    public function reset();

    /**
     *
     *
     * @return string
     */
    public function getName();

    /**
     *
     *
     * @return mixed
     */
    public function getValue();

    /**
     *
     *
     * @return string
     */
    public function getFieldTypeId();

    /**
     *
     *
     * @return string
     */
    public function getLabel();

    /**
     *
     *
     * @param string $name
     * @return bool
     */
    public function hasAttribute($name);

    /**
     *
     *
     * @param string $name
     * @return mixed
     */
    public function getAttribute($name);

    /**
     *
     *
     * @return {string:mixed}
     */
    public function getAttributes();
}
