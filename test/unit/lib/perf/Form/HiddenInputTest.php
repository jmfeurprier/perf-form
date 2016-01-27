<?php

namespace perf\Form;

/**
 *
 */
class HiddenInputTest extends FieldTestBase
{

    /**
     *
     */
    public function testGetFieldTypeId()
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertSame(HiddenInput::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    /**
     *
     */
    protected function createField($name)
    {
        return new HiddenInput($name);
    }
}
