<?php

namespace perf\Form\Field;

/**
 *
 *
 */
class RadioField extends Field
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
     * @return RadioField Fluent return.
     */
    public function setItems(array $items)
    {
        $this->items = array();

        foreach ($items as $item) {
            $this->addItem($item);
        }

        return $this;
    }

    /**
     *
     *
     * @param RadioItem $item
     * @return RadioField Fluent return.
     */
    public function addItem(RadioItem $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     *
     *
     * @return RadioItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     *
     *
     * @param string $value
     * @return RadioField Fluent return.
     */
    public function setSubmittedValue($value)
    {
        $checked = false;

        foreach ($this->getItems() as $item) {
            // If many radio items share the same value, check only the first matched one.
            if (($item->getValue() === $value) && !$checked) {
                $item->check();
                $checked = true;
            } else {
                $item->uncheck();
            }
        }

        $this->submittedValue = (string) $value;
        $this->submitted      = true;

        return parent::setSubmittedValue($value);
    }
}
