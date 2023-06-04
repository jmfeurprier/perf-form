<?php

namespace perf\Form\Filtering;

class NullifyFilter implements FilterInterface
{
    public function apply(mixed $value): mixed
    {
        if ('' === $value) {
            return null;
        }

        return $value;
    }
}
