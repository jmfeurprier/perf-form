<?php

namespace perf\Form\Field;

class RadioTest extends FieldTestBase
{
    public function testGetFieldTypeId()
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertSame(Radio::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    protected function createField(string $name)
    {
        return new Radio($name);
    }
}
