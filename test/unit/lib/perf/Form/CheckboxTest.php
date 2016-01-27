<?php

namespace perf\Form;

/**
 *
 */
class CheckboxTest extends FieldTestBase
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
    protected function createField($name)
    {
        return new Checkbox($name);
    }
}
