<?php

namespace perf\Form;

/**
 *
 */
class ErrorTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testGetId()
    {
        $id = 'foo';

        $error = new Error($id);

        $this->assertSame($id, $error->getId());
    }

    /**
     *
     */
    public function testGetMessageReturnsNull()
    {
        $id = 'foo';

        $error = new Error($id);

        $this->assertNull($error->getMessage());
    }

    /**
     *
     */
    public function testGetMessageReturnsExpected()
    {
        $id      = 'foo';
        $message = 'bar';

        $error = new Error($id);
        $error->setMessage($message);

        $this->assertSame($message, $error->getMessage());
    }

    /**
     *
     */
    public function testGetFieldNameReturnsNull()
    {
        $id = 'foo';

        $error = new Error($id);

        $this->assertNull($error->getFieldName());
    }

    /**
     *
     */
    public function testGetFieldNameReturnsExpected()
    {
        $id        = 'foo';
        $fieldName = 'bar';

        $error = new Error($id);
        $error->setFieldName($fieldName);

        $this->assertSame($fieldName, $error->getFieldName());
    }
}
