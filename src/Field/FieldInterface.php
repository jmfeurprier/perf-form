<?php

namespace perf\Form\Field;

use perf\Form\Filtering\FilterInterface;

interface FieldInterface
{
    public function setInitialValue(mixed $value): self;

    public function addFilter(FilterInterface $filter): self;

    public function setLabel(string $label): self;

    public function setAttribute(string $key, mixed $value): self;

    public function submitValue(mixed $value): void;

    public function submitNoValue(): void;

    public function reset(): void;

    public function getName(): string;

    public function getValue(): mixed;

    public function getFieldTypeId(): string;

    public function getLabel(): string;

    public function hasAttribute(string $name): bool;

    public function getAttribute(string $name): mixed;

    /**
     * @return array<string, mixed>
     */
    public function getAttributes(): array;
}
