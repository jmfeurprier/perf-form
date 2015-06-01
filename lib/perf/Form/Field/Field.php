<?php

namespace perf\Form\Field;

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
     * @param mixed $value
     * @return Field Fluent return.
     */
    public function setSubmittedValue($value);

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
     * @return Field Fluent return.
     */
    public function reset();
}
