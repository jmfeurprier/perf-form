<?php

namespace perf\Form\Validation;

use perf\Form\Exception\FormException;

class FormValidationError
{
    private string $id;

    private ?string $message = null;

    private ?string $fieldName = null;

    /**
     * @param string $id
     *
     * @throws FormException
     */
    public function __construct(string $id)
    {
        if ('' === $id) {
            throw new FormException('Form validation error Id cannot be an empty string.');
        }

        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param null|string $message
     *
     * @return FormValidationError Fluent return.
     *
     * @throws FormException
     */
    public function setMessage(?string $message): self
    {
        if ('' === $message) {
            throw new FormException('Form validation error message cannot be an empty string.');
        }

        $this->message = $message;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param null|string $name
     *
     * @return FormValidationError Fluent return.
     *
     * @throws FormException
     */
    public function setFieldName(?string $name): self
    {
        if ('' == $name) {
            throw new FormException('Form validation error field name cannot be an empty string.');
        }

        $this->fieldName = $name;

        return $this;
    }

    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }
}
