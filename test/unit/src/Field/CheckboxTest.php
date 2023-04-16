<?php

namespace perf\Form\Field;

use PHPUnit\Framework\TestCase;

class CheckboxTest extends TestCase
{
    public function testGetFieldTypeId()
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertSame(Checkbox::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    public function testIsCheckedDefault()
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertFalse($field->isChecked());
    }

    public static function dataProviderIsCheckedReturnsFalse()
    {
        return [
            ['1', '0', '0', null],
            ['1', '0', '0', '0'],
            ['1', '0', '0', '2'],
            ['1', '0', '1', '0'],
            ['0', '1', '0', '1'],
        ];
    }

    /**
     * @dataProvider dataProviderIsCheckedReturnsFalse
     */
    public function testIsCheckedReturnsFalse($checkedValue, $uncheckedValue, $initialValue, $submittedValue)
    {
        $name = 'foo';

        $field = $this->createField($name)
            ->setCheckedValue($checkedValue)
            ->setUncheckedValue($uncheckedValue)
            ->setInitialValue($initialValue);

        $field->submitValue($submittedValue);

        $this->assertFalse($field->isChecked());
        $this->assertSame($uncheckedValue, $field->getValue());
    }

    public static function dataProviderIsCheckedReturnsTrue()
    {
        return [
            ['1', '0', '0', '1'],
            ['1', '0', '1', '1'],
            ['0', '1', '0', '0'],
            ['0', '1', '1', '0'],
            ['2', '0', '0', '2'],
        ];
    }

    /**
     * @dataProvider dataProviderIsCheckedReturnsTrue
     */
    public function testIsCheckedReturnsTrue($checkedValue, $uncheckedValue, $initialValue, $submittedValue)
    {
        $name = 'foo';

        $field = $this->createField($name)
            ->setCheckedValue($checkedValue)
            ->setUncheckedValue($uncheckedValue)
            ->setInitialValue($initialValue);

        $field->submitValue($submittedValue);

        $this->assertTrue($field->isChecked());
        $this->assertSame($checkedValue, $field->getValue());
    }

    protected function createField($name)
    {
        return new Checkbox($name);
    }
}
