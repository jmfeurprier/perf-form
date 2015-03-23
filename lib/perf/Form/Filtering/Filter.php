<?php

namespace perf\Form\Filtering;

/**
 *
 *
 */
interface Filter
{

    /**
     *
     *
     * @param mixed $value
     * @return mixed
     */
    public function apply($value);
}
