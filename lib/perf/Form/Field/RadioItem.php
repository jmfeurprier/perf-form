<?php

namespace perf\Form\Field;

/**
 *
 *
 */
class RadioItem
{

    /**
     *
     *
     * @var string
     */
    private $value;

    /**
     *
     *
     * @var string
     */
    private $label;

    /**
     *
     *
     * @var bool
     */
    private $checked = false;

    /**
     * Constructor.
     *
     * @param string $value
     * @param string $label
     * @return void
     */
    public function __construct($value, $label = '')
    {
        $this->setValue($value);
        $this->setLabel($label);
    }

    /**
     *
     *
     * @param string $value
     * @return void
     */
    private function setValue($value)
    {
        $this->value = (string) $value;
    }

    /**
     *
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     *
     *
     * @param null|string $label
     * @return RadioItem Fluent return.
     */
    public function setLabel($label)
    {
        $this->label = (string) $label;

        return $this;
    }

    /**
     *
     *
     * @return null|string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     *
     *
     * @return RadioItem Fluent return.
     */
    public function check()
    {
        return $this->setChecked(true);
    }

    /**
     *
     *
     * @return RadioItem Fluent return.
     */
    public function uncheck()
    {
        return $this->setChecked(false);
    }

    /**
     *
     *
     * @param bool $checked
     * @return RadioItem Fluent return.
     */
    public function setChecked($checked)
    {
        $this->checked = (bool) $checked;

        return $this;
    }

    /**
     *
     *
     * @return bool
     */
    public function isChecked()
    {
        return $this->checked;
    }
}
