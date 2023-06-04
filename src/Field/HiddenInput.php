<?php

namespace perf\Form\Field;

class HiddenInput extends FieldBase
{
    public const FIELD_TYPE_ID = 'input.hidden';

    public function __construct(
        string $name,
        private readonly string $value
    ) {
        parent::__construct($name);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
