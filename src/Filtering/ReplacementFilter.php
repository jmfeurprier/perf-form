<?php

namespace perf\Form\Filtering;

class ReplacementFilter implements FilterInterface
{
    /**
     * @var array<string, string>
     */
    private array $replacements = [];

    /**
     * @param array<string, string> $replacements
     */
    public function __construct(array $replacements)
    {
        foreach ($replacements as $search => $replace) {
            $this->addReplacement($search, $replace);
        }
    }

    private function addReplacement(string $search, string $replace): void
    {
        $this->replacements[$search] = $replace;
    }

    public function apply(mixed $value): mixed
    {
        $search  = array_keys($this->replacements);
        $replace = array_values($this->replacements);

        return str_replace($search, $replace, $value);
    }
}
