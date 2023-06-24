<?php

namespace perf\Form\Field;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

/**
 * @implements IteratorAggregate<RadioItem>
 */
class RadioItemCollection implements IteratorAggregate
{
    /**
     * @var RadioItem[]
     */
    private array $items = [];

    /**
     * {@inheritDoc}
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    /**
     * @param RadioItem[] $items
     */
    public function setMany(array $items): void
    {
        $this->removeAll();
        $this->addMany($items);
    }

    public function removeAll(): void
    {
        $this->items = [];
    }

    /**
     * @param RadioItem[] $items
     */
    public function addMany(array $items): void
    {
        foreach ($items as $item) {
            $this->addOne($item);
        }
    }

    public function addOne(RadioItem $item): void
    {
        $this->items[] = $item;
    }

    public function checkByValue(mixed $value): void
    {
        $checked = false;

        foreach ($this->items as $item) {
            $item->uncheck();

            // If many radio items share the same value, check only the first matched one.
            if (($item->getValue() === $value) && !$checked) {
                $item->check();
                $checked = true;
            }
        }
    }

    /**
     * @return RadioItem[]
     */
    public function toArray(): array
    {
        return $this->items;
    }
}
