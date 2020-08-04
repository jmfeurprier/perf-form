<?php

namespace perf\Form\Field;

use perf\Form\Attributes\AttributeCollection;
use perf\Form\Exception\FormException;
use perf\Form\Filtering\FilterInterface;

abstract class FieldBase implements FieldInterface
{
    private string $name;

    private AttributeCollection $attributes;

    /**
     * @var mixed
     */
    private $initialValue = '';

    /**
     * @var null|mixed
     */
    private $submittedValue = null;

    private bool $submitted = false;

    /**
     * @var FilterInterface[]
     */
    private array $filters = [];

    private string $label = '';

    public function __construct(string $name)
    {
        $this->name       = $name;
        $this->attributes = new AttributeCollection();
    }

    /**
     * @param mixed $value
     *
     * @return FieldBase Fluent return.
     */
    public function setInitialValue($value): self
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

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return FieldBase Fluent return.
     */
    public function setAttribute(string $key, $value): self
    {
        $this->attributes->set($key, $value);

        return $this;
    }

    /**
     * @param mixed $value
     *
     * @return void
     */
    public function submitValue($value): void
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

    /**
     * @return mixed
     */
    public function getValue()
    {
        if ($this->isSubmitted()) {
            return $this->getSubmittedValue();
        }

        return $this->getInitialValue();
    }

    /**
     * @return mixed
     */
    protected function getSubmittedValue()
    {
        return $this->submittedValue;
    }

    /**
     * @return mixed
     */
    protected function getInitialValue()
    {
        return $this->initialValue;
    }

    protected function isSubmitted(): bool
    {
        return $this->submitted;
    }

    /**
     * Default implementation.
     *
     * @return mixed
     */
    protected function getEmptyValue()
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
     * @param string $name
     *
     * @return mixed
     *
     * @throws FormException
     */
    public function getAttribute(string $name)
    {
        return $this->attributes->get($name);
    }

    /**
     * @return {string:mixed}
     */
    public function getAttributes(): array
    {
        return $this->attributes->toArray();
    }
}
