<?php

namespace perf\Form\Field;

class SelectOption
{
    private string $value;

    private string $label;

    private bool $selected = false;

    /**
     * @param string $value
     * @param string $label
     */
    public function __construct(string $value, string $label = '')
    {
        $this->value = $value;

        $this->setLabel($label);
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function select(): self
    {
        return $this->setSelected(true);
    }

    public function deselect(): self
    {
        return $this->setSelected(false);
    }

    public function setSelected(bool $selected): self
    {
        $this->selected = $selected;

        return $this;
    }

    public function isSelected(): bool
    {
        return $this->selected;
    }
}
