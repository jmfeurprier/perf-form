<?php

namespace perf\Form\Field;

/**
 *
 */
class TextFieldTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testGetName()
    {
        $name = 'foo';

        $field = new TextField($name);

        $this->assertSame($name, $field->getName());
    }

    /**
     *
     */
    public function testGetValueWithInitialValue()
    {
        $name         = 'foo';
        $initialValue = 'bar';

        $field = new TextField($name);
        $field->setInitialValue($initialValue);

        $this->assertSame($initialValue, $field->getValue());
    }

    /**
     *
     */
    public function testGetValueWithSubmittedValue()
    {
        $name           = 'foo';
        $initialValue   = 'bar';
        $submittedValue = 'baz';

        $field = new TextField($name);
        $field->setInitialValue($initialValue);
        $field->setSubmittedValue($submittedValue);

        $this->assertSame($submittedValue, $field->getValue());
    }

    /**
     *
     */
    public function testGetValueWithInitialValueAndFilterDoesNotModifyValue()
    {
        $name         = 'foo';
        $initialValue = 'bar';

        $filter = $this->getMock('\\perf\\Form\\Filtering\\Filter');
        $filter->expects($this->never())->method('apply');

        $field = new TextField($name);
        $field->addFilter($filter);
        $field->setInitialValue($initialValue);

        $this->assertSame($initialValue, $field->getValue());
    }

    /**
     *
     */
    public function testGetValueWithSubmittedValueAndFilterModifiesValue()
    {
        $name           = 'foo';
        $initialValue   = 'bar';
        $submittedValue = 'baz';
        $filteredValue  = 'qux';

        $filter = $this->getMock('\\perf\\Form\\Filtering\\Filter');
        $filter->expects($this->atLeastOnce())->method('apply')->with($submittedValue)->will($this->returnValue($filteredValue));

        $field = new TextField($name);
        $field->addFilter($filter);
        $field->setInitialValue($initialValue);
        $field->setSubmittedValue($submittedValue);

        $this->assertSame($filteredValue, $field->getValue());
    }

    /**
     *
     */
    public function testResetReAssignsInitialValue()
    {
        $name           = 'foo';
        $initialValue   = 'bar';
        $submittedValue = 'baz';

        $field = new TextField($name);
        $field->setInitialValue($initialValue);
        $field->setSubmittedValue($submittedValue);
        $field->reset();

        $this->assertSame($initialValue, $field->getValue());
    }
}
