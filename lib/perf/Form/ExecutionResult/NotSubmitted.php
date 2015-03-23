<?php

namespace perf\Form\ExecutionResult;

use perf\Form\ErrorCollection;
use perf\Form\ExecutionResult;

/**
 *
 *
 */
class NotSubmitted implements ExecutionResult
{

    /**
     *
     *
     * @var ErrorCollection
     */
    private $errors;

    /**
     *
     *
     * @var {string:mixed}
     */
    private $values;

    /**
     * Constructor.
     *
     * @param {string:mixed} $values
     * @return void
     */
    public function __construct(array $values)
    {
        $this->errors = new ErrorCollection(array());
        $this->values = $values;
    }

    /**
     *
     *
     * @return bool
     */
    public function submitted()
    {
        return false;
    }

    /**
     *
     *
     * @return bool
     */
    public function valid()
    {
        return false;
    }

    /**
     *
     *
     * @return ErrorCollection
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     *
     *
     * @return {string:mixed}
     */
    public function getValues()
    {
        return $this->values;
    }
}
