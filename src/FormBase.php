<?php

namespace perf\Form;

use perf\Form\Field\FieldCollection;
use perf\Form\Field\FieldInterface;
use perf\Form\Validation\FormValidationError;
use perf\Form\Validation\FormValidationErrorCollection;

abstract class FormBase
{
    private string $method = 'post';

    private string $action = '';

    private AttributeCollection $attributes;

    private FieldCollection $fields;

    private bool $submitted = false;

    private bool $valid = false;

    private FormValidationErrorCollection $errors;

    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function addField(FieldInterface $field): FieldInterface
    {
        $this->getFields()->add($field);

        return $field;
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return FormBase Fluent return.
     */
    public function setAttribute(string $key, $value): self
    {
        $this->getAttributes()->set($key, $value);

        return $this;
    }

    public function submit(array $submittedValues = []): void
    {
        $this->submitted = false;
        $this->errors    = new FormValidationErrorCollection();
        $this->valid     = false;

        if (!$this->isSubmittable($submittedValues)) {
            return;
        }

        $this->submitted = true;

        $fields = $this->getFields();
        $fields->submitValues($submittedValues);

        $values = $fields->getValues();

        $this->validate($values);

        if (count($this->errors) > 0) {
            $this->onInvalid($values);

            return;
        }

        $this->valid = true;

        $this->onValid($values);
    }

    /**
     * Default implementation.
     *
     * @param {string:mixed} $submittedValues
     *
     * @return bool
     */
    protected function isSubmittable(array $submittedValues): bool
    {
        return true;
    }

    /**
     * Default implementation.
     *
     * @param {string:mixed} $values
     *
     * @return void
     */
    protected function validate(array $values): void
    {
    }

    protected function addError(string $id): FormValidationError
    {
        $error = new FormValidationError($id);

        $this->getErrors()->add($error);

        return $error;
    }

    /**
     * Default implementation.
     *
     * @param {string:mixed} $values
     *
     * @return void
     */
    protected function onValid(array $values): void
    {
    }

    /**
     * Default implementation.
     *
     * @param {string:mixed} $values
     *
     * @return void
     */
    protected function onInvalid(array $values): void
    {
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function isSubmitted(): bool
    {
        return $this->submitted;
    }

    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * @return {string:mixed}
     */
    public function getValues(): array
    {
        return $this->getFields()->getValues();
    }

    public function getErrors(): FormValidationErrorCollection
    {
        if (!isset($this->errors)) {
            $this->errors = new FormValidationErrorCollection();
        }

        return $this->errors;
    }

    public function resetFields(): void
    {
        $this->getFields()->reset();
    }

    public function getFields(): FieldCollection
    {
        if (!isset($this->fields)) {
            $this->fields = new FieldCollection();
        }

        return $this->fields;
    }

    public function hasAttribute(string $name): bool
    {
        return $this->getAttributes()->has($name);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function getAttribute(string $name)
    {
        return $this->getAttributes()->get($name);
    }

    public function getAttributes(): AttributeCollection
    {
        if (!isset($this->attributes)) {
            $this->attributes = new AttributeCollection();
        }

        return $this->attributes;
    }
}
