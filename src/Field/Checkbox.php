<?php

namespace perf\Form\Field;

use perf\Form\Exception\FormException;

class Checkbox extends FieldBase
{
    public const FIELD_TYPE_ID = 'input.checkbox';

    private string $checkedValue = '1';

    private string $uncheckedValue = '0';

    public function setCheckedValue(string $value): self
    {
        $this->checkedValue = $value;

        return $this;
    }

    public function setUncheckedValue(string $value): self
    {
        $this->uncheckedValue = $value;

        return $this;
    }

    protected function getEmptyValue(): string
    {
        return $this->uncheckedValue;
    }

    public function getCheckedValue(): string
    {
        return $this->checkedValue;
    }

    public function getUncheckedValue(): string
    {
        return $this->uncheckedValue;
    }

    /**
     * @return mixed
     *
     * @throws FormException
     */
    public function getValue()
    {
        $this->assertCoherent();

        $value = parent::getValue();

        if ($value === $this->checkedValue) {
            return $this->checkedValue;
        }

        return $this->uncheckedValue;
    }

    /**
     * @return bool
     *
     * @throws FormException
     */
    public function isChecked(): bool
    {
        $this->assertCoherent();

        $value = parent::getValue();

        return ($value === $this->checkedValue);
    }

    /**
     * @return void
     *
     * @throws FormException
     */
    private function assertCoherent(): void
    {
        if ($this->checkedValue === $this->uncheckedValue) {
            throw new FormException('Checked value and unchecked value cannot be the same.');
        }
    }
}
