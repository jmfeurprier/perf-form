<?php

namespace perf\Form\Filtering;

use PHPUnit\Framework\TestCase;

class LowercaseFilterTest extends TestCase
{
    private LowercaseFilter $filter;

    protected function setUp(): void
    {
        $this->filter = new LowercaseFilter();
    }

    public function testApply(): void
    {
        $value = 'FOO';

        $this->assertSame('foo', $this->filter->apply($value));
    }
}
