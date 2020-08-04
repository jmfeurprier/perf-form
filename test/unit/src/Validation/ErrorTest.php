<?php

namespace perf\Form\Validation;

use perf\Form\Exception\FormException;
use PHPUnit\Framework\TestCase;

class ErrorTest extends TestCase
{
    public function testWithEmptyIdWillThrowException()
    {
        $this->expectException(FormException::class);

        new FormValidationError('');
    }

    public function testGetId()
    {
        $id = 'foo';

        $error = new FormValidationError($id);

        $this->assertSame($id, $error->getId());
    }

    public function testGetMessageReturnsNull()
    {
        $id = 'foo';

        $error = new FormValidationError($id);

        $this->assertNull($error->getMessage());
    }

    public function testGetMessageReturnsExpected()
    {
        $id      = 'foo';
        $message = 'bar';

        $error = new FormValidationError($id);
        $error->setMessage($message);

        $this->assertSame($message, $error->getMessage());
    }

    public function testWithEmptyMessageWillThrowException()
    {
        $id = 'foo';

        $error = new FormValidationError($id);

        $this->expectException(FormException::class);

        $error->setMessage('');
    }

    public function testGetFieldNameReturnsNull()
    {
        $id = 'foo';

        $error = new FormValidationError($id);

        $this->assertNull($error->getFieldName());
    }

    public function testGetFieldNameReturnsExpected()
    {
        $id        = 'foo';
        $fieldName = 'bar';

        $error = new FormValidationError($id);
        $error->setFieldName($fieldName);

        $this->assertSame($fieldName, $error->getFieldName());
    }

    public function testWithEmptyFieldNameWillThrowException()
    {
        $id = 'foo';

        $error = new FormValidationError($id);

        $this->expectException(FormException::class);

        $error->setFieldName('');
    }
}
