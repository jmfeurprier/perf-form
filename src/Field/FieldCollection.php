<?php

namespace perf\Form\Field;

use ArrayIterator;
use IteratorAggregate;
use perf\Form\Exception\FormException;

class FieldCollection implements IteratorAggregate
{
    /**
     * @var {string:Field}
     */
    private $fields = [];

    /**
     * {@inheritDoc}
     */
    public function getIterator()
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
     * @param string $name
     *
     * @return FieldInterface
     *
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
     * @param {string:mixed} $values
     *
     * @return FieldCollection Fluent return.
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
     * @param {string:mixed} $values
     *
     * @return FieldCollection Fluent return.
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
     * @return {string:mixed}
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
