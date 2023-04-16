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

    /**
     * {@inheritDoc}
     */
    public function apply($value): string
    {
        return mb_strtolower($value, $this->encoding);
    }
}
