<?php

namespace perf\Form\Filtering;

use PHPUnit\Framework\TestCase;

class TrimFilterTest extends TestCase
{
    private TrimFilter $filter;

    protected function setUp(): void
    {
        $this->filter = new TrimFilter();
    }

    public function testApply()
    {
        $value = ' foo ';

        $this->assertSame('foo', $this->filter->apply($value));
    }
}
