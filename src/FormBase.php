<?php

namespace perf\Form;

use perf\Form\Attributes\AttributeCollection;
use perf\Form\Exception\FormException;
use perf\Form\Field\FieldCollection;
use perf\Form\Field\FieldInterface;
use perf\Form\Submission\InvalidSubmission;
use perf\Form\Submission\NoSubmission;
use perf\Form\Submission\SubmissionInterface;
use perf\Form\Submission\ValidValuesSubmitted;
use perf\Form\Validation\FormValidationError;
use perf\Form\Validation\FormValidationErrorCollection;

abstract class FormBase
{
    private string $method = 'post';

    private string $action = '';

    private AttributeCollection $attributes;

    private FieldCollection $fields;

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

    public function setAttribute(string $key, mixed $value): self
    {
        $this->getAttributes()->set($key, $value);

        return $this;
    }

    public function submit(array $submittedValues = []): SubmissionInterface
    {
        $this->errors = new FormValidationErrorCollection();

        if (!$this->isSubmittable($submittedValues)) {
            return new NoSubmission($this->getValues());
        }

        $fields = $this->getFields();
        $fields->submitValues($submittedValues);

        $values = $fields->getValues();

        $this->validate($values);

        if (count($this->errors) > 0) {
            $this->onInvalid($values);

            return new InvalidSubmission($this->errors, $values);
        }

        $this->onValid($values);

        return new ValidValuesSubmitted($values);
    }

    /**
     * Default implementation.
     */
    protected function isSubmittable(array $submittedValues): bool
    {
        return true;
    }

    /**
     * Default implementation.
     */
    protected function validate(array $values): void
    {
    }

    /**
     * @throws FormException
     */
    protected function addError(string $id): FormValidationError
    {
        $error = new FormValidationError($id);

        $this->errors->add($error);

        return $error;
    }

    /**
     * Default implementation.
     */
    protected function onValid(array $values): void
    {
    }

    /**
     * Default implementation.
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

    public function getValues(): array
    {
        return $this->getFields()->getValues();
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
     * @throws FormException
     */
    public function getAttribute(string $name): mixed
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
