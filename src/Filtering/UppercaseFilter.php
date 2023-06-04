<?php

namespace perf\Form\Filtering;

class UppercaseFilter implements FilterInterface
{
    private const ENCODING_DEFAULT = 'UTF-8';

    private string $encoding;

    public function __construct(string $encoding = self::ENCODING_DEFAULT)
    {
        $this->encoding = $encoding;
    }

    public function apply(mixed $value): string
    {
        return mb_strtoupper($value, $this->encoding);
    }
}
