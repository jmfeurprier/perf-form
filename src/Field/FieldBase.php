<?php

namespace perf\Form\Field;

use perf\Form\Attributes\AttributeCollection;
use perf\Form\Exception\FormException;
use perf\Form\Filtering\FilterInterface;

abstract class FieldBase implements FieldInterface
{
    private AttributeCollection $attributes;

    private mixed $initialValue = '';

    private mixed $submittedValue = null;

    private bool $submitted = false;

    /**
     * @var FilterInterface[]
     */
    private array $filters = [];

    private string $label = '';

    public function __construct(private readonly string $name)
    {
        $this->attributes = new AttributeCollection();
    }

    public function setInitialValue(mixed $value): self
    {
        $this->initialValue = $value;

        return $this;
    }

    public function addFilter(FilterInterface $filter): self
    {
        $this->filters[] = $filter;

        return $this;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function setAttribute(string $key, mixed $value): self
    {
        $this->attributes->set($key, $value);

        return $this;
    }

    public function submitValue(mixed $value): void
    {
        foreach ($this->filters as $filter) {
            $value = $filter->apply($value);
        }

        $this->submittedValue = $value;
        $this->submitted      = true;
    }

    public function submitNoValue(): void
    {
        $this->submittedValue = $this->getEmptyValue();
        $this->submitted      = true;
    }

    public function reset(): void
    {
        $this->submittedValue = null;
        $this->submitted      = false;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): mixed
    {
        if ($this->isSubmitted()) {
            return $this->getSubmittedValue();
        }

        return $this->getInitialValue();
    }

    protected function getSubmittedValue(): mixed
    {
        return $this->submittedValue;
    }

    protected function getInitialValue(): mixed
    {
        return $this->initialValue;
    }

    protected function isSubmitted(): bool
    {
        return $this->submitted;
    }

    /**
     * Default implementation.
     */
    protected function getEmptyValue(): mixed
    {
        return '';
    }

    public function getFieldTypeId(): string
    {
        return static::FIELD_TYPE_ID;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function hasAttribute(string $name): bool
    {
        return $this->attributes->has($name);
    }

    /**
     * @throws FormException
     */
    public function getAttribute(string $name): mixed
    {
        return $this->attributes->get($name);
    }

    public function getAttributes(): array
    {
        return $this->attributes->toArray();
    }
}
