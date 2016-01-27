<?php

namespace perf\Form;

/**
 *
 */
class FileUploadInputTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testGetFieldTypeId()
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertSame(FileUploadInput::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    /**
     *
     */
    protected function createField($name)
    {
        return new FileUploadInput($name);
    }
}
