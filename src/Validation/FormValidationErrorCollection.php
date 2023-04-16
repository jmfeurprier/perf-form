<?php

namespace perf\Form\Validation;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

class FormValidationErrorCollection implements IteratorAggregate, Countable
{
    /**
     * Wrapped errors, indexed by Id.
     *
     * @var {string Error Id:Error}
     */
    private array $errors = [];

    /**
     * @param FormValidationError[] $errors
     */
    public function __construct(array $errors = [])
    {
        foreach ($errors as $error) {
            $this->add($error);
        }
    }

    public function add(FormValidationError $error): void
    {
        $this->errors[$error->getId()] = $error;
    }

    /**
     * @return FormValidationError[]
     */
    public function toArray(): array
    {
        return array_values($this->errors);
    }

    /**
     * @return string[]
     */
    public function getIds(): array
    {
        return array_keys($this->errors);
    }

    /**
     * @return string[]
     */
    public function getMessages(): array
    {
        $messages = [];

        foreach ($this->errors as $error) {
            $messages[] = $error->getMessage();
        }

        return $messages;
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->errors);
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->errors);
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return count($this->errors);
    }
}
