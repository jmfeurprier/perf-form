<?php

namespace perf\Form;

use perf\Form\ErrorCollection;

/**
 *
 *
 */
class ValidSubmission implements SubmissionOutcome
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
        return true;
    }

    /**
     *
     *
     * @return bool
     */
    public function valid()
    {
        return true;
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
