<?php

namespace perf\Form;

/**
 *
 *
 */
class Checkbox extends Field
{

    const FIELD_TYPE_ID = 'input.checkbox';
    /**
     *
     *
     * @var string
     */
    private $checkedValue = '1';

    /**
     *
     *
     * @var string
     */
    private $uncheckedValue = '0';

    /**
     *
     *
     * @param string $value
     * @return Checkbox Fluent return.
     */
    public function setCheckedValue($value)
    {
        $this->checkedValue = (string) $value;

        return $this;
    }

    /**
     *
     *
     * @param string $value
     * @return Checkbox Fluent return.
     */
    public function setUncheckedValue($value)
    {
        $this->uncheckedValue = (string) $value;

        return $this;
    }

    /**
     *
     *
     * @return mixed
     */
    protected function getEmptyValue()
    {
        return $this->uncheckedValue;
    }

    /**
     *
     *
     * @return string
     */
    public function getCheckedValue()
    {
        return $this->checkedValue;
    }

    /**
     *
     *
     * @return string
     */
    public function getUncheckedValue()
    {
        return $this->uncheckedValue;
    }

    /**
     *
     *
     * @return mixed
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
     *
     *
     * @return bool
     */
    public function isChecked()
    {
        $this->assertCoherent();

        $value = parent::getValue();

        return ($value === $this->checkedValue);
    }

    /**
     *
     *
     * @return void
     * @throws \RuntimeException
     */
    private function assertCoherent()
    {
        if ($this->checkedValue === $this->uncheckedValue) {
            throw new \RuntimeException("Checked value and unchecked value cannot be the same.");
        }
    }
}
