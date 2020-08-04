<?php

namespace perf\Form\Field;

class SelectTest extends FieldTestBase
{
    public function testGetFieldTypeId()
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertSame(Select::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    public function testGetValueWithInitialValueAndMultiple()
    {
        $this->markTestIncomplete();

        $name = 'foo';

        $options = [
            new SelectOption('abc'),
            new SelectOption('def'),
            new SelectOption('ghi'),
        ];

        $initialValue = [
            'abc',
            'ghi',
            'jkl',
        ];

        $field = $this->createField($name, true);
        $field->setOptions($options);
        $field->setInitialValue($initialValue);

        $expected = [
            'abc',
            'ghi',
        ];

        $this->assertSame($expected, $field->getValue());
    }

    protected function createField(string $name, bool $multiple = false): Select
    {
        return new Select($name, $multiple);
    }
}
