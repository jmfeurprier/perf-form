<?php

namespace perf\Form;

/**
 *
 */
class SelectTest extends FieldTestBase
{

    /**
     *
     */
    public function testGetFieldTypeId()
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertSame(Select::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    /**
     *
     */
    public function testGetValueWithInitialValueAndMultiple()
    {
        $name = 'foo';

        $options = array(
            new SelectOption('abc'),
            new SelectOption('def'),
            new SelectOption('ghi'),
        );

        $initialValue = array(
            'abc',
            'ghi',
            'jkl',
        );

        $field = $this->createField($name, true);
//        $field->setMultiple();
        $field->setOptions($options);
        $field->setInitialValue($initialValue);

        $expected = array(
            'abc',
            'ghi',
        );

        $this->assertSame($expected, $field->getValue());
    }

    /**
     *
     */
    protected function createField($name, $multiple = false)
    {
        return new Select($name, $multiple);
    }
}
