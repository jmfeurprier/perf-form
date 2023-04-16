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
     * @var string[]
     */
    private array $trimmableCharacters;

    /**
     * @param string[] $trimmableCharacters
     */
    public function __construct(array $trimmableCharacters = self::TRIMMABLE_CHARACTERS_DEFAULT)
    {
        $this->trimmableCharacters = $trimmableCharacters;
    }

    /**
     * {@inheritDoc}
     */
    public function apply($value): string
    {
        $trimmableCharacters = join($this->trimmableCharacters);

        return trim($value, $trimmableCharacters);
    }
}
