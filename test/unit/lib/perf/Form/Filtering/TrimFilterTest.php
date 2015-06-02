<?php

namespace perf\Form\Filtering;

/**
 *
 */
class TrimFilterTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    protected function setUp()
    {
        $this->filter = new TrimFilter();
    }

    /**
     *
     */
    public function testApply()
    {
        $value = ' foo ';

        $this->assertSame('foo' , $this->filter->apply($value));
    }
}
