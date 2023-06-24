<?php

namespace perf\Form\Filtering;

class LowercaseFilter implements FilterInterface
{
    private const ENCODING_DEFAULT = 'UTF-8';

    private string $encoding;

    public function __construct(string $encoding = self::ENCODING_DEFAULT)
    {
        $this->encoding = $encoding;
    }

    public function apply(mixed $value): mixed
    {
        if (is_string($value)) {
            return mb_strtolower($value, $this->encoding);
        }

        return $value;
    }
}
