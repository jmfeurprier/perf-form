<?php

namespace perf\Form\Field;

use PHPUnit\Framework\TestCase;

class FileUploadInputTest extends TestCase
{
    public function testGetFieldTypeId(): void
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertSame(FileUploadInput::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    protected function createField(string $name): FileUploadInput
    {
        return new FileUploadInput($name);
    }
}
