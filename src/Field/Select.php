<?php

namespace perf\Form\Field;

class Select extends FieldBase
{
    public const FIELD_TYPE_ID = 'select';

    private bool $multiple = false;

    private SelectOptionCollection $options;

    public function __construct(string $name, bool $multiple = false)
    {
        parent::__construct($name);

        $this->multiple = $multiple;
        $this->options  = new SelectOptionCollection();
    }

    /**
     * @param SelectOption[] $options
     *
     * @return Select Fluent return.
     */
    public function setOptions(array $options): self
    {
        $this->options->removeAll();
        $this->options->setMany($options);

        return $this;
    }

    public function addOption(SelectOption $option): self
    {
        $this->options->addOne($option);

        return $this;
    }

    /**
     * @param SelectOption[] $options
     *
     * @return Select Fluent return.
     */
    public function addOptions(array $options): self
    {
        $this->options->addMany($options);

        return $this;
    }

    /**
     * @param mixed $value
     *
     * @return Select Fluent return.
     */
    public function setInitialValue($value): self
    {
        if (!$this->isSubmitted()) {
            $this->selectOptions($value);
        }

        parent::setInitialValue($value);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function submitValue($value): void
    {
        $this->selectOptions($value);

        parent::submitValue($value);
    }

    /**
     * @param mixed $value
     *
     * @return void
     */
    private function selectOptions($value): void
    {
        if ($this->multiple) {
            if (!is_array($value)) {
                $value = [];
            }

            $this->options->selectOptionByValues($value);

            return;
        }

        $this->options->selectOptionByValue($value);
    }

    /**
     * @return SelectOption[]
     */
    public function getOptions(): array
    {
        return $this->options->toArray();
    }

    public function isMultiple(): bool
    {
        return $this->multiple;
    }
}
