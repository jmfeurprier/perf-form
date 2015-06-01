<?php

namespace perf\Form\Field;

/**
 *
 *
 */
class SelectField extends FieldBase
{

    /**
     *
     *
     * @var SelectOption[]
     */
    private $options = array();

    /**
     *
     *
     * @param SelectOption[] $options
     * @return Select Fluent return.
     */
    public function setOptions(array $options)
    {
        $this->options = array();

        foreach ($options as $option) {
            $this->addOption($option);
        }

        return $this;
    }

    /**
     *
     *
     * @param SelectOption $option
     * @return Select Fluent return.
     */
    public function addOption(SelectOption $option)
    {
        $this->options[] = $option;

        return $this;
    }

    /**
     *
     *
     * @return SelectOption[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     *
     *
     * @param mixed $value
     * @return Field Fluent return.
     */
    public function setInitialValue($value)
    {
        if (!$this->isSubmitted()) {
            $this->selectOptionByValue($value);
        }

        return parent::setInitialValue($value);
    }

    /**
     *
     *
     * @param string $value
     * @return Field Fluent return.
     */
    public function setSubmittedValue($value)
    {
        $this->selectOptionByValue($value);

        return parent::setSubmittedValue($value);
    }

    /**
     *
     *
     * @param string $value
     * @return void
     */
    private function selectOptionByValue($value)
    {
        $selected = false;

        foreach ($this->getOptions() as $option) {
            // If many select options share the same value, select only the first matched one.
            if (($option->getValue() === $value) && !$selected) {
                $option->select();
                $selected = true;
            } else {
                $option->deselect();
            }
        }
    }
}
