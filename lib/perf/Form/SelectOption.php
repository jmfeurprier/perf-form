<?php

namespace perf\Form;

/**
 *
 *
 */
class SelectOption
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
    private $selected = false;

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
     * @return SelectOption Fluent return.
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
     * @return SelectOption Fluent return.
     */
    public function select()
    {
        return $this->setSelected(true);
    }

    /**
     *
     *
     * @return SelectOption Fluent return.
     */
    public function deselect()
    {
        return $this->setSelected(false);
    }

    /**
     *
     *
     * @param bool $selected
     * @return SelectOption Fluent return.
     */
    public function setSelected($selected)
    {
        $this->selected = (bool) $selected;

        return $this;
    }

    /**
     *
     *
     * @return bool
     */
    public function isSelected()
    {
        return $this->selected;
    }
}
