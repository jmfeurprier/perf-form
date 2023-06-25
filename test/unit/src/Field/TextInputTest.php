<?php

namespace perf\Form\Field;

class TextInputTest extends FieldTestBase
{
    public function testGetFieldTypeId(): void
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertSame(TextInput::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    protected function createField(string $name): TextInput
    {
        return new TextInput($name);
    }
}
