<?php

namespace perf\Form\Filtering;

interface FilterInterface
{
    /**
     * @param mixed $value
     *
     * @return mixed
     */
    public function apply($value);
}
