<?php

namespace perf\Form\Filtering;

/**
 *
 */
class LowercaseFilterTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    protected function setUp()
    {
        $this->filter = new LowercaseFilter();
    }

    /**
     *
     */
    public function testApply()
    {
        $value = 'FOO';

        $this->assertSame('foo' , $this->filter->apply($value));
    }
}
