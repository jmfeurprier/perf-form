<?php

namespace perf\Form\Filtering;

/**
 *
 */
class ReplacementFilterTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testApply()
    {
        $replacements = array(
            'foo' => 'bar',
        );

        $filter = new ReplacementFilter($replacements);

        $this->assertSame('bar' , $filter->apply('foo'));
    }
}
