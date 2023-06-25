<?php

namespace perf\Form\Validation;

use perf\Form\Exception\FormException;
use PHPUnit\Framework\TestCase;

class ErrorTest extends TestCase
{
    public function testWithEmptyIdWillThrowException(): void
    {
        $this->expectException(FormException::class);

        new FormValidationError('');
    }

    public function testGetId(): void
    {
        $id = 'foo';

        $error = new FormValidationError($id);

        $this->assertSame($id, $error->getId());
    }

    public function testGetMessageReturnsNull(): void
    {
        $id = 'foo';

        $error = new FormValidationError($id);

        $this->assertNull($error->getMessage());
    }

    public function testGetMessageReturnsExpected(): void
    {
        $id      = 'foo';
        $message = 'bar';

        $error = new FormValidationError($id);
        $error->setMessage($message);

        $this->assertSame($message, $error->getMessage());
    }

    public function testWithEmptyMessageWillThrowException(): void
    {
        $id = 'foo';

        $error = new FormValidationError($id);

        $this->expectException(FormException::class);

        $error->setMessage('');
    }

    public function testGetFieldNameReturnsNull(): void
    {
        $id = 'foo';

        $error = new FormValidationError($id);

        $this->assertNull($error->getFieldName());
    }

    public function testGetFieldNameReturnsExpected(): void
    {
        $id        = 'foo';
        $fieldName = 'bar';

        $error = new FormValidationError($id);
        $error->setFieldName($fieldName);

        $this->assertSame($fieldName, $error->getFieldName());
    }

    public function testWithEmptyFieldNameWillThrowException(): void
    {
        $id = 'foo';

        $error = new FormValidationError($id);

        $this->expectException(FormException::class);

        $error->setFieldName('');
    }
}
