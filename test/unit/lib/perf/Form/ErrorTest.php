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
    public static function dataProviderInvalidId()
    {
        return array(
            array(null),
            array(123),
            array(''),
            array(array('foo')),
        );
    }

    /**
     *
     * @dataProvider dataProviderInvalidId
     * @expectedException \InvalidArgumentException
     */
    public function testWithInvalidIdWillThrowException($id)
    {
        new Error($id);
    }

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
    public static function dataProviderInvalidMessage()
    {
        return array(
            array(123),
            array(array('foo')),
        );
    }

    /**
     *
     * @dataProvider dataProviderInvalidMessage
     */
    public function testWithInvalidMessageWillThrowException($message)
    {
        $id = 'foo';

        $error = new Error($id);

        $this->setExpectedException('\\InvalidArgumentException');

        $error->setMessage($message);
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

    /**
     *
     */
    public static function dataProviderInvalidFieldName()
    {
        return array(
            array(123),
            array(array('foo')),
        );
    }

    /**
     *
     * @dataProvider dataProviderInvalidFieldName
     */
    public function testWithInvalidFieldNameWillThrowException($fieldName)
    {
        $id = 'foo';

        $error = new Error($id);

        $this->setExpectedException('\\InvalidArgumentException');

        $error->setFieldName($fieldName);
    }
}
