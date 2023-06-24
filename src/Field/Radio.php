<?php

namespace perf\Form\Field;

class Radio extends FieldBase
{
    public const FIELD_TYPE_ID = 'input.radio';

    private RadioItemCollection $items;

    public function __construct(string $name)
    {
        parent::__construct($name);

        $this->items = new RadioItemCollection();
    }

    /**
     * @param RadioItem[] $items
     */
    public function setItems(array $items): self
    {
        $this->items->removeAll();
        $this->items->setMany($items);

        return $this;
    }

    public function addItem(RadioItem $item): self
    {
        $this->items->addOne($item);

        return $this;
    }

    /**
     * @param RadioItem[] $items
     */
    public function addItems(array $items): self
    {
        $this->items->addMany($items);

        return $this;
    }

    public function setInitialValue(mixed $value): self
    {
        if (!$this->isSubmitted()) {
            $this->items->checkByValue($value);
        }

        parent::setInitialValue($value);

        return $this;
    }

    public function submitValue(mixed $value): void
    {
        $this->items->checkByValue($value);

        parent::submitValue($value);
    }

    /**
     * @return RadioItem[]
     */
    public function getItems(): array
    {
        return $this->items->toArray();
    }
}
