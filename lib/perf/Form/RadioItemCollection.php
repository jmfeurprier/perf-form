<?php

namespace perf\Form;

/**
 *
 *
 */
class RadioItemCollection implements \IteratorAggregate
{

    /**
     *
     *
     * @var RadioItem[]
     */
    private $items = array();

    /**
     *
     *
     * @param RadioItem[] $items
     * @return void
     */
    public function setMany(array $items)
    {
        $this->removeAll();
        $this->addMany($items);
    }

    /**
     *
     *
     * @return void
     */
    public function removeAll()
    {
        $this->items = array();
    }

    /**
     *
     *
     * @param RadioItem[] $items
     * @return void
     */
    public function addMany(array $items)
    {
        foreach ($items as $item) {
            $this->addOne($item);
        }
    }

    /**
     *
     *
     * @param RadioItem $item
     * @return void
     */
    public function addOne(RadioItem $item)
    {
        $this->items[] = $item;
    }

    /**
     *
     *
     * @param string $value
     * @return void
     */
    public function checkByValue($value)
    {
        $checked = false;

        foreach ($this->items as $item) {
            // If many radio items share the same value, check only the first matched one.
            if (($item->getValue() === $value) && !$checked) {
                $item->check();
                $checked = true;
            } else {
                $item->uncheck();
            }
        }
    }

    /**
     *
     *
     * @return \Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    /**
     *
     *
     * @return RadioItem[]
     */
    public function toArray()
    {
        return $this->items;
    }
}
