<?php

namespace perf\Form;

/**
 *
 *
 */
class SelectOptionCollection implements \IteratorAggregate
{

    /**
     *
     *
     * @var SelectOption[]
     */
    private $options = array();

    /**
     *
     *
     * @param SelectOption[] $options
     * @return void
     */
    public function setMany(array $options)
    {
        $this->removeAll();
        $this->addMany($options);
    }

    /**
     *
     *
     * @return void
     */
    public function removeAll()
    {
        $this->options = array();
    }

    /**
     *
     *
     * @param SelectOption[] $options
     * @return void
     */
    public function addMany(array $options)
    {
        foreach ($options as $option) {
            $this->addOne($option);
        }
    }

    /**
     *
     *
     * @param SelectOption $option
     * @return void
     */
    public function addOne(SelectOption $option)
    {
        $this->options[] = $option;
    }

    /**
     *
     *
     * @param string $value
     * @return void
     */
    public function selectOptionByValue($value)
    {
        $selected = false;

        foreach ($this->options as $option) {
            // If many select options share the same value, select only the first matched one.
            if (($option->getValue() === $value) && !$selected) {
                $option->select();
                $selected = true;
            } else {
                $option->deselect();
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
        return new \ArrayIterator($this->options);
    }

    /**
     *
     *
     * @return SelectOption[]
     */
    public function toArray()
    {
        return $this->options;
    }
}
