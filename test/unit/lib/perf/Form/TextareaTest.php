<?php

namespace perf\Form;

/**
 *
 */
class TextareaTest extends FieldTestBase
{

    /**
     *
     */
    public function testGetFieldTypeId()
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertSame(Textarea::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    /**
     *
     */
    protected function createField($name)
    {
        return new Textarea($name);
    }
}
