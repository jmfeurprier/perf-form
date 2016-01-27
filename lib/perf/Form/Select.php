<?php

namespace perf\Form;

/**
 *
 *
 */
class Select extends Field
{

    const FIELD_TYPE_ID = 'select';

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
     * @return void
     */
    public function __construct($name)
    {
        parent::__construct($name);

        $this->options = new SelectOptionCollection();
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
            $this->options->selectOptionByValue($value);
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
        $this->options->selectOptionByValue($value);

        return parent::setSubmittedValue($value);
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
}
