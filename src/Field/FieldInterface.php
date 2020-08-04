<?php

namespace perf\Form\Field;

use perf\Form\Filtering\FilterInterface;

interface FieldInterface
{
    /**
     * @param mixed $value
     *
     * @return FieldInterface Fluent return.
     */
    public function setInitialValue($value): self;

    public function addFilter(FilterInterface $filter): self;

    public function setLabel(string $label): self;

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return FieldInterface Fluent return.
     */
    public function setAttribute(string $key, $value): self;

    /**
     * @param mixed $value
     *
     * @return void
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
     * @param string $name
     *
     * @return mixed
     */
    public function getAttribute(string $name);

    /**
     * @return {string:mixed}
     */
    public function getAttributes();
}
