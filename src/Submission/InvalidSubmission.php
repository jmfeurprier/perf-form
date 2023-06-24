<?php

namespace perf\Form\Submission;

use perf\Form\Validation\FormValidationErrorCollection;

readonly class InvalidSubmission implements SubmissionInterface
{
    /**
     * @param array<string, mixed> $values
     */
    public function __construct(
        private FormValidationErrorCollection $errors,
        private array $values
    ) {
    }

    public function submitted(): bool
    {
        return true;
    }

    public function valid(): bool
    {
        return false;
    }

    public function getErrors(): FormValidationErrorCollection
    {
        return $this->errors;
    }

    public function getValues(): array
    {
        return $this->values;
    }
}
