<?php

namespace perf\Form\Validation;

use perf\Form\Exception\FormException;

class FormValidationError
{
    private ?string $message = null;

    private ?string $fieldName = null;

    /**
     * @throws FormException
     */
    public function __construct(private readonly string $id)
    {
        if ('' === $id) {
            throw new FormException('Form validation error Id cannot be an empty string.');
        }
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
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
