<?php

namespace perf\Form;

/**
 *
 *
 */
class SubmitInput extends FieldBase
{

    const FIELD_TYPE_ID = 'input.submit';

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
    public function __construct($name = '', $value = '')
    {
        parent::__construct($name);

        $this->value = $value;
    }

    /**
     *
     *
     * @param string $value
     * @return SubmitInput Fluent return.
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
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
