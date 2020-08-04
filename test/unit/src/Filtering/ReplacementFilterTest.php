<?php

namespace perf\Form\Filtering;

use PHPUnit\Framework\TestCase;

class ReplacementFilterTest extends TestCase
{
    public function testApply()
    {
        $replacements = [
            'foo' => 'bar',
        ];

        $filter = new ReplacementFilter($replacements);

        $this->assertSame('bar', $filter->apply('foo'));
    }
}
