<?php

namespace perf\Form;

/**
 *
 *
 */
class Select extends FieldBase
{

    const FIELD_TYPE_ID = 'select';

    /**
     *
     *
     * @var bool
     */
    private $multiple = false;

    /**
     *
     *
     * @var SelectOptionCollection
     */
    private $options;

    /**
     * Constructor.
     *
     * @param string $name
     * @param bool   $multiple
     * @return void
     */
    public function __construct($name, $multiple = false)
    {
        parent::__construct($name);

        $this->multiple = (bool) $multiple;
        $this->options  = new SelectOptionCollection();
    }

    /**
     *
     *
     * @param SelectOption[] $options
     * @return Select Fluent return.
     */
    public function setOptions(array $options)
    {
        $this->options->removeAll();
        $this->options->setMany($options);

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
        $this->options->addOne($option);

        return $this;
    }

    /**
     *
     *
     * @param SelectOption[] $options
     * @return Select Fluent return.
     */
    public function addOptions(array $options)
    {
        $this->options->addMany($options);

        return $this;
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
            $this->selectOptions($value);
        }

        return parent::setInitialValue($value);
    }

    /**
     *
     *
     * @param mixed $value
     * @return Field Fluent return.
     */
    public function submitValue($value)
    {
        $this->selectOptions($value);

        return parent::submitValue($value);
    }

    /**
     *
     *
     * @param mixed $value
     * @return void
     */
    private function selectOptions($value)
    {
        if ($this->multiple) {
            if (!is_array($value)) {
                $value = array();
            }

            $this->options->selectOptionByValues($value);
        } else {
            $this->options->selectOptionByValue($value);
        }
    }

    /**
     *
     *
     * @return SelectOption[]
     */
    public function getOptions()
    {
        return $this->options->toArray();
    }

    /**
     *
     *
     * @return bool
     */
    public function isMultiple()
    {
        return $this->multiple;
    }
}
