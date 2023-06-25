<?php

namespace perf\Form\Field;

use perf\Form\Exception\FormException;
use PHPUnit\Framework\TestCase;

class FieldCollectionTest extends TestCase
{
    private FieldCollection $collection;

    protected function setUp(): void
    {
        $this->collection = new FieldCollection();
    }

    public function testHasWithUnknownNameWillReturnFalse(): void
    {
        $name = 'foo';

        $this->assertFalse($this->collection->has($name));
    }

    public function testHasWithKnownNameWillReturnTrue(): void
    {
        $name = 'foo';

        $field = $this->createMock(FieldInterface::class);
        $field->expects($this->atLeastOnce())->method('getName')->will($this->returnValue($name));

        $this->collection->add($field);

        $this->assertTrue($this->collection->has($name));
    }

    public function testGetWithUnknownNameWillThrowException(): void
    {
        $name = 'foo';

        $this->expectException(FormException::class);

        $this->collection->get($name);
    }

    public function testGetWithKnownNameWillReturnExpectedField(): void
    {
        $name = 'foo';

        $field = $this->createMock(FieldInterface::class);
        $field->expects($this->atLeastOnce())->method('getName')->will($this->returnValue($name));

        $this->collection->add($field);

        $result = $this->collection->get($name);

        $this->assertSame($field, $result);
    }
}
