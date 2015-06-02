<?php

namespace perf\Form\Filtering;

/**
 *
 */
class UppercaseFilterTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    protected function setUp()
    {
        $this->filter = new UppercaseFilter();
    }

    /**
     *
     */
    public function testApply()
    {
        $value = 'foo';

        $this->assertSame('FOO' , $this->filter->apply($value));
    }
}
