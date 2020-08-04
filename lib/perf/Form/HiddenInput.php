<?php

namespace perf\Form;

/**
 *
 *
 */
class HiddenInput extends FieldBase
{

    const FIELD_TYPE_ID = 'input.hidden';

    /**
     *
     *
     * @var string
     */
    private $value;

    /**
     * Constructor.
     *
     * @param string $name
     * @param string $value
     * @return void
     */
    public function __construct($name, $value)
    {
        parent::__construct($name);

        $this->value = $value;
    }

    /**
     *
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
