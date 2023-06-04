<?php

namespace perf\Form\Filtering;

interface FilterInterface
{
    public function apply(mixed $value): mixed;
}
