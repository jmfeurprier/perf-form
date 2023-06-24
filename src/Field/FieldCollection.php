<?php

namespace perf\Form\Field;

use ArrayIterator;
use IteratorAggregate;
use perf\Form\Exception\FormException;
use Traversable;

/**
 * @implements IteratorAggregate<string, FieldInterface>
 */
class FieldCollection implements IteratorAggregate
{
    /**
     * @var array<string, FieldInterface>
     */
    private array $fields = [];

    /**
     * {@inheritDoc}
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->fields);
    }

    public function add(FieldInterface $field): self
    {
        $this->fields[$field->getName()] = $field;

        return $this;
    }

    public function has(string $name): bool
    {
        return array_key_exists($name, $this->fields);
    }

    /**
     * @throws FormException
     */
    public function get(string $name): FieldInterface
    {
        if ($this->has($name)) {
            return $this->fields[$name];
        }

        throw new FormException("No form field with name '{$name}'.");
    }

    public function remove(string $name): self
    {
        unset($this->fields[$name]);

        return $this;
    }

    public function reset(): self
    {
        foreach ($this->fields as $field) {
            $field->reset();
        }

        return $this;
    }

    /**
     * @param array<string, mixed> $values
     */
    public function setInitialValues(array $values): self
    {
        foreach ($this->fields as $field) {
            $fieldName = $field->getName();

            if (array_key_exists($fieldName, $values)) {
                $value = $values[$fieldName];

                $field->setInitialValue($value);
            }
        }

        return $this;
    }

    /**
     * @param array<string, mixed> $values
     */
    public function submitValues(array $values): self
    {
        foreach ($this->fields as $field) {
            $fieldName = $field->getName();

            if (array_key_exists($fieldName, $values)) {
                $value = $values[$fieldName];

                $field->submitValue($value);

                continue;
            }

            $field->submitNoValue();
        }

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getValues(): array
    {
        $values = [];

        foreach ($this->fields as $field) {
            $values[$field->getName()] = $field->getValue();
        }

        return $values;
    }
}
