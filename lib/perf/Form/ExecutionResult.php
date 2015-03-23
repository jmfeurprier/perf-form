<?php

namespace perf\Form;

/**
 *
 *
 */
interface ExecutionResult
{

    /**
     *
     *
     * @return bool
     */
    public function submitted();

    /**
     *
     *
     * @return bool
     */
    public function valid();

    /**
     *
     *
     * @return ErrorCollection
     */
    public function getErrors();

    /**
     *
     *
     * @return mixed[]
     */
    public function getValues();
}
