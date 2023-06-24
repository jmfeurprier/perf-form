<?php

namespace perf\Form\Field;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

/**
 * @implements IteratorAggregate<SelectOption>
 */
class SelectOptionCollection implements IteratorAggregate
{
    /**
     * @var SelectOption[]
     */
    private array $options = [];

    /**
     * {@inheritDoc}
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->options);
    }

    /**
     * @param SelectOption[] $options
     */
    public function setMany(array $options): void
    {
        $this->removeAll();
        $this->addMany($options);
    }

    public function removeAll(): void
    {
        $this->options = [];
    }

    /**
     * @param SelectOption[] $options
     */
    public function addMany(array $options): void
    {
        foreach ($options as $option) {
            $this->addOne($option);
        }
    }

    public function addOne(SelectOption $option): void
    {
        $this->options[] = $option;
    }

    public function selectOptionByValue(mixed $value): void
    {
        $selected = false;

        foreach ($this->options as $option) {
            $option->deselect();

            // If many select options share the same value, select only the first matched one.
            if (($option->getValue() === $value) && !$selected) {
                $option->select();
                $selected = true;
            }
        }
    }

    /**
     * @param string[] $values
     */
    public function selectOptionByValues(array $values): void
    {
        foreach ($this->options as $option) {
            if (in_array($option->getValue(), $values, true)) {
                $option->select();

                continue;
            }

            $option->deselect();
        }
    }

    /**
     * @return SelectOption[]
     */
    public function toArray(): array
    {
        return $this->options;
    }
}
