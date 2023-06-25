<?php

namespace perf\Form\Field;

class RadioTest extends FieldTestBase
{
    public function testGetFieldTypeId(): void
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertSame(Radio::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    protected function createField(string $name): Radio
    {
        return new Radio($name);
    }
}
