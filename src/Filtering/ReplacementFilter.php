<?php

namespace perf\Form\Filtering;

class ReplacementFilter implements FilterInterface
{
    /**
     * @var {string:string}
     */
    private array $replacements = [];

    /**
     * @param {string:string} $replacements
     */
    public function __construct(array $replacements)
    {
        $this->replacements = $replacements;
    }

    /**
     * {@inheritDoc}
     */
    public function apply($value)
    {
        $search  = array_keys($this->replacements);
        $replace = array_values($this->replacements);

        return str_replace($search, $replace, $value);
    }
}
