<?php

namespace perf\Form\Filtering;

/**
 *
 *
 */
class NullifyFilter implements Filter
{

    /**
     *
     *
     * @param mixed $value
     * @return mixed
     */
    public function apply($value)
    {
        if ('' === $value) {
            return null;
        }

        return $value;
    }
}
