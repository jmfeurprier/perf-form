<?php

namespace perf\Form;

use perf\Form\Error;
use perf\Form\ErrorCollection;

/**
 *
 *
 */
class InvalidSubmission implements SubmissionOutcome
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
     * @param Error[] $errors
     * @param {string:mixed} $values
     * @return void
     */
    public function __construct(array $errors, array $values)
    {
        $this->errors = new ErrorCollection($errors);
        $this->values = $values;
    }

    /**
     *
     *
     * @return bool
     */
    public function submitted()
    {
        return true;
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
