<?php

namespace perf\Form\Field;

class HiddenInput extends FieldBase
{
    public const FIELD_TYPE_ID = 'input.hidden';

    private string $value;

    public function __construct(string $name, string $value)
    {
        parent::__construct($name);

        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
