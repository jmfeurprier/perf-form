<?php

namespace perf\Form\Filtering;

class TrimFilter implements FilterInterface
{
    private const TRIMMABLE_CHARACTERS_DEFAULT = [
        " ",
        "\n",
        "\r",
        "\t",
        "\0",
        "\x0b",
    ];

    /**
     * @param string[] $trimmableCharacters
     */
    public function __construct(
        private readonly array $trimmableCharacters = self::TRIMMABLE_CHARACTERS_DEFAULT
    ) {
    }

    public function apply(mixed $value): string
    {
        $trimmableCharacters = join($this->trimmableCharacters);

        return trim($value, $trimmableCharacters);
    }
}
