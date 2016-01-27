<?php

namespace perf\Form;

/**
 *
 *
 */
class Radio extends Field
{

    const FIELD_TYPE_ID = 'input.radio';

    /**
     *
     *
     * @var RadioItemCollection
     */
    private $items;

    /**
     * Constructor.
     *
     * @param string $name
     * @return void
     */
    public function __construct($name)
    {
        parent::__construct($name);

        $this->items = new RadioItemCollection();
    }

    /**
     *
     *
     * @param RadioItem[] $items
     * @return RadioField Fluent return.
     */
    public function setItems(array $items)
    {
        $this->items->removeAll();
        $this->items->setMany($items);

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
        $this->items->addOne($item);

        return $this;
    }

    /**
     *
     *
     * @param RadioItem[] $items
     * @return RadioField Fluent return.
     */
    public function addItems(array $items)
    {
        $this->items->addMany($items);

        return $this;
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
            $this->items->checkByValue($value);
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
        $this->items->checkByValue($value);

        return parent::setSubmittedValue($value);
    }

    /**
     *
     *
     * @return RadioItem[]
     */
    public function getItems()
    {
        return $this->items->toArray();
    }
}
