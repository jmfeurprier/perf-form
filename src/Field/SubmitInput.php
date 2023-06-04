<?php

namespace perf\Form\Field;

class SubmitInput extends FieldBase
{
    public const FIELD_TYPE_ID = 'input.submit';

    private string $value;

    public function __construct(string $name = '', string $value = '')
    {
        parent::__construct($name);

        $this->setValue($value);
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }
}
