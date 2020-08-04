<?php

namespace perf\Form\Filtering;

class NullifyFilter implements FilterInterface
{
    /**
     * {@inheritDoc}
     */
    public function apply($value)
    {
        if ('' === $value) {
            return null;
        }

        return $value;
    }
}
