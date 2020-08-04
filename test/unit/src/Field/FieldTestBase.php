<?php

namespace perf\Form\Field;

use perf\Form\Filtering\FilterInterface;
use PHPUnit\Framework\TestCase;

abstract class FieldTestBase extends TestCase
{
    public function testGetName()
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertSame($name, $field->getName());
    }

    public function testGetValueWithInitialValue()
    {
        $name         = 'foo';
        $initialValue = 'bar';

        $field = $this->createField($name);
        $field->setInitialValue($initialValue);

        $this->assertSame($initialValue, $field->getValue());
    }

    public function testGetValueWithSubmittedValue()
    {
        $name           = 'foo';
        $initialValue   = 'bar';
        $submittedValue = 'baz';

        $field = $this->createField($name);
        $field->setInitialValue($initialValue);
        $field->submitValue($submittedValue);

        $this->assertSame($submittedValue, $field->getValue());
    }

    public function testGetValueWithInitialValueAndFilterDoesNotModifyValue()
    {
        $name         = 'foo';
        $initialValue = 'bar';

        $filter = $this->createMock(FilterInterface::class);
        $filter->expects($this->never())->method('apply');

        $field = $this->createField($name);
        $field->addFilter($filter);
        $field->setInitialValue($initialValue);

        $this->assertSame($initialValue, $field->getValue());
    }

    public function testGetValueWithSubmittedValueAndFilterModifiesValue()
    {
        $name           = 'foo';
        $initialValue   = 'bar';
        $submittedValue = 'baz';
        $filteredValue  = 'qux';

        $filter = $this->createMock(FilterInterface::class);
        $filter->expects($this->atLeastOnce())->method('apply')->with($submittedValue)->will(
            $this->returnValue($filteredValue)
        );

        $field = $this->createField($name);
        $field->addFilter($filter);
        $field->setInitialValue($initialValue);
        $field->submitValue($submittedValue);

        $this->assertSame($filteredValue, $field->getValue());
    }

    public function testResetReAssignsInitialValue()
    {
        $name           = 'foo';
        $initialValue   = 'bar';
        $submittedValue = 'baz';

        $field = $this->createField($name);
        $field->setInitialValue($initialValue);
        $field->submitValue($submittedValue);
        $field->reset();

        $this->assertSame($initialValue, $field->getValue());
    }

    public function testGetFieldTypeId()
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertSame(TextInput::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    abstract protected function createField(string $name);
}
