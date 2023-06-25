<?php

namespace perf\Form\Field;

class RadioItem
{
    private string $label;

    private bool $checked = false;

    public function __construct(
        private readonly string $value,
        string $label = ''
    ) {
        $this->setLabel($label);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function check(): self
    {
        return $this->setChecked(true);
    }

    public function uncheck(): self
    {
        return $this->setChecked(false);
    }

    public function setChecked(bool $checked): self
    {
        $this->checked = $checked;

        return $this;
    }

    public function isChecked(): bool
    {
        return $this->checked;
    }
}
