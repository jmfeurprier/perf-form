<?php

namespace perf\Form;

/**
 *
 */
class HiddenInputTest extends \PHPUnit_Framework_TestCase
{

    private $value = 'bar';

    /**
     *
     */
    public function testGetFieldTypeId()
    {
        $name  = 'foo';
        $value = 'bar';

        $field = new HiddenInput($name, $value);

        $this->assertSame(HiddenInput::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    /**
     *
     */
    public function testGetName()
    {
        $name  = 'foo';
        $value = 'bar';

        $field = new HiddenInput($name, $value);

        $this->assertSame($name, $field->getName());
    }
}
