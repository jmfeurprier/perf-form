<?php

namespace perf\Form\Field;

use perf\Form\Filtering\FilterInterface;

interface FieldInterface
{
    /**
     * @param mixed $value
     */
    public function setInitialValue($value): self;

    public function addFilter(FilterInterface $filter): self;

    public function setLabel(string $label): self;

    /**
     * @param mixed $value
     */
    public function setAttribute(string $key, $value): self;

    /**
     * @param mixed $value
     */
    public function submitValue($value): void;

    public function submitNoValue(): void;

    public function reset(): void;

    public function getName(): string;

    /**
     * @return mixed
     */
    public function getValue();

    public function getFieldTypeId(): string;

    public function getLabel(): string;

    public function hasAttribute(string $name): bool;

    /**
     * @return mixed
     */
    public function getAttribute(string $name);

    public function getAttributes(): array;
}
