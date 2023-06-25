<?php

namespace perf\Form\Filtering;

readonly class LowercaseFilter implements FilterInterface
{
    private const ENCODING_DEFAULT = 'UTF-8';

    public function __construct(
        private string $encoding = self::ENCODING_DEFAULT
    ) {
    }

    public function apply(mixed $value): mixed
    {
        if (is_string($value)) {
            return mb_strtolower($value, $this->encoding);
        }

        return $value;
    }
}
