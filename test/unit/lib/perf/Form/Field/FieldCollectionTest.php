<?php

namespace perf\Form\Field;

/**
 *
 */
class FieldCollectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    protected function setUp()
    {
        $this->collection = new FieldCollection();
    }

    /**
     *
     */
    public function testHasWithUnknownNameWillReturnFalse()
    {
        $name = 'foo';

        $this->assertFalse($this->collection->has($name));
    }

    /**
     *
     */
    public function testHasWithKnownNameWillReturnTrue()
    {
        $name = 'foo';

        $field = $this->getMock('\\perf\\Form\\Field\\Field');
        $field->expects($this->atLeastOnce())->method('getName')->will($this->returnValue($name));

        $this->collection->add($field);

        $this->assertTrue($this->collection->has($name));
    }

    /**
     *
     * @expectedException \DomainException
     */
    public function testGetWithUnknownNameWillThrowException()
    {
        $name = 'foo';

        $this->collection->get($name);
    }

    /**
     *
     */
    public function testGetWithKnownNameWillReturnExpectedField()
    {
        $name = 'foo';

        $field = $this->getMock('\\perf\\Form\\Field\\Field');
        $field->expects($this->atLeastOnce())->method('getName')->will($this->returnValue($name));

        $this->collection->add($field);

        $result = $this->collection->get($name);

        $this->assertSame($field, $result);
    }
}
