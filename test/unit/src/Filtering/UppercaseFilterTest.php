<?php

namespace perf\Form\Filtering;

use PHPUnit\Framework\TestCase;

class UppercaseFilterTest extends TestCase
{
    private UppercaseFilter $filter;

    protected function setUp(): void
    {
        $this->filter = new UppercaseFilter();
    }

    public function testApply(): void
    {
        $value = 'foo';

        $this->assertSame('FOO', $this->filter->apply($value));
    }
}
