<?php

namespace perf\Form\Field;

class SelectTest extends FieldTestBase
{
    public function testGetFieldTypeId(): void
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertSame(Select::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    public function testGetValueWithInitialValueAndMultiple(): never
    {
        $this->markTestIncomplete();
    }

    protected function createField(string $name, bool $multiple = false): Select
    {
        return new Select($name, $multiple);
    }
}
