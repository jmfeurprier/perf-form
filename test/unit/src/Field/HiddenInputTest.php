<?php

namespace perf\Form\Field;

use PHPUnit\Framework\TestCase;

class HiddenInputTest extends TestCase
{
    public function testGetFieldTypeId(): void
    {
        $name  = 'foo';
        $value = 'bar';

        $field = new HiddenInput($name, $value);

        $this->assertSame(HiddenInput::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    public function testGetName(): void
    {
        $name  = 'foo';
        $value = 'bar';

        $field = new HiddenInput($name, $value);

        $this->assertSame($name, $field->getName());
    }
}
