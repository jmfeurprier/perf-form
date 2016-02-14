<?php

namespace perf\Form;

/**
 *
 */
class CheckboxTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testGetFieldTypeId()
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertSame(Checkbox::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    /**
     *
     */
    public function testIsCheckedDefault()
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertFalse($field->isChecked());
    }

    /**
     *
     */
    public function dataProviderIsCheckedReturnsFalse()
    {
        return array(
            array('1', '0', '0', null),
            array('1', '0', '0', '0'),
            array('1', '0', '0', '2'),
            array('1', '0', '1', '0'),
            array('0', '1', '0', '1'),
        );
    }

    /**
     *
     * @dataProvider dataProviderIsCheckedReturnsFalse
     */
    public function testIsCheckedReturnsFalse($checkedValue, $uncheckedValue, $initialValue, $submittedValue)
    {
        $name = 'foo';

        $field = $this->createField($name)
            ->setCheckedValue($checkedValue)
            ->setUncheckedValue($uncheckedValue)
            ->setInitialValue($initialValue)
        ;

        $field->submitValue($submittedValue);

        $this->assertFalse($field->isChecked());
        $this->assertSame($uncheckedValue, $field->getValue());
    }

    /**
     *
     */
    public function dataProviderIsCheckedReturnsTrue()
    {
        return array(
            array('1', '0', '0', '1'),
            array('1', '0', '1', '1'),
            array('0', '1', '0', '0'),
            array('0', '1', '1', '0'),
            array('2', '0', '0', '2'),
        );
    }

    /**
     *
     * @dataProvider dataProviderIsCheckedReturnsTrue
     */
    public function testIsCheckedReturnsTrue($checkedValue, $uncheckedValue, $initialValue, $submittedValue)
    {
        $name = 'foo';

        $field = $this->createField($name)
            ->setCheckedValue($checkedValue)
            ->setUncheckedValue($uncheckedValue)
            ->setInitialValue($initialValue)
        ;

        $field->submitValue($submittedValue);

        $this->assertTrue($field->isChecked());
        $this->assertSame($checkedValue, $field->getValue());
    }

    /**
     *
     */
    protected function createField($name)
    {
        return new Checkbox($name);
    }
}
