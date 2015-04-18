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
     * @param mixed $value
     * @return Field Fluent return.
     */
    public function setInitialValue($value)
    {
        if (!$this->isSubmitted()) {
            $this->checkItemByValue($value);
        }

        return parent::setInitialValue($value);
    }

    /**
     *
     *
     * @param string $value
     * @return Field Fluent return.
     */
    public function setSubmittedValue($value)
    {
        $this->checkItemByValue($value);

        return parent::setSubmittedValue($value);
    }

    /**
     *
     *
     * @param string $value
     * @return void
     */
    private function checkItemByValue($value)
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
    }
}
