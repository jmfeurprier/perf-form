<?php

namespace perf\Form\Field;

class Select extends FieldBase
{
    public const FIELD_TYPE_ID = 'select';

    private SelectOptionCollection $options;

    public function __construct(
        string $name,
        private readonly bool $multiple = false
    ) {
        parent::__construct($name);

        $this->options = new SelectOptionCollection();
    }

    /**
     * @param SelectOption[] $options
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
     */
    public function addOptions(array $options): self
    {
        $this->options->addMany($options);

        return $this;
    }

    public function setInitialValue(mixed $value): self
    {
        if (!$this->isSubmitted()) {
            $this->selectOptions($value);
        }

        parent::setInitialValue($value);

        return $this;
    }

    public function submitValue(mixed $value): void
    {
        $this->selectOptions($value);

        parent::submitValue($value);
    }

    private function selectOptions(mixed $value): void
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
